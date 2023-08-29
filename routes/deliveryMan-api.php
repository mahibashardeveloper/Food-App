<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DeliveryManController;
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

    ['middleware' => ['DeliveryManAuth'], 'prefix' => 'auth'],

    function () {

        Route::post('/login', [DeliveryManController::class, 'login'])->name('DeliveryMan.Auth.Login');

        Route::post('/forgot', [DeliveryManController::class, 'forgot'])->name('DeliveryMan.Auth.Forgot');

        Route::post('/reset', [DeliveryManController::class, 'reset'])->name('DeliveryMan.Auth.Reset');

    }

);

/* ------------------------- vendor Profile Controller --------------------------- */

Route::group(

    ['middleware' => ['DeliveryManAuthReq'], 'prefix' => 'profile'],

    function () {

        Route::get('/details', [DeliveryManController::class, 'profile_details'])->name('DeliveryMan.Profile.Details');

        Route::post('/update', [DeliveryManController::class, 'profile_update'])->name('DeliveryMan.Profile.Update');

        Route::get('/account_update', [DeliveryManController::class, 'profile_account_update'])->name('DeliveryMan.Profile.Account_Update');

        Route::post('/password', [DeliveryManController::class, 'profile_password'])->name('DeliveryMan.Profile.Password');

        Route::get('/logout', [DeliveryManController::class, 'profile_logout'])->name('DeliveryMan.Profile.Logout');

    }

);

/* ------------------------- Media Controller --------------------------- */

Route::prefix('media')->group( function () {

    Route::post('/upload', [MediaController::class, 'upload'])->name('Media.Media.Upload');

});
