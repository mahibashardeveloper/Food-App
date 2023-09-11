<?php

namespace App\Http;

use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\AdminAuthReq;
use App\Http\Middleware\AdminLoginCheck;
use App\Http\Middleware\SubAdminAuth;
use App\Http\Middleware\SubAdminAuthReq;
use App\Http\Middleware\SubAdminLoginCheck;
use App\Http\Middleware\vendorAuth;
use App\Http\Middleware\VendorAuthReq;
use App\Http\Middleware\VendorLoginCheck;
use App\Http\Middleware\DeliveryManAuth;
use App\Http\Middleware\DeliveryManAuthReq;
use App\Http\Middleware\DeliveryManLoginCheck;
use App\Http\Middleware\CustomerAuth;
use App\Http\Middleware\CustomerAuthReq;
use App\Http\Middleware\CustomerLoginCheck;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        'AdminAuth' => AdminAuth::class,
        'AdminAuthReq' => AdminAuthReq::class,
        'AdminLoginCheck' => AdminLoginCheck::class,

        'SubAdminAuth' => SubAdminAuth::class,
        'SubAdminAuthReq' => SubAdminAuthReq::class,
        'SubAdminLoginCheck' => SubAdminLoginCheck::class,

        'VendorAuth' => VendorAuth::class,
        'VendorAuthReq' => VendorAuthReq::class,
        'VendorLoginCheck' => VendorLoginCheck::class,

        'DeliveryManAuth' => DeliveryManAuth::class,
        'DeliveryManAuthReq' => DeliveryManAuthReq::class,
        'DeliveryManLoginCheck' => DeliveryManLoginCheck::class,

        'CustomerAuth' => CustomerAuth::class,
        'CustomerAuthReq' => CustomerAuthReq::class,
        'CustomerLoginCheck' => CustomerLoginCheck::class,

    ];
}
