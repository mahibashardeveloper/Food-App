<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\MerchantService;
use Illuminate\Routing\Controller as BaseController;

class MerchantController extends BaseController
{

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

}
