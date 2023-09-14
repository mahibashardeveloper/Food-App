<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{

    public function create(Request $request){
        $rv = OrderService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = OrderService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = OrderService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = OrderService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = OrderService::delete($request);
        return response()->json($rv, 200);
    }

    public function order_list(Request $request){
        $rv = OrderService::order_list($request);
        return response()->json($rv, 200);
    }

}
