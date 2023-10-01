<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;

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

/* -------------------------
    Delivery Auth Controller
--------------------------- */

Route::group(
    ['middleware' => ['DeliveryAuth'], 'prefix' => 'auth'],
    function () {
        Route::post('/login', [DeliveryController::class, 'login'])->name('Delivery.Auth.Login');
        Route::post('/forgot', [DeliveryController::class, 'forgot'])->name('Delivery.Auth.Forgot');
        Route::post('/reset', [DeliveryController::class, 'reset'])->name('Delivery.Auth.Reset');
    }
);

/* -------------------------
    Delivery Profile Controller
--------------------------- */

Route::group(
    ['middleware' => ['DeliveryAuthReq'], 'prefix' => 'profile'],
    function () {
        Route::get('/details', [DeliveryController::class, 'profile_details'])->name('Delivery.Profile.Details');
        Route::post('/update', [DeliveryController::class, 'profile_update'])->name('Delivery.Profile.Update');
        Route::get('/account_update', [DeliveryController::class, 'profile_account_update'])->name('Delivery.Profile.Account_Update');
        Route::post('/password', [DeliveryController::class, 'profile_password'])->name('Delivery.Profile.Password');
        Route::get('/logout', [DeliveryController::class, 'profile_logout'])->name('Delivery.Profile.Logout');
    }
);

/* -------------------------
    Order Controller
--------------------------- */

Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'order'],
    function () {
        Route::post('/list', [OrderController::class, 'order_list'])->name('Order_list.List');
        Route::post('/status/change', [OrderController::class, 'changeStatus'])->name('Order_list.ChangeStatus');
    }
);
