<?php

namespace App\Http\Controllers;

use App\Services\DeliveryService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DeliveryController extends BaseController
{

    public function list(Request $request)
    {
        $rv = DeliveryService::list($request);
        return response()->json($rv, 200);
    }

    public function create(Request $request)
    {
        $rv = DeliveryService::create($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request)
    {
        $rv = DeliveryService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request)
    {
        $rv = DeliveryService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request)
    {
        $rv = DeliveryService::delete($request);
        return response()->json($rv, 200);
    }

}
