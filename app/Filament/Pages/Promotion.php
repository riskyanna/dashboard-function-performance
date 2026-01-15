<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Promotion extends Page
{
    protected string $view = 'filament.pages.promotion';
    
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationLabel = 'Promosi Jasa';
    protected static ?string $title = 'Promosi Jasa Web';
    protected static string | \UnitEnum | null $navigationGroup = 'Tentang Developer';
    protected static ?int $navigationSort = 1;
}
