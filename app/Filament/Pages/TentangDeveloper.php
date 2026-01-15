<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class TentangDeveloper extends Page
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-circle';

    protected string $view = 'filament.pages.tentang-developer';
    
    protected static ?string $navigationLabel = 'Tentang Developer';
    
    protected static ?string $title = 'Profile Developer';
    
    protected static ?string $slug = 'tentang-developer';
    
    protected static ?int $navigationSort = 99;
}
