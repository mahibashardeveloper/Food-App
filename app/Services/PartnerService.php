<?php

namespace App\Services;

use App\Models\Partners;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PartnerService
{

    public static function list($request)
    {

        try {

            $admin_id = Auth::guard('admins')->id();

            $limit = $request->limit ?? 10000;

            $keyword = $request->q ?? '';

            $results = Partners::where('admin_id', $admin_id)->orderBy('id', 'desc');

            if (isset($keyword) && !empty($keyword)) {

                $results->where(function ($q) use ($keyword) {

                    $q->where('full_name', 'LIKE', '%' . $keyword . '%');

                    $q->orWhere('email', 'LIKE', '%' . $keyword . '%');

                    $q->orWhere('company_name', 'LIKE', '%' . $keyword . '%');

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

                    'company_name' => 'required|unique:partners,company_name',

                    'full_name' => 'required|unique:partners,full_name',

                    'email' => 'required|unique:partners,email',

                    'phone_number' => 'required|unique:partners,phone_number',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $hashed_random_password = Str::random(8);

            $admin_id = Auth::guard('admins')->id();

            $partner = new Partners();

            $partner-> admin_id = $admin_id;

            $partner-> avatar = $request->avatar ?? null;

            $partner-> company_name = $request->company_name;

            $partner-> full_name = $request->full_name;

            $partner-> email = $request->email;

            $partner-> phone_number = $request->phone_number;

            $partner-> password = bcrypt($hashed_random_password);

            $partner-> save();

            Mail::send('emails.verify-partner', ['user' => $partner,'password' => $hashed_random_password], function ($message) use ($partner) {
                $message->to($partner->email, $partner->full_name)->subject(env('APP_NAME') . 'Redishketch');
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

            $partner = Partners::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($partner == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            return ['status' => 200, 'data' => $partner];

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

                    'company_name' => 'required',

                    'full_name' => 'required',

                    'email' => 'required',

                    'phone_number' => 'required',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $partner = Partners::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($partner == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            $partner->avatar = $request->avatar ?? null;

            $partner->company_name = $request->company_name;

            $partner->full_name = $request->full_name;

            $partner->email = $request->email;

            $partner->phone_number = $request->phone_number;

            $partner->save();

            return ['status' => 200, 'msg' => 'data has been updated successfully.'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    public static function delete($request)
    {

        try {

            Partners::whereIn('id', $request->ids)->delete();

            return ['status' => 200, 'msg' => 'data has been deleted successfully'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

}
