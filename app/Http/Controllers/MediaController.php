<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\mediaService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MediaController extends BaseController
{

    public function upload(Request $request){
        $rv = MediaService::upload($request);
        return response()->json($rv, 200);
    }

}
