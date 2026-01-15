<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
            
            // Fix Livewire HTTPS requests
            \Livewire\Livewire::setUpdateRoute(function ($handle) {
                return \Illuminate\Support\Facades\Route::post('/livewire/update', $handle)
                    ->middleware(['web']);
            });
            
            \Livewire\Livewire::setScriptRoute(function ($handle) {
                return \Illuminate\Support\Facades\Route::get('/livewire/livewire.js', $handle);
            });
        }
    }
}
