<?php

namespace App\Http\Controllers;

use App\Services\CustomerAuthService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CustomerController extends BaseController
{

    public function index(){
        return view('app.front');
    }
    public function register(Request $request){
        $rv = CustomerAuthService::register($request);
        return response()->json($rv, 200);
    }
    public function login(Request $request){
        $rv = CustomerAuthService::login($request);
        return response()->json($rv, 200);
    }
    public function forgot(Request $request)
    {
        $rv = CustomerAuthService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = CustomerAuthService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = CustomerAuthService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = CustomerAuthService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = CustomerAuthService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = CustomerAuthService::profile_logout($request);
        return response()->json($rv, 200);
    }

    public function customer_list(Request $request)
    {
        $rv = CustomerAuthService::customer_list($request);
        return response()->json($rv, 200);
    }

}
