<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Services\Menu\MenuService;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {   
    View::composer('*', function ($view) {
        // Truyền tổng số sản phẩm trong giỏ
        $cart = session()->get('cart', []);
        $totalItems = array_sum(array_column($cart, 'qty'));

        // Truyền danh sách menus (nếu có MenuService)
        $menuService = app(MenuService::class);
        $menus = $menuService->show();

        $view->with([
            'totalItems' => $totalItems,
            'menus' => $menus
        ]);
    });
    }
}
