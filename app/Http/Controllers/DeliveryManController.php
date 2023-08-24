<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\DeliveryManService;
use Illuminate\Routing\Controller as BaseController;

class DeliveryManController extends BaseController
{

    public function deliveryMan(){
        return view('app.deliveryMan');
    }

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

    public function login(Request $request){
        $rv = DeliveryManService::login($request);
        return response()->json($rv, 200);
    }
    public function forgot(Request $request)
    {
        $rv = DeliveryManService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = DeliveryManService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = DeliveryManService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = DeliveryManService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = DeliveryManService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = DeliveryManService::profile_logout($request);
        return response()->json($rv, 200);
    }

}
