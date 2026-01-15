<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DashboardImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Retrieve value from 'Category Present' column (slugged to category_present)
            $categoryPresent = $row['category_present'] ?? '';
            
            // Determine status based on category_present, fallback to valid values or default
            $status = match (strtolower($categoryPresent)) {
                'present' => 'Present',
                'leave', 'cuti', 'cuti panjang' => 'Leave',
                'absent', 'alfa', 'mangkir' => 'Absent',
                'sick', 'sakit' => 'Sick',
                'permission', 'izin' => 'Permission',
                default => $categoryPresent ?: 'Unknown', // Use original value if not matched, or Unknown
            };

            // Maintain fallback to reason_code if category_present is empty (optional, but good for robustness)
            if (empty($categoryPresent) && !empty($row['reason_code'])) {
                 $reasonCode = strtolower($row['reason_code']);
                 $status = match (true) {
                    in_array($reasonCode, ['p', 'present', 'hadir']) => 'Present',
                    in_array($reasonCode, ['al', 'alfa']) => 'Absent', // Changed from Alfa to Absent to match requested scheme
                    in_array($reasonCode, ['s', 'sakit']) => 'Sick',
                    in_array($reasonCode, ['i', 'permission', 'izin']) => 'Permission',
                    in_array($reasonCode, ['l', 'leave', 'cuti']) => 'Leave',
                    default => 'Absent', // Default logic if reason code exists but unknown
                 };
            }

            // If status is still Unknown, skip this row to prevent cluttering the database
            if ($status === 'Unknown' || empty($status)) {
                continue;
            }

            $date = $row['date'] ?? $row['tanggal'] ?? null;
            if ($date) {
                try {
                    $dateObj = is_numeric($date) 
                        ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)
                        : \Carbon\Carbon::parse($date);
                } catch (\Exception $e) {
                    $dateObj = null;
                }
            } else {
                $dateObj = null;
            }

            \App\Models\Attendance::create([
                'employee_id' => $row['employee_number'] ?? $row['employee_id'] ?? null,
                'name' => $row['employee_name'] ?? $row['nama'] ?? null,
                'function' => $row['function'] ?? $row['divisi'] ?? null,
                'shift' => $row['shift'] ?? null,
                'reason_code' => $row['reason_code'] ?? null,
                'status' => $status,
                'date' => $dateObj,
                'month_year' => $dateObj ? $dateObj->format('Y-m') : null,
            ]);
        }
    }
}
