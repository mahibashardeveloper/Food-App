<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use \App\Http\Controllers\SliderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* ------------------------- Auth Admin Controller --------------------------- */

Route::group(
    ['middleware' => ['AdminAuth'], 'prefix' => 'auth'],
    function () {
        Route::post('/login', [AdminController::class, 'login'])->name('Admin.Auth.Login');
        Route::post('/register', [AdminController::class, 'register'])->name('Admin.Auth.Register');
        Route::post('/forgot', [AdminController::class, 'forgot'])->name('Admin.Auth.Forgot');
        Route::post('/reset', [AdminController::class, 'reset'])->name('Admin.Auth.Reset');
    }
);

/* ------------------------- Admin Profile Controller --------------------------- */

Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'profile'],
    function () {
        Route::get('/details', [AdminController::class, 'profile_details'])->name('Admin.Profile.Details');
        Route::post('/update', [AdminController::class, 'profile_update'])->name('Admin.Profile.Update');
        Route::get('/account_update', [AdminController::class, 'profile_account_update'])->name('Admin.Profile.Account_Update');
        Route::post('/password', [AdminController::class, 'profile_password'])->name('Admin.Profile.Password');
        Route::get('/logout', [AdminController::class, 'profile_logout'])->name('Admin.Profile.Logout');
    }
);

/* ------------------------- slider Controller --------------------------- */

Route::prefix('slider')->group( function () {
    Route::post('/create', [SliderController::class, 'create'])->name('Slider.Create');
    Route::post('/update', [SliderController::class, 'update'])->name('Slider.Update');
    Route::post('/list', [SliderController::class, 'list'])->name('Slider.List');
    Route::post('/single', [SliderController::class, 'single'])->name('Slider.Single');
    Route::post('/delete', [SliderController::class, 'delete'])->name('Slider.Delete');
});

/* ------------------------- Category Controller --------------------------- */

Route::prefix('category')->group( function () {
    Route::post('/create', [CategoryController::class, 'create'])->name('Category.Create');
    Route::post('/update', [CategoryController::class, 'update'])->name('Category.Update');
    Route::post('/list', [CategoryController::class, 'list'])->name('Category.List');
    Route::post('/single', [CategoryController::class, 'single'])->name('Category.Single');
    Route::post('/delete', [CategoryController::class, 'delete'])->name('Category.Delete');
});

/* ------------------------- Product Controller --------------------------- */

Route::prefix('product')->group( function () {
    Route::post('/create', [ProductController::class, 'create'])->name('Product.Create');
    Route::post('/update', [ProductController::class, 'update'])->name('Product.Update');
    Route::post('/list', [ProductController::class, 'list'])->name('Product.List');
    Route::post('/single', [ProductController::class, 'single'])->name('Product.Single');
    Route::post('/delete', [ProductController::class, 'delete'])->name('Product.Delete');
});

/* ------------------------- Order Controller --------------------------- */

Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'order'],
    function () {
        Route::post('/update', [OrderController::class, 'update'])->name('Order.Update');
        Route::post('/list', [OrderController::class, 'order_list'])->name('Order.List');
        Route::post('/status/change', [OrderController::class, 'changeStatus'])->name('Order.ChangeStatus');
    }
);

/* ------------------------- Customer Controller --------------------------- */

Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'customer'],
    function () {
        Route::post('/list', [CustomerController::class, 'customer_list'])->name('Customer_list.List');
    }
);

/* ------------------------- Status Controller --------------------------- */

/* ------------------------- Media Controller --------------------------- */

Route::prefix('media')->group( function () {
    Route::post('/upload', [MediaController::class, 'upload'])->name('Admin.Media.Upload');
});
