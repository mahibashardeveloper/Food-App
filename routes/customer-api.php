<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
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

/* ------------------------- Auth vendor Controller --------------------------- */

Route::group(

    ['middleware' => ['CustomerAuth'], 'prefix' => 'auth'],

    function () {

        Route::post('/login', [CustomerController::class, 'login'])->name('Customer.Auth.Login');

        Route::post('/forgot', [CustomerController::class, 'forgot'])->name('Customer.Auth.Forgot');

        Route::post('/reset', [CustomerController::class, 'reset'])->name('Customer.Auth.Reset');

    }

);

/* ------------------------- vendor Profile Controller --------------------------- */

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

/* ------------------------- Media Controller --------------------------- */

Route::prefix('media')->group( function () {

    Route::post('/upload', [MediaController::class, 'upload'])->name('Customer.Media.Upload');

});
