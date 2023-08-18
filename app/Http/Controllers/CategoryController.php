<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
{

    public function create(Request $request){
        $rv = CategoryService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = CategoryService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = CategoryService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = CategoryService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = CategoryService::delete($request);
        return response()->json($rv, 200);
    }

}
