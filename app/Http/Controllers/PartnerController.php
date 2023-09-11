<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\PartnerService;
use Illuminate\Routing\Controller as BaseController;

class PartnerController extends BaseController
{

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

}
