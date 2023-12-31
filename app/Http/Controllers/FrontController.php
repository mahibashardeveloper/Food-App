<?php

namespace App\Http\Controllers;

use App\Services\FrontService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    public function index(){
        return view('app.front');
    }

    public function slider_list(Request $request){
        $rv = FrontService::slider_list($request);
        return response()->json($rv, 200);
    }

    public function category_list(Request $request){
        $rv = FrontService::category_list($request);
        return response()->json($rv, 200);
    }

    public function product_list(Request $request){
        $rv = FrontService::product_list($request);
        return response()->json($rv, 200);
    }

    public function productList(Request $request){
        $rv = FrontService::productList($request);
        return response()->json($rv, 200);
    }

    public function deliveryCharge_list(Request $request){
        $rv = FrontService::deliveryCharge_list($request);
        return response()->json($rv, 200);
    }

}
