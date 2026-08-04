<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // 👈 1. Ajoutez cet import en haut

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

        // 👈 2. Ajoutez cette ligne pour forcer le HTTPS hors du mode local
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }   
        
        Paginator::useBootstrapFive();

    }
}
