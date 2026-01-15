<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AttendanceStatsOverview extends StatsOverviewWidget
{
    use \Filament\Widgets\Concerns\InteractsWithPageFilters;
    
    protected static ?int $sort = 1;

    protected function getStats(): array
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

        $total = $query->count();
        $present = $query->clone()->where('status', 'Present')->count();
        $absent = $query->clone()->where('status', 'Absent')->count();
        $leave = $query->clone()->where('status', 'Leave')->count();

        $presentPct = $total > 0 ? round(($present / $total) * 100, 1) : 0;
        $absentPct = $total > 0 ? round(($absent / $total) * 100, 1) : 0;
        $leavePct = $total > 0 ? round(($leave / $total) * 100, 1) : 0;

        return [
            Stat::make('Present', $present)
                ->description("{$presentPct}% Rate")
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'), // or convert to specific hex if needed, but 'success' (green) is standard
            Stat::make('Absent', $absent)
                ->description("{$absentPct}% Rate")
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'), // 'danger' (red)
            Stat::make('Leave', $leave)
                ->description("{$leavePct}% Rate")
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'), // 'warning' (orange/yellow)
        ];
    }
}
