<?php

namespace App\Filament\Resources\Attendances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class AttendancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('employee_id')
                    ->label('JID')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('function')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('shift')
                    ->label('Shift')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'L1', 'L1J', 'NS', 'NSJ' => 'Pagi',
                        'L2' => 'Malam',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'L1', 'L1J', 'NS', 'NSJ' => 'info',
                        'L2' => 'warning',
                        'Pagi' => 'info',
                        'Malam' => 'warning',
                        default => 'gray',
                    }),
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Present' => 'success',
                        'Alfa' => 'danger',
                        'Absend' => 'warning',
                        default => 'gray',
                    }),
                \Filament\Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('function')
                    ->options(fn () => \App\Models\Attendance::query()->distinct()->whereNotNull('function')->pluck('function', 'function')->toArray()),
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Present' => 'Present',
                        'Absent' => 'Absent',
                        'Leave' => 'Leave',
                        'Sick' => 'Sick',
                        'Permission' => 'Permission',
                    ]),
                \Filament\Tables\Filters\Filter::make('period')
                    ->form([
                        \Filament\Forms\Components\Select::make('month_year')
                            ->label('Month')
                            ->options(fn () => \App\Models\Attendance::query()->distinct()->whereNotNull('month_year')->pluck('month_year', 'month_year')->toArray())
                            ->live(),
                        \Filament\Forms\Components\Select::make('date')
                            ->label('Filter Date')
                            ->options(function (\Filament\Schemas\Components\Utilities\Get $get) {
                                $month = $get('month_year');
                                $query = \App\Models\Attendance::query()->distinct();
                                
                                if ($month) {
                                    $query->where('month_year', $month);
                                }
                                
                                return $query->orderBy('date', 'desc')
                                    ->whereNotNull('date')
                                    ->pluck('date', 'date')
                                    ->map(fn ($date) => \Carbon\Carbon::parse($date)->format('M d, Y'))
                                    ->toArray();
                            })
                            ->searchable()
                            ->preload(),
                    ])
                    ->query(function (\Illuminate\Database\Eloquent\Builder $query, array $data): \Illuminate\Database\Eloquent\Builder {
                        return $query
                            ->when(
                                $data['month_year'],
                                fn (\Illuminate\Database\Eloquent\Builder $query, $date) => $query->where('month_year', $date)
                            )
                            ->when(
                                $data['date'],
                                fn (\Illuminate\Database\Eloquent\Builder $query, $date) => $query->whereDate('date', $date)
                            );
                    }),
            ])
            ->headerActions([
                \Filament\Actions\Action::make('deleteAll')
                    ->label('Hapus SEMUA Data')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Semua Data Attendance?')
                    ->modalDescription('Apakah Anda yakin ingin menghapus SELURUH data? Tindakan ini tidak bisa dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus Semua')
                    ->action(function () {
                        \App\Models\Attendance::truncate();
                        \Filament\Notifications\Notification::make()
                            ->title('Semua data berhasil dihapus')
                            ->success()
                            ->send();
                    }),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->action(function (Collection $records) {
                            $records->each->delete(); // Fallback to standard for now, or use mass delete logic if preferred
                            // Optimization: \App\Models\Attendance::whereKey($records->pluck('id')->toArray())->delete();
                        }),
                ]),
            ]);
    }
}
