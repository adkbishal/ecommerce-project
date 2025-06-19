<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
{
    Route::middleware(['web', 'auth', 'role:admin'])
        ->prefix('admin')
        ->as('admin.')
        ->group(base_path('routes/admin.php'));

    Route::middleware(['web', 'auth', 'role:vendor'])
        ->prefix('vendor')
        ->as('vendor.')
        ->group(base_path('routes/vendor.php'));
}
   
}
