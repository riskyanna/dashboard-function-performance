<?php

namespace App\Filament\Resources\Attendances\Schemas;

use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('function')
                    ->maxLength(255),
                \Filament\Forms\Components\Select::make('status')
                    ->options([
                        'Present' => 'Present',
                        'Alfa' => 'Alfa',
                        'Absend' => 'Absend',
                    ])
                    ->required(),
                \Filament\Forms\Components\DatePicker::make('date')
                    ->required(),
            ]);
    }
}
