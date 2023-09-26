<?php

namespace App\Http\Controllers;

use App\Services\AdminAuthService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    public function index(){

        return view('app.admin');

    }

    public function login(Request $request){
        $rv = AdminAuthService::login($request);
        return response()->json($rv, 200);
    }
    public function forgot(Request $request)
    {
        $rv = AdminAuthService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = AdminAuthService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = AdminAuthService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = AdminAuthService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = AdminAuthService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = AdminAuthService::profile_logout($request);
        return response()->json($rv, 200);
    }

    public function settings_details(Request $request)
    {
        $rv = AdminAuthService::settings_details($request);
        return response()->json($rv, 200);
    }

    public function settings_update(Request $request)
    {
        $rv = AdminAuthService::settings_update($request);
        return response()->json($rv, 200);
    }

}
