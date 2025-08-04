<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController as AdminMenuController;
use \App\Http\Controllers\Admin\ProductController as AdminProductController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\Admin\SliderController;
use \App\Http\Controllers\UserMainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        # menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [AdminMenuController::class, 'create']);
            Route::post('add', [AdminMenuController::class, 'store']);
            Route::get('list', [AdminMenuController::class, 'index']);
            Route::get('edit/{menu}', [AdminMenuController::class, 'show']);
            Route::post('edit/{menu}', [AdminMenuController::class, 'update']);
            Route::delete('destroy', [AdminMenuController::class, 'destroy']);
        });

        # product
        Route::prefix('products')->group(function () {
            Route::get('add', [AdminProductController::class, 'create']);
            Route::post('add', [AdminProductController::class, 'store']);
            Route::get('list', [AdminProductController::class, 'index']);
            Route::get('edit/{product}', [AdminProductController::class, 'show']);
            Route::post('edit/{product}', [AdminProductController::class, 'update']);
            Route::delete('destroy', [AdminProductController::class, 'destroy']);
        });

        # upload link ảnh
        Route::post('upload/services', [UploadController::class, 'store']);

        # Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::delete('destroy', [SliderController::class, 'destroy']);
        });

        
    });
        Route::prefix('cart')->group(function () {
            Route::post('add', [CartController::class, 'add'])->name('add_cart');; // Xử lý thêm sản phẩm vào giỏ
            Route::get('list', [CartController::class, 'show'])->name('list_cart');//hiển thị giỏ hàng
            Route::post('edit/{id}', [CartController::class, 'update']);      // Xử lý cập nhật số lượng
            Route::delete('destroy/{id}', [CartController::class, 'remove']); // Xoá 1 sản phẩm
            Route::delete('clear', [CartController::class, 'clear']);         // Xoá toàn bộ giỏ hàng
        });
});

Route::get('/', [UserMainController::class, 'index']);
Route::post('/services/load-product', [UserMainController::class,'loadProduct']);
Route::get('danh-muc/{id}-{slug}', [MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}', [ProductController::class, 'index']);
Route::get('/chi-tiet-san-pham/{id}-{slug}', [ProductController::class, 'show_detail'])->name('product.product_detail');


