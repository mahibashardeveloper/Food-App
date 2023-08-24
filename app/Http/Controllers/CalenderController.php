<?php

namespace App\Http\Controllers;

use App\Services\CalenderService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CalenderController extends BaseController
{

    public function create(Request $request){
        $rv = CalenderService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = CalenderService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = CalenderService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = CalenderService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = CalenderService::delete($request);
        return response()->json($rv, 200);
    }

}
