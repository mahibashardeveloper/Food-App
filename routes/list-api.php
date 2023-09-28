<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* --------------------------
    slider_list
------------------------ */

Route::prefix('globalSlider')->group(function () { Route::get('/list', [FrontController::class, 'slider_list']); } );

/* --------------------------
    category_list
------------------------ */

Route::prefix('globalCategory')->group(function () { Route::get('/list', [FrontController::class, 'category_list']); } );

/* --------------------------
    productList
------------------------ */

Route::prefix('globalProduct')->group(function () { Route::post('/list-2', [FrontController::class, 'productList']); } );
