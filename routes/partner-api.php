<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
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

    ['middleware' => ['PartnerAuth'], 'prefix' => 'auth'],

    function () {

        Route::post('/login', [PartnerController::class, 'login'])->name('Auth.Login');

        Route::post('/forgot', [PartnerController::class, 'forgot'])->name('Auth.Forgot');

        Route::post('/reset', [PartnerController::class, 'reset'])->name('Auth.Reset');

    }

);

/* ------------------------- vendor Profile Controller --------------------------- */

Route::group(

    ['middleware' => ['PartnerAuthReq'], 'prefix' => 'profile'],

    function () {

        Route::get('/details', [PartnerController::class, 'profile_details'])->name('Partner.Profile.Details');

        Route::post('/update', [PartnerController::class, 'profile_update'])->name('Partner.Profile.Update');

        Route::get('/account_update', [PartnerController::class, 'profile_account_update'])->name('Partner.Profile.Account_Update');

        Route::post('/password', [PartnerController::class, 'profile_password'])->name('Partner.Profile.Password');

        Route::get('/logout', [PartnerController::class, 'profile_logout'])->name('Partner.Profile.Logout');

    }

);

/* ------------------------- Media Controller --------------------------- */

Route::prefix('media')->group( function () {

    Route::post('/upload', [MediaController::class, 'upload'])->name('Media.Upload');

});
