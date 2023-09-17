<?php

namespace App\Http\Controllers;

use App\Services\SliderService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class SliderController extends BaseController
{

    public function create(Request $request){
        $rv = SliderService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = SliderService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = SliderService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = SliderService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = SliderService::delete($request);
        return response()->json($rv, 200);
    }

}
