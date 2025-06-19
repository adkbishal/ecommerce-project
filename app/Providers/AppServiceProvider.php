<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App\Http\Middleware\RoleMiddleware;
use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config as FacadesConfig;
// use PSpell\Config;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

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
    public function boot(Router $router): void
    {
        // Register the alias here
        $router->aliasMiddleware('role', RoleMiddleware::class);
        Paginator::useBootstrap();

        /** Set Time Zone */
        $generalSetting = GeneralSetting::first();
        Config::set('app.timezone', $generalSetting->time_zone);

        /** Share Variable at all view */
        View::composer('*', function ($view) use ($generalSetting) {
            $view->with('settings', $generalSetting);
        });

    }
}
