<?php

namespace App\Providers;

use App\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        /*view()->composer('*', function ($view) 
        {
            $cart = Cart::where('id_user', Auth::user()->id);
            $view->with('cart', $cart );    
        });*/
    }
}
