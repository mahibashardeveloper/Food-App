<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\MerchantController;

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

Route::middleware('AdminLoginCheck')->get('/admin/{any}', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin');

Route::get('/admin', function (){ return redirect()->route('lvs.admin','dashboard'); });

/* -------------------------- subAdmin Controller ------------------------ */

Route::middleware('SubAdminLoginCheck')->get('/subAdmin/auth/{any}', [SubAdminController::class, 'subAdmin'])->where('any', '.*')->name('lvs.subAdmin.auth');

Route::middleware('SubAdminLoginCheck')->get('/subAdmin/', [SubAdminController::class, 'subAdmin'])->where('any', '.*')->name('lvs.subAdmin');

Route::middleware('SubAdminLoginCheck')->get('/subAdmin/{any}', [SubAdminController::class, 'subAdmin'])->where('any', '.*')->name('lvs.subAdmin');

Route::get('/subAdmin', function (){ return redirect()->route('lvs.subAdmin','dashboard'); });

/* -------------------------- vendor Controller ------------------------ */

Route::middleware('VendorLoginCheck')->get('/vendor/auth/{any}', [VendorController::class, 'vendor'])->where('any', '.*')->name('lvs.vendor.auth');

Route::middleware('VendorLoginCheck')->get('/vendor/', [VendorController::class, 'vendor'])->where('any', '.*')->name('lvs.vendor');

Route::middleware('VendorLoginCheck')->get('/vendor/{any}', [VendorController::class, 'vendor'])->where('any', '.*')->name('lvs.vendor');

Route::get('/vendor', function (){ return redirect()->route('lvs.vendor','dashboard'); });

/* -------------------------- deliveryman Controller ------------------------ */

Route::middleware('DeliveryManLoginCheck')->get('/deliveryMan/auth/{any}', [DeliveryManController::class, 'deliveryMan'])->where('any', '.*')->name('lvs.deliveryMan.auth');

Route::middleware('DeliveryManLoginCheck')->get('/deliveryMan/', [DeliveryManController::class, 'deliveryMan'])->where('any', '.*')->name('lvs.deliveryMan');

Route::middleware('DeliveryManLoginCheck')->get('/deliveryMan/{any}', [DeliveryManController::class, 'deliveryMan'])->where('any', '.*')->name('lvs.deliveryMan');

Route::get('/deliveryMan/', function (){ return redirect()->route('lvs.deliveryMan','dashboard'); });

/* -------------------------- merchant Controller ------------------------ */

Route::middleware('MerchantLoginCheck')->get('/merchant/auth/{any}', [MerchantController::class, 'merchant'])->where('any', '.*')->name('lvs.merchant.auth');

Route::middleware('MerchantLoginCheck')->get('/merchant/', [MerchantController::class, 'merchant'])->where('any', '.*')->name('lvs.merchant');

Route::middleware('MerchantLoginCheck')->get('/merchant/{any}', [MerchantController::class, 'merchant'])->where('any', '.*')->name('lvs.merchant');

Route::get('/merchant/', function (){ return redirect()->route('lvs.merchant','dashboard'); });

/* -------------------------- partner Controller ------------------------ */

Route::middleware('PartnerLoginCheck')->get('/partner/auth/{any}', [PartnerController::class, 'partner'])->where('any', '.*')->name('lvs.partner.auth');

Route::middleware('PartnerLoginCheck')->get('/partner/', [PartnerController::class, 'partner'])->where('any', '.*')->name('lvs.partner');

Route::middleware('PartnerLoginCheck')->get('/partner/{any}', [PartnerController::class, 'partner'])->where('any', '.*')->name('lvs.partner');

Route::get('/partner/', function (){ return redirect()->route('lvs.partner','dashboard'); });

/* -------------------------- Front controller -----------------------------------*/

Route::get('/front/', [FrontController::class, 'index'])->where('any', '.*')->name('lvs.front');

Route::get('/front/{any}', [FrontController::class, 'index'])->where('any', '.*')->name('lvs.front');

Route::get('/', function (){ return redirect()->route('lvs.front','home'); });
