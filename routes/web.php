<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DeliveryManController;
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

/* -------------------------- subAdmin Controller ------------------------ */
Route::middleware('SubAdminLoginCheck')->get('/subAdmin/auth/{any}', [SubAdminController::class, 'subAdmin'])->where('any', '.*')->name('lvs.subAdmin.auth');
Route::middleware('SubAdminLoginCheck')->get('/subAdmin/', [SubAdminController::class, 'subAdmin'])->where('any', '.*')->name('lvs.subAdmin');
Route::middleware('SubAdminLoginCheck')->get('/subAdmin/{any}', [SubAdminController::class, 'subAdmin'])->where('any', '.*')->name('lvs.subAdmin.any');
Route::get('/subAdmin', function (){ return redirect()->route('lvs.subAdmin.any','dashboard'); });

/* -------------------------- vendor Controller ------------------------ */
Route::middleware('VendorLoginCheck')->get('/vendor/auth/{any}', [VendorController::class, 'vendor'])->where('any', '.*')->name('lvs.vendor.auth');
Route::middleware('VendorLoginCheck')->get('/vendor/', [VendorController::class, 'vendor'])->where('any', '.*')->name('lvs.vendor');
Route::middleware('VendorLoginCheck')->get('/vendor/{any}', [VendorController::class, 'vendor'])->where('any', '.*')->name('lvs.vendor.any');
Route::get('/vendor', function (){ return redirect()->route('lvs.vendor.any','dashboard'); });

/* -------------------------- deliveryman Controller ------------------------ */
Route::middleware('DeliveryManLoginCheck')->get('/deliveryMan/auth/{any}', [DeliveryManController::class, 'deliveryMan'])->where('any', '.*')->name('lvs.deliveryMan.auth');
Route::middleware('DeliveryManLoginCheck')->get('/deliveryMan/', [DeliveryManController::class, 'deliveryMan'])->where('any', '.*')->name('lvs.deliveryMan');
Route::middleware('DeliveryManLoginCheck')->get('/deliveryMan/{any}', [DeliveryManController::class, 'deliveryMan'])->where('any', '.*')->name('lvs.deliveryMan.any');
Route::get('/deliveryMan', function (){ return redirect()->route('lvs.deliveryMan.any','dashboard'); });

/* -------------------------- customer Controller ------------------------ */
Route::middleware('CustomerLoginCheck')->get('/front/auth/{any}', [CustomerController::class, 'index'])->where('any', '.*')->name('lvs.front.auth');
Route::middleware('CustomerLoginCheck')->get('/front/profile', [CustomerController::class, 'index'])->name('lvs.front.profile');
Route::middleware('CustomerLoginCheck')->get('/front/my_account', [CustomerController::class, 'index'])->name('lvs.front.my_account');
Route::middleware('CustomerLoginCheck')->get('/front/edit_account', [CustomerController::class, 'index'])->name('lvs.front.edit_account');
Route::middleware('CustomerLoginCheck')->get('/front/order_history', [CustomerController::class, 'index'])->name('lvs.front.order_history');
Route::middleware('CustomerLoginCheck')->get('/front/wishlist', [CustomerController::class, 'index'])->name('lvs.front.wishlist');
Route::middleware('CustomerLoginCheck')->get('/front/newsletter', [CustomerController::class, 'index'])->name('lvs.front.newsletter');
Route::get('/front/profile/', function (){ return redirect()->route('lvs.front.any','my_account'); });

/* -------------------------- Front controller ----------------------------------- */
Route::get('/front/', [CustomerController::class, 'index'])->where('any', '.*')->name('lvs.front');
Route::get('/front/{any}', [CustomerController::class, 'index'])->where('any', '.*')->name('lvs.front.any');
Route::get('/', function (){ return redirect()->route('lvs.front.any','home'); });

Route::prefix('globalCategory')->group(function () { Route::get('/list', [FrontController::class, 'category_list']); } );
Route::prefix('globalProduct')->group(function () { Route::get('/list', [FrontController::class, 'product_list']); } );
Route::prefix('globalPartner')->group(function () { Route::get('/list', [FrontController::class, 'partner_list']); } );
Route::prefix('globalMerchant')->group(function () { Route::get('/list', [FrontController::class, 'merchant_list']); } );
