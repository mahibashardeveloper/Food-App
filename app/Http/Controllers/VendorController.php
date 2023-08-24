<?php

namespace App\Http\Controllers;

use App\Services\VendorService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class VendorController extends BaseController
{

    public function vendor(){
        return view('app.vendor');
    }

    public function create(Request $request){
        $rv = VendorService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = VendorService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = VendorService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = VendorService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = VendorService::delete($request);
        return response()->json($rv, 200);
    }

    public function login(Request $request){
        $rv = VendorService::login($request);
        return response()->json($rv, 200);
    }
    public function forgot(Request $request)
    {
        $rv = VendorService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = VendorService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = VendorService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = VendorService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = VendorService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = VendorService::profile_logout($request);
        return response()->json($rv, 200);
    }

}
