<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendorController;
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

    ['middleware' => ['VendorAuth'], 'prefix' => 'auth'],

    function () {

        Route::post('/login', [vendorController::class, 'login'])->name('Vendor.Auth.Login');

        Route::post('/forgot', [vendorController::class, 'forgot'])->name('Vendor.Auth.Forgot');

        Route::post('/reset', [vendorController::class, 'reset'])->name('Vendor.Auth.Reset');

    }

);

/* ------------------------- vendor Profile Controller --------------------------- */

Route::group(

    ['middleware' => ['VendorAuthReq'], 'prefix' => 'profile'],

    function () {

        Route::get('/details', [vendorController::class, 'profile_details'])->name('Vendor.Profile.Details');

        Route::post('/update', [vendorController::class, 'profile_update'])->name('Vendor.Profile.Update');

        Route::get('/account_update', [vendorController::class, 'profile_account_update'])->name('Vendor.Profile.Account_Update');

        Route::post('/password', [vendorController::class, 'profile_password'])->name('Vendor.Profile.Password');

        Route::get('/logout', [vendorController::class, 'profile_logout'])->name('Vendor.Profile.Logout');

    }

);

/* ------------------------- Media Controller --------------------------- */

Route::prefix('media')->group( function () {

    Route::post('/upload', [MediaController::class, 'upload'])->name('Vendor.Media.Upload');

});
