<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\VendorService;
use Illuminate\Routing\Controller as BaseController;

class VendorController extends BaseController
{

    public function vendor(){
        return view('app.front');
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

}
