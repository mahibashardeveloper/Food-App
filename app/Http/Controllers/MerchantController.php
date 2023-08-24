<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\MerchantService;
use Illuminate\Routing\Controller as BaseController;

class MerchantController extends BaseController
{

    public function merchant(){
        return view('app.merchant');
    }

    public function create(Request $request){
        $rv = MerchantService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = MerchantService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = MerchantService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = MerchantService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = MerchantService::delete($request);
        return response()->json($rv, 200);
    }

    public function login(Request $request){
        $rv = MerchantService::login($request);
        return response()->json($rv, 200);
    }
    public function forgot(Request $request)
    {
        $rv = MerchantService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = MerchantService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = MerchantService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = MerchantService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = MerchantService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = MerchantService::profile_logout($request);
        return response()->json($rv, 200);
    }

}
