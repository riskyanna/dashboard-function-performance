<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Promotion extends Page
{
    protected string $view = 'filament.pages.promotion';
    
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profile Developer';
    protected static ?string $title = 'Tentang Pengembang';
    protected static string | \UnitEnum | null $navigationGroup = 'Tentang Developer';
    protected static ?int $navigationSort = 1;
}
