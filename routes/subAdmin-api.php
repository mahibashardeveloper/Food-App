<?php

use Illuminate\Http\Request;
use App\Http\Controllers\SubAdminController;
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

    ['middleware' => ['SubAdminAuth'], 'prefix' => 'auth'],

    function () {

        Route::post('/login', [SubAdminController::class, 'login'])->name('SubAdmin.Auth.Login');

        Route::post('/forgot', [SubAdminController::class, 'forgot'])->name('SubAdmin.Auth.Forgot');

        Route::post('/reset', [SubAdminController::class, 'reset'])->name('SubAdmin.Auth.Reset');

    }

);

/* ------------------------- vendor Profile Controller --------------------------- */

Route::group(

    ['middleware' => ['SubAdminAuthReq'], 'prefix' => 'profile'],

    function () {

        Route::get('/details', [SubAdminController::class, 'profile_details'])->name('SubAdmin.Profile.Details');

        Route::post('/update', [SubAdminController::class, 'profile_update'])->name('SubAdmin.Profile.Update');

        Route::get('/account_update', [SubAdminController::class, 'profile_account_update'])->name('SubAdmin.Profile.Account_Update');

        Route::post('/password', [SubAdminController::class, 'profile_password'])->name('SubAdmin.Profile.Password');

        Route::get('/logout', [SubAdminController::class, 'profile_logout'])->name('SubAdmin.Profile.Logout');

    }

);

/* ------------------------- Media Controller --------------------------- */

Route::prefix('media')->group( function () {

    Route::post('/upload', [SubAdminController::class, 'upload'])->name('SubAdmin.Media.Upload');

});
