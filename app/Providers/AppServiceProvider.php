<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::share([
            'name' => 'name_'.app()->getLocale(),
            'description' => 'description_'.app()->getLocale(),
            'unit' => 'unit_'.app()->getLocale(),
            ]);
    }
}
