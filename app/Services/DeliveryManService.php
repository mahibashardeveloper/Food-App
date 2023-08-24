<?php

namespace App\Services;

use App\Models\deliveryMans;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DeliveryManService
{

    public static function list($request)
    {

        try {

            $admin_id = Auth::guard('admins')->id();

            $limit = $request->limit ?? 10000;

            $keyword = $request->q ?? '';

            $results = deliveryMans::where('admin_id', $admin_id)->orderBy('id', 'desc');

            if (isset($keyword) && !empty($keyword)) {

                $results->where(function ($q) use ($keyword) {

                    $q->where('full_name', 'LIKE', '%' . $keyword . '%');

                    $q->orWhere('email', 'LIKE', '%' . $keyword . '%');

                    $q->orWhere('phone_number', 'LIKE', '%' . $keyword . '%');

                });

            }

            $paginatedData = $results->paginate($limit);

            return ['status' => 200, 'data' => $paginatedData];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }


    public static function create($request)
    {

        try {

            $validator = Validator::make(

                $request->all(),

                [

                    'full_name' => 'required|unique:delivery_mans,full_name',

                    'email' => 'required|unique:delivery_mans,email',

                    'phone_number' => 'required|unique:delivery_mans,phone_number',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $hashed_random_password = Str::random(8);

            $admin_id = Auth::guard('admins')->id();

            $deliveryMan = new deliveryMans();

            $deliveryMan-> admin_id = $admin_id;

            $deliveryMan-> avatar = $request->avatar ?? null;

            $deliveryMan-> full_name = $request->full_name;

            $deliveryMan-> email = $request->email;

            $deliveryMan-> phone_number = $request->phone_number;

            $deliveryMan-> password = bcrypt($hashed_random_password);

            $deliveryMan-> save();

            Mail::send('emails.verify-deliveryman', ['user' => $deliveryMan,'password' => $hashed_random_password], function ($message) use ($deliveryMan) {
                $message->to($deliveryMan->email, $deliveryMan->full_name)->subject(env('APP_NAME') . 'Redishketch');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });

            return ['status' => 200, 'msg' => 'data has been saved successfully.'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    public static function single($request)
    {

        try {

            $admin_id = Auth::guard('admins')->id();

            $validator = Validator::make(

                $request->all(),

                [

                    'id' => 'required',

                ]

            );


            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $deliveryMan = deliveryMans::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($deliveryMan == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            return ['status' => 200, 'data' => $deliveryMan];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    public static function update($request)
    {

        try {

            $admin_id = Auth::guard('admins')->id();

            $validator = Validator::make(

                $request->all(),

                [

                    'full_name' => 'required',

                    'email' => 'required',

                    'phone_number' => 'required',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $deliveryMan = deliveryMans::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($deliveryMan == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            $deliveryMan->avatar = $request->avatar ?? null;

            $deliveryMan->full_name = $request->full_name;

            $deliveryMan->email = $request->email;

            $deliveryMan->phone_number = $request->phone_number;

            $deliveryMan->save();

            return ['status' => 200, 'msg' => 'data has been updated successfully.'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    public static function delete($request)
    {

        try {

            deliveryMans::whereIn('id', $request->ids)->delete();

            return ['status' => 200, 'msg' => 'data has been deleted successfully'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

}
