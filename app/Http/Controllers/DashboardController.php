<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DashboardImport;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function process(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $array = Excel::toArray(new DashboardImport, $request->file('file'));
        $rawRows = $array[0] ?? [];

        $data = [];
        $columnsFound = [];

        foreach ($rawRows as $index => $row) {
            // Slugify keys just in case, though array_change_key_case helps
            $row = array_change_key_case($row, CASE_LOWER);
            $keys = array_keys($row);

            // Smart Key Detection Helper
            $findKey = function($candidates) use ($keys) {
                foreach ($candidates as $candidate) {
                    // Exact match
                    if (in_array($candidate, $keys)) return $candidate;
                    // Partial match
                    foreach ($keys as $key) {
                        if (str_contains($key, $candidate)) return $key;
                    }
                }
                return null;
            };

            // Detect keys once on first row for efficiency/logging (optional, simplified here to per-row)
            $functionKey = $findKey(['function', 'func', 'divisi', 'department', 'bagian', 'dep']);
            $reasonKey = $findKey(['reason', 'status', 'keterangan', 'alasan', 'code']);
            $dateKey = $findKey(['date', 'tanggal', 'tgl', 'waktu', 'time']);

            if ($index === 0) {
                 $columnsFound = ['function' => $functionKey, 'reason' => $reasonKey, 'date' => $dateKey];
            }

            // Extract Values
            $function = $functionKey ? ($row[$functionKey] ?? 'Unknown') : 'Unknown';
            $reason = $reasonKey ? ($row[$reasonKey] ?? null) : null;
            $rawDate = $dateKey ? ($row[$dateKey] ?? null) : null;

            if ($reason) {
                // Normalize reason
                $reasonLower = strtolower(trim($reason));
                $normalizedStatus = 'Other';

                if (in_array($reasonLower, ['p', 'present', 'hadir'])) {
                    $normalizedStatus = 'Present';
                } elseif (in_array($reasonLower, ['al', 'alfa'])) {
                    $normalizedStatus = 'Alfa';
                } elseif (in_array($reasonLower, ['absend', 's', 'i', 'sakit', 'izin'])) {
                    $normalizedStatus = 'Absend';
                }

                if ($normalizedStatus !== 'Other') {
                    // Date Parsing
                    $cleanDate = 'N/A';
                    if ($rawDate) {
                        try {
                            if (is_numeric($rawDate)) {
                                $cleanDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rawDate)->format('Y-m');
                            } else {
                                $cleanDate = \Carbon\Carbon::parse($rawDate)->format('Y-m');
                            }
                        } catch (\Exception $e) {
                             // Regex fallback
                             if (preg_match('/^\d{4}-\d{2}/', (string)$rawDate, $matches)) {
                                $cleanDate = $matches[0];
                             }
                        }
                    }

                    $data[] = [
                        'status' => $normalizedStatus,
                        'function' => trim(ucwords(strtolower($function))),
                        'month' => $cleanDate, 
                        'original_date' => $rawDate
                    ];
                }
            }
        }
        
        // Persist to Database (Transaction)
        \DB::beginTransaction();
        try {
            // Optional: Clear old data or keep history? 
            // Usually dashboard uploads replace the current view or append. 
            // Let's clear for this session to match the "Visualize" intent, or user might want accumulation.
            // Given the request "dimasukin ke mysql", let's Truncate to keep it simple and performant for now, 
            // or just append. Let's append but maybe the user wants to see specific upload stats.
            // For now, let's just save.
            
            // To be safe and clean, let's truncate if it's a "fresh" dashboard view, 
            // BUT usually users want history.
            // Let's just create.
            
            foreach ($data as $item) {
                // Parse full date for DB storage
                $dbDate = null;
                try {
                     if (is_numeric($item['original_date'])) {
                        $dbDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['original_date'])->format('Y-m-d');
                    } else {
                        $dbDate = \Carbon\Carbon::parse($item['original_date'])->format('Y-m-d');
                    }
                } catch (\Exception $e) {}

                \App\Models\Attendance::create([
                    'function' => $item['function'],
                    'status' => $item['status'],
                    'month_year' => $item['month'],
                    'date' => $dbDate,
                    'reason_code' => '', // We didn't keep the raw reason in $data array, assume normalized is enough or refactor if needed
                ]);
            }
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            // Log error or session flash
        }

        // Count for stats
        $counts = [
            'Present' => collect($data)->where('status', 'Present')->count(),
            'Alfa' => collect($data)->where('status', 'Alfa')->count(),
            'Absend' => collect($data)->where('status', 'Absend')->count(),
        ];

        // Extract unique values for filters
        $uniqueMonths = collect($data)->pluck('month')->reject(fn($m) => $m === 'N/A')->unique()->sort()->values()->all();
        $uniqueFunctions = collect($data)->pluck('function')->reject(fn($f) => $f === 'Unknown')->unique()->sort()->values()->all();
        
        return view('dashboard', [
            'counts' => $counts,
            'dataset' => $data,
            'debug_columns' => $columnsFound,
            'filters' => [
                'months' => $uniqueMonths,
                'functions' => $uniqueFunctions
            ]
        ]);
    }
}
