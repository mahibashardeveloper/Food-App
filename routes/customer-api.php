<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

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

/* ------------------------- Auth customer Controller --------------------------- */

Route::group(

    ['middleware' => ['CustomerAuth'], 'prefix' => 'auth'],

    function () {

        Route::post('/login', [CustomerController::class, 'login'])->name('Customer.Auth.Login');

        Route::post('/register', [CustomerController::class, 'register'])->name('Customer.Auth.Register');

        Route::post('/forgot', [CustomerController::class, 'forgot'])->name('Customer.Auth.Forgot');

        Route::post('/reset', [CustomerController::class, 'reset'])->name('Customer.Auth.Reset');

    }

);

/* ------------------------- customer Profile Controller --------------------------- */

Route::group(

    ['middleware' => ['CustomerAuthReq'], 'prefix' => 'profile'],

    function () {

        Route::get('/details', [CustomerController::class, 'profile_details'])->name('Customer.Profile.Details');

        Route::post('/update', [CustomerController::class, 'profile_update'])->name('Customer.Profile.Update');

        Route::get('/account_update', [CustomerController::class, 'profile_account_update'])->name('Customer.Profile.Account_Update');

        Route::post('/password', [CustomerController::class, 'profile_password'])->name('Customer.Profile.Password');

        Route::get('/logout', [CustomerController::class, 'profile_logout'])->name('Customer.Profile.Logout');

    }

);

Route::group(

    ['middleware' => ['CustomerAuthReq'], 'prefix' => 'order'],

    function () {

        Route::post('/create', [OrderController::class, 'create'])->name('Order.Create');

        Route::post('/list', [OrderController::class, 'list'])->name('Order.History_List');

        Route::post('/delete', [OrderController::class, 'delete'])->name('Order.Delete');

        Route::post('/status/change', [OrderController::class, 'changeStatus'])->name('Order.Status');

    }
);

/* ------------------------- Media Controller --------------------------- */

Route::prefix('media')->group( function () {

    Route::post('/upload', [MediaController::class, 'upload'])->name('Customer.Media.Upload');

});
