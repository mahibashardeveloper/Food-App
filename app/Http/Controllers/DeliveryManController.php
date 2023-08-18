<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\DeliveryManService;
use Illuminate\Routing\Controller as BaseController;

class DeliveryManController extends BaseController
{

    public function create(Request $request){
        $rv = DeliveryManService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = DeliveryManService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = DeliveryManService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = DeliveryManService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = DeliveryManService::delete($request);
        return response()->json($rv, 200);
    }

}
