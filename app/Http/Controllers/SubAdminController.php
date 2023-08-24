<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\SubAdminService;
use Illuminate\Routing\Controller as BaseController;

class SubAdminController extends BaseController
{

    public function subAdmin(){
        return view('app.subAdmin');
    }

    public function create(Request $request){
        $rv = SubAdminService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = SubAdminService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = SubAdminService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = SubAdminService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = SubAdminService::delete($request);
        return response()->json($rv, 200);
    }

    public function login(Request $request){
        $rv = SubAdminService::login($request);
        return response()->json($rv, 200);
    }
    public function forgot(Request $request)
    {
        $rv = SubAdminService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = SubAdminService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = SubAdminService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = SubAdminService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = SubAdminService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = SubAdminService::profile_logout($request);
        return response()->json($rv, 200);
    }

}
