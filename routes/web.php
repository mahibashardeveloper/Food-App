<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\CustomerController;

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

/* -------------------------- merchant Controller ------------------------ */
Route::middleware('MerchantLoginCheck')->get('/merchant/auth/{any}', [MerchantController::class, 'merchant'])->where('any', '.*')->name('lvs.merchant.auth');
Route::middleware('MerchantLoginCheck')->get('/merchant/', [MerchantController::class, 'merchant'])->where('any', '.*')->name('lvs.merchant');
Route::middleware('MerchantLoginCheck')->get('/merchant/{any}', [MerchantController::class, 'merchant'])->where('any', '.*')->name('lvs.merchant.any');
Route::get('/merchant', function (){ return redirect()->route('lvs.merchant.any','dashboard'); });

/* -------------------------- partner Controller ------------------------ */
Route::middleware('PartnerLoginCheck')->get('/partner/auth/{any}', [PartnerController::class, 'partner'])->where('any', '.*')->name('lvs.partner.auth');
Route::middleware('PartnerLoginCheck')->get('/partner/', [PartnerController::class, 'partner'])->where('any', '.*')->name('lvs.partner');
Route::middleware('PartnerLoginCheck')->get('/partner/{any}', [PartnerController::class, 'partner'])->where('any', '.*')->name('lvs.partner.any');
Route::get('/partner', function (){ return redirect()->route('lvs.partner.any','dashboard'); });

/* -------------------------- Front controller -----------------------------------*/
Route::middleware('CustomerLoginCheck')->get('/front/auth/{any}', [CustomerController::class, 'index'])->where('any', '.*')->name('lvs.front.auth');
Route::get('/front/', [CustomerController::class, 'index'])->where('any', '.*')->name('lvs.front');
Route::get('/front/{any}', [CustomerController::class, 'index'])->where('any', '.*')->name('lvs.front.any');
Route::get('/', function (){ return redirect()->route('lvs.front.any','home'); });
