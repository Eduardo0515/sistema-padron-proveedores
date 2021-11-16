<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\V1\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.admin_lte', function($view) {
            $view->with('menus', Menu::menus());
        });
    }
}
