<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;

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

/* ------------------------- Auth Admin Controller --------------------------- */

Route::group(

    ['middleware' => ['AdminAuth'], 'prefix' => 'auth'],

    function () {

        Route::post('/login', [AdminController::class, 'login'])->name('Admin.Auth.Login');

        Route::post('/register', [AdminController::class, 'register'])->name('Admin.Auth.Register');

        Route::post('/forgot', [AdminController::class, 'forgot'])->name('Admin.Auth.Forgot');

        Route::post('/reset', [AdminController::class, 'reset'])->name('Admin.Auth.Reset');

    }

);

/* ------------------------- Admin Profile Controller --------------------------- */

Route::group(

    ['middleware' => ['AdminAuthReq'], 'prefix' => 'profile'],

    function () {

        Route::get('/details', [AdminController::class, 'profile_details'])->name('Admin.Profile.Details');

        Route::post('/update', [AdminController::class, 'profile_update'])->name('Admin.Profile.Update');

        Route::get('/account_update', [AdminController::class, 'profile_account_update'])->name('Admin.Profile.Account_Update');

        Route::post('/password', [AdminController::class, 'profile_password'])->name('Admin.Profile.Password');

        Route::get('/logout', [AdminController::class, 'profile_logout'])->name('Admin.Profile.Logout');

    }

);

/* ------------------------- SubAdmin Controller --------------------------- */

Route::prefix('calender')->group( function () {

    Route::post('/create', [CalenderController::class, 'create'])->name('Calender.Create');

    Route::post('/update', [CalenderController::class, 'update'])->name('Calender.Update');

    Route::post('/list', [CalenderController::class, 'list'])->name('Calender.List');

    Route::post('/single', [CalenderController::class, 'single'])->name('Calender.Single');

    Route::post('/delete', [CalenderController::class, 'delete'])->name('Calender.Delete');

});

/* ------------------------- SubAdmin Controller --------------------------- */

Route::prefix('subAdmin')->group( function () {

    Route::post('/create', [SubAdminController::class, 'create'])->name('SubAdmin.Create');

    Route::post('/update', [SubAdminController::class, 'update'])->name('SubAdmin.Update');

    Route::post('/list', [SubAdminController::class, 'list'])->name('SubAdmin.List');

    Route::post('/single', [SubAdminController::class, 'single'])->name('SubAdmin.Single');

    Route::post('/delete', [SubAdminController::class, 'delete'])->name('SubAdmin.Delete');

});

/* ------------------------- Vendor Controller --------------------------- */

Route::prefix('vendor')->group( function () {

    Route::post('/create', [VendorController::class, 'create'])->name('Vendor.Create');

    Route::post('/update', [VendorController::class, 'update'])->name('Vendor.Update');

    Route::post('/list', [VendorController::class, 'list'])->name('Vendor.List');

    Route::post('/single', [VendorController::class, 'single'])->name('Vendor.Single');

    Route::post('/delete', [VendorController::class, 'delete'])->name('Vendor.Delete');

});

/* ------------------------- DeliveryMan Controller --------------------------- */

Route::prefix('deliveryMan')->group( function () {

    Route::post('/create', [DeliveryManController::class, 'create'])->name('DeliveryMan.Create');

    Route::post('/update', [DeliveryManController::class, 'update'])->name('DeliveryMan.Update');

    Route::post('/list', [DeliveryManController::class, 'list'])->name('DeliveryMan.List');

    Route::post('/single', [DeliveryManController::class, 'single'])->name('DeliveryMan.Single');

    Route::post('/delete', [DeliveryManController::class, 'delete'])->name('DeliveryMan.Delete');

});

/* ------------------------- Partner Controller --------------------------- */

Route::prefix('partner')->group( function () {

    Route::post('/create', [PartnerController::class, 'create'])->name('Partner.Create');

    Route::post('/update', [PartnerController::class, 'update'])->name('Partner.Update');

    Route::post('/list', [PartnerController::class, 'list'])->name('Partner.List');

    Route::post('/single', [PartnerController::class, 'single'])->name('Partner.Single');

    Route::post('/delete', [PartnerController::class, 'delete'])->name('Partner.Delete');

});

/* ------------------------- Merchant Controller --------------------------- */

Route::prefix('merchant')->group( function () {

    Route::post('/create', [MerchantController::class, 'create'])->name('Merchant.Create');

    Route::post('/update', [MerchantController::class, 'update'])->name('Merchant.Update');

    Route::post('/list', [MerchantController::class, 'list'])->name('Merchant.List');

    Route::post('/single', [MerchantController::class, 'single'])->name('Merchant.Single');

    Route::post('/delete', [MerchantController::class, 'delete'])->name('Merchant.Delete');

});

/* ------------------------- Category Controller --------------------------- */

Route::prefix('category')->group( function () {

    Route::post('/create', [CategoryController::class, 'create'])->name('Category.Create');

    Route::post('/update', [CategoryController::class, 'update'])->name('Category.Update');

    Route::post('/list', [CategoryController::class, 'list'])->name('Category.List');

    Route::post('/single', [CategoryController::class, 'single'])->name('Category.Single');

    Route::post('/delete', [CategoryController::class, 'delete'])->name('Category.Delete');

});

/* ------------------------- Product Controller --------------------------- */

Route::prefix('product')->group( function () {

    Route::post('/create', [ProductController::class, 'create'])->name('Product.Create');

    Route::post('/update', [ProductController::class, 'update'])->name('Product.Update');

    Route::post('/list', [ProductController::class, 'list'])->name('Product.List');

    Route::post('/single', [ProductController::class, 'single'])->name('Product.Single');

    Route::post('/delete', [ProductController::class, 'delete'])->name('Product.Delete');

});

/* ------------------------- Order Controller --------------------------- */

Route::prefix('order')->group( function () {

    Route::get('/list', [OrderController::class, 'order_list'])->name('Order.list');

});

/* ------------------------- Media Controller --------------------------- */

Route::prefix('media')->group( function () {

    Route::post('/upload', [MediaController::class, 'upload'])->name('Admin.Media.Upload');

});
