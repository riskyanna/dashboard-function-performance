<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Schema;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('function')
                    ->label('Filter Department')
                    ->options(fn () => \App\Models\Attendance::query()->distinct()->whereNotNull('function')->pluck('function', 'function')->toArray())
                    ->placeholder('All Departments')
                    ->searchable()
                    ->preload(),
                \Filament\Forms\Components\Select::make('shift')
                    ->label('Filter Shift')
                    ->options([
                        'Pagi' => 'Pagi',
                        'Malam' => 'Malam',
                    ])
                    ->placeholder('All Shifts'),
                \Filament\Forms\Components\Select::make('date')
                    ->label('Filter Date')
                    ->options(fn () => \App\Models\Attendance::query()
                        ->distinct()
                        ->whereNotNull('date')
                        ->orderBy('date', 'desc')
                        ->pluck('date', 'date')
                        ->map(fn ($date) => \Carbon\Carbon::parse($date)->format('M d, Y'))
                        ->toArray())
                    ->placeholder('All Dates')
                    ->searchable()
                    ->preload(),
            ])
            ->columns(3);
    }
}
