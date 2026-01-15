<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Attendance;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DashboardImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        $insertData = [];
        $timestamp = now(); // Untuk created_at dan updated_at

        foreach ($rows as $row) {
            // Retrieve value from 'Category Present' column (slugged to category_present)
            $categoryPresent = $row['category_present'] ?? '';
            
            // Determine status based on category_present OR reason_code
            $status = $this->determineStatus($categoryPresent, $row['reason_code'] ?? null);

            // If status is Unknown/Invalid, skip this row
            if ($status === 'Unknown' || empty($status)) {
                continue;
            }

            $dateObj = $this->parseDate($row['date'] ?? $row['tanggal'] ?? null);

            $insertData[] = [
                'employee_id' => $row['employee_number'] ?? $row['employee_id'] ?? null,
                'name' => $row['employee_name'] ?? $row['nama'] ?? null,
                'function' => $row['function'] ?? $row['divisi'] ?? null,
                'shift' => $row['shift'] ?? null,
                'reason_code' => $row['reason_code'] ?? null,
                'status' => $status,
                'date' => $dateObj,
                'month_year' => $dateObj ? Carbon::parse($dateObj)->format('Y-m') : null,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];

            // Chunk insert setiap 500 data agar memory aman
            if (count($insertData) >= 500) {
                Attendance::insert($insertData);
                $insertData = [];
            }
        }

        // Insert sisa data
        if (!empty($insertData)) {
            Attendance::insert($insertData);
        }
    }

    private function determineStatus($categoryPresent, $reasonCode)
    {
        $status = match (strtolower($categoryPresent)) {
            'present' => 'Present',
            'leave', 'cuti', 'cuti panjang' => 'Leave',
            'absent', 'alfa', 'mangkir' => 'Absent',
            'sick', 'sakit' => 'Sick',
            'permission', 'izin' => 'Permission',
            default => null,
        };

        if ($status) return $status;

        // Fallback to reason_code
        if (!empty($reasonCode)) {
             $code = strtolower($reasonCode);
             return match (true) {
                in_array($code, ['p', 'present', 'hadir']) => 'Present',
                in_array($code, ['al', 'alfa']) => 'Absent',
                in_array($code, ['s', 'sakit']) => 'Sick',
                in_array($code, ['i', 'permission', 'izin']) => 'Permission',
                in_array($code, ['l', 'leave', 'cuti']) => 'Leave',
                default => 'Absent', // Default unknown code to Absent as requested previously? Or Unknown
             };
        }

        return 'Unknown';
    }

    private function parseDate($date)
    {
        if (!$date) return null;

        try {
            if (is_numeric($date)) {
                return Date::excelToDateTimeObject($date)->format('Y-m-d');
            }
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
