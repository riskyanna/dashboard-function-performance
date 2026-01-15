<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class OverallAttendanceChart extends Widget
{
    use \Filament\Widgets\Concerns\InteractsWithPageFilters;

    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    
    protected string $view = 'filament.widgets.overall-attendance-chart';
    
    public ?string $heading = 'All Departments Attendance';

    public function getChartConfig(): array
    {
        $date = $this->filters['date'] ?? null;
        $function = $this->filters['function'] ?? null;
        $shift = $this->filters['shift'] ?? null;

        $query = \App\Models\Attendance::query();

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

        $present = (clone $query)->where('status', 'Present')->count();
        $absent = (clone $query)->where('status', 'Absent')->count();
        $leave = (clone $query)->where('status', 'Leave')->count();
        
        $total = $present + $absent + $leave;
        
        $presentPct = $total > 0 ? round(($present / $total) * 100, 1) : 0;
        $absentPct = $total > 0 ? round(($absent / $total) * 100, 1) : 0;
        $leavePct = $total > 0 ? round(($leave / $total) * 100, 1) : 0;

        return [
            'type' => 'doughnut',
            'data' => [
                'datasets' => [
                    [
                        'label' => 'Attendance',
                        'data' => [$present, $absent, $leave],
                        'backgroundColor' => [
                            '#3b82f6', // Present - Blue
                            '#9ca3af', // Absent - Gray
                            '#f97316', // Leave - Orange
                        ],
                        'borderWidth' => 0,
                        'hoverOffset' => 4,
                    ],
                ],
                'labels' => [
                    "Present ({$presentPct}%)", 
                    "Absent ({$absentPct}%)", 
                    "Leave ({$leavePct}%)"
                ],
            ],
            'options' => [
                'responsive' => true,
                'maintainAspectRatio' => false,
                'plugins' => [
                    'legend' => [
                        'display' => true,
                        'position' => 'left',
                        'align' => 'center',
                        'labels' => [
                            'usePointStyle' => true,
                            'boxWidth' => 10,
                            'padding' => 20,
                            'font' => [
                                'family' => "'Instrument Sans', sans-serif",
                                'size' => 14,
                                'weight' => 600,
                            ],
                        ],
                    ],
                    'tooltip' => [
                        'enabled' => true,
                    ],
                ],
                'cutout' => '60%',
            ],
        ];
    }
}
