<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class FunctionsCharts extends Widget
{
    use \Filament\Widgets\Concerns\InteractsWithPageFilters;

    protected string $view = 'filament.widgets.functions-charts';
    
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    public function getChartsData(): array
    {
        $date = $this->filters['date'] ?? null;
        $function = $this->filters['function'] ?? null;
        $shift = $this->filters['shift'] ?? null;

        $query = \App\Models\Attendance::query()
            ->select('function', 'status', 'date')
            ->whereNotNull('function');

        if ($date) {
            $query->whereDate('date', $date);
        }

        if ($function) {
            $query->where('function', $function);
        }

        if ($shift) {
            if ($shift === 'Pagi') {
                $query->whereIn('shift', ['L1', 'L1J', 'NS', 'NSJ']);
            } elseif ($shift === 'Malam') {
                $query->whereIn('shift', ['L2']);
            }
        }

        $functions = $query->get()
            ->groupBy('function')
            ->sortKeys();

        $data = [];
        $colors = [
            'Present' => '#3b82f6', // Blue (matches screenshot)
            'Absent' => '#9ca3af',  // Gray (matches screenshot)
            'Leave' => '#f97316',   // Orange (matches screenshot)
            'Sick' => '#fbbf24',    // Amber (fallback)
            'Permission' => '#fbbf24', // Amber (fallback)
            'Unknown' => '#e5e7eb', // Light Gray
        ];

        foreach ($functions as $func => $records) {
            $total = $records->count();
            $counts = $records->groupBy('status')->map->count();
            
            // Explicitly define the standard statuses needed
            $standardStatuses = ['Present', 'Absent', 'Leave'];
            
            $values = [];
            $labels = [];
            $bgColors = [];

            foreach ($standardStatuses as $status) {
                // Get count for this status, default to 0 if not present
                $count = $counts->get($status, 0);
                
                // Calculate percentage
                $pct = $total > 0 ? round(($count / $total) * 100, 1) : 0;
                
                // Add to arrays
                $values[] = $count;
                // Label format: "Present (95%)" or "Absent (0%)"
                $labels[] = "{$status} ({$pct}%)";
                $bgColors[] = $colors[$status] ?? '#cbd5e1';
            }

            $data[$func] = [
                'type' => 'doughnut',
                'data' => [
                    'labels' => $labels,
                    'datasets' => [[
                        'data' => $values,
                        'backgroundColor' => $bgColors,
                        'borderWidth' => 0,
                        'hoverOffset' => 4
                    ]],
                ],
                'options' => [
                    'responsive' => true,
                    'maintainAspectRatio' => false,
                    'plugins' => [
                        'legend' => [
                            'display' => true,
                            'position' => 'bottom',
                            'align' => 'center',
                            'labels' => [
                                'usePointStyle' => true,
                                'boxWidth' => 8,
                                'padding' => 15,
                                'font' => [
                                    'family' => "'Instrument Sans', sans-serif",
                                    'size' => 11
                                ],
                            ],
                        ],
                    ],
                    'cutout' => '60%',
                ],
            ];
        }

        return $data;
    }
}
