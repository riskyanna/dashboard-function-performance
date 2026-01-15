<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ReportBug extends Page
{
    protected string $view = 'filament.pages.report-bug';
    
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-bug-ant';
    protected static ?string $navigationLabel = 'Report Bug';
    protected static ?string $title = 'Laporkan Bug';
    protected static ?int $navigationSort = 2;
}
