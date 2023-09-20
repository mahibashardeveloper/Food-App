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

/* -------------------------- Authentication Controller ------------------------ */
Route::middleware('AdminLoginCheck')->get('/admin/auth/{any}', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin.auth');
Route::middleware('AdminLoginCheck')->get('/admin/', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin');
Route::middleware('AdminLoginCheck')->get('/admin/{any}', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin.any');
Route::get('/admin', function (){ return redirect()->route('lvs.admin.any','dashboard'); });

/* -------------------------- customer Controller ------------------------ */
Route::middleware('CustomerLoginCheck')->get('/front/auth/{any}', [CustomerController::class, 'index'])->where('any', '.*')->name('lvs.front.auth');
Route::middleware('CustomerLoginCheck')->get('/front/profile', [CustomerController::class, 'index'])->name('lvs.front.profile');
Route::middleware('CustomerLoginCheck')->get('/front/my_account', [CustomerController::class, 'index'])->name('lvs.front.my_account');
Route::middleware('CustomerLoginCheck')->get('/front/order_history', [CustomerController::class, 'index'])->name('lvs.front.order_history');
Route::middleware('CustomerLoginCheck')->get('/front/newsletter', [CustomerController::class, 'index'])->name('lvs.front.newsletter');
Route::get('/front/profile/', function (){ return redirect()->route('lvs.front.any','my_account'); });
Route::get('/front/{any}', [CustomerController::class, 'index'])->where('any', '.*')->name('lvs.front.any');
Route::get('/front/', [CustomerController::class, 'index'])->where('any', '.*')->name('lvs.front');
Route::get('/', function (){ return redirect()->route('lvs.front.any','home'); });

/* -------------------------- Front controller ----------------------------------- */
Route::prefix('globalSlider')->group(function () { Route::get('/list', [FrontController::class, 'slider_list']); } );
Route::prefix('globalCategory')->group(function () { Route::get('/list', [FrontController::class, 'category_list']); } );
Route::prefix('globalProduct')->group(function () { Route::get('/list', [FrontController::class, 'product_list']); } );
