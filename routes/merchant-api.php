<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MediaController;

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

/* ------------------------- Auth vendor Controller --------------------------- */

Route::group(

    ['middleware' => ['MerchantAuth'], 'prefix' => 'auth'],

    function () {

        Route::post('/login', [MerchantController::class, 'login'])->name('Merchant.Auth.Login');

        Route::post('/forgot', [MerchantController::class, 'forgot'])->name('Merchant.Auth.Forgot');

        Route::post('/reset', [MerchantController::class, 'reset'])->name('Merchant.Auth.Reset');

    }

);

/* ------------------------- vendor Profile Controller --------------------------- */

Route::group(

    ['middleware' => ['MerchantAuthReq'], 'prefix' => 'profile'],

    function () {

        Route::get('/details', [MerchantController::class, 'profile_details'])->name('Merchant.Profile.Details');

        Route::post('/update', [MerchantController::class, 'profile_update'])->name('Merchant.Profile.Update');

        Route::get('/account_update', [MerchantController::class, 'profile_account_update'])->name('Merchant.Profile.Account_Update');

        Route::post('/password', [MerchantController::class, 'profile_password'])->name('Merchant.Profile.Password');

        Route::get('/logout', [MerchantController::class, 'profile_logout'])->name('Merchant.Profile.Logout');

    }

);

/* ------------------------- Media Controller --------------------------- */

Route::prefix('media')->group( function () {

    Route::post('/upload', [MediaController::class, 'upload'])->name('Merchant.Media.Upload');

});
