<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
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
        View::composer('*', function ($view) {
        $cart = Session::get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $price = $item['price_sale'] > 0 ? $item['price_sale'] : $item['price'];
            $total += $price * $item['qty'];
            $totalItems = array_sum(array_column($cart, 'qty')); 
        }

        $view->with('cart', $cart)->with('cartTotal', $total);
    });
    }
  




}
