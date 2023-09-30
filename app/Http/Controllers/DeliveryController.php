<?php

namespace App\Http\Controllers;

use App\Services\DeliveryAuthService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class DeliveryController extends BaseController
{
    public function index(){

        return view('app.delivery');

    }

    public function login(Request $request){
        $rv = DeliveryAuthService::login($request);
        return response()->json($rv, 200);
    }
    public function forgot(Request $request)
    {
        $rv = DeliveryAuthService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = DeliveryAuthService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = DeliveryAuthService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = DeliveryAuthService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = DeliveryAuthService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = DeliveryAuthService::profile_logout($request);
        return response()->json($rv, 200);
    }

}
