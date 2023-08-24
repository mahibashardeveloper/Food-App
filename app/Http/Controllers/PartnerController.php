<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\PartnerService;
use Illuminate\Routing\Controller as BaseController;

class PartnerController extends BaseController
{

    public function partner(){
        return view('app.partner');
    }

    public function create(Request $request){
        $rv = PartnerService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = PartnerService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = PartnerService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = PartnerService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = PartnerService::delete($request);
        return response()->json($rv, 200);
    }

    public function login(Request $request){
        $rv = PartnerService::login($request);
        return response()->json($rv, 200);
    }
    public function forgot(Request $request)
    {
        $rv = PartnerService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = PartnerService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = PartnerService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = PartnerService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = PartnerService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = PartnerService::profile_logout($request);
        return response()->json($rv, 200);
    }

}
