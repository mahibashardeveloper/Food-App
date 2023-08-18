<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\SubAdminService;
use Illuminate\Routing\Controller as BaseController;

class SubAdminController extends BaseController
{

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

}
