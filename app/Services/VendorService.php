<?php

namespace App\Services;

use App\Models\Vendors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VendorService
{

    public static function list($request)
    {

        try {

            $admin_id = Auth::guard('admins')->id();

            $limit = $request->limit ?? 10000;

            $keyword = $request->q ?? '';

            $results = Vendors::where('admin_id', $admin_id)->orderBy('id', 'desc');

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

                    'full_name' => 'required|unique:vendors,full_name',

                    'email' => 'required|unique:vendors,email',

                    'phone_number' => 'required|unique:vendors,phone_number',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $hashed_random_password = Str::random(8);

            $admin_id = Auth::guard('admins')->id();

            $vendor = new Vendors();

            $vendor-> admin_id = $admin_id;

            $vendor-> avatar = $request->avatar ?? null;

            $vendor-> full_name = $request->full_name;

            $vendor-> email = $request->email;

            $vendor-> phone_number = $request->phone_number;

            $vendor-> password = bcrypt($hashed_random_password);

            $vendor-> save();

            Mail::send('emails.verify-vendor', ['user' => $vendor,'password' => $hashed_random_password], function ($message) use ($vendor) {
                $message->to($vendor->email, $vendor->full_name)->subject(env('APP_NAME') . 'Redishketch');
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

            $vendor = Vendors::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($vendor == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            return ['status' => 200, 'data' => $vendor];

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

            $vendor = Vendors::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($vendor == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            $vendor->avatar = $request->avatar ?? null;

            $vendor->full_name = $request->full_name;

            $vendor->email = $request->email;

            $vendor->phone_number = $request->phone_number;

            $vendor->save();

            return ['status' => 200, 'msg' => 'data has been updated successfully.'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    public static function delete($request)
    {

        try {

            Vendors::whereIn('id', $request->ids)->delete();

            return ['status' => 200, 'msg' => 'data has been deleted successfully'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    public static function login($request)
    {

        try {

            $validator = Validator::make(

                $request->all(),

                [

                    'email' => 'required|email|exists:vendors,email',

                    'password' => 'required|min:6'

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $credential = ['email' => $request->email, 'password' => $request->password];

            if (Auth::guard('vendors')->attempt($credential, $request->remember)) {

                return ['status' => 200, 'data' => Auth::guard('vendors')->user()];

            } else {

                return ['status' => 500, 'errors' => ['error' => 'Invalid Credentials! Please try again']];

            }

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    // forget

    public static function forgot($request)
    {

        try {

            $input = $request->input();

            $validator = Validator::make($input, [

                'email' => 'required|email'

            ]);

            if ($validator->fails()) {

                return ['status' => 500, 'error' => $validator->errors()];

            }

            $userInfo = Vendors::where('email', $input['email'])->first();

            if ($userInfo == null) {

                return ['status' => 500, 'error' => ['email' => ['Email not found.']]];

            }

            $reset_code = rand(100000, 999999);

            $userInfo->reset_code = $reset_code;

            $userInfo->save();

            Mail::send('emails.forgot', ['userInfo' => $userInfo], function ($message) use ($userInfo) {

                $message->to($userInfo['email'], $userInfo['name'])->subject(env('MAIL_FROM_NAME') . ': Password reset code');

                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

            });

            return ['status' => 200, 'msg' => 'A reset code has been sent to your email.'];

        } catch (\Exception $e) {

            return ['status' => 500, 'error' => $e->getMessage()];

        }

    }

    // reset

    public static function reset($request)
    {

        try {

            $input = $request->input();

            $validator = Validator::make($input, [

                'email' => 'required|email',

                'code' => 'required',

                'password' => 'required|min:6|confirmed',

            ]);

            if ($validator->fails()) {

                return ['status' => 500, 'error' => $validator->errors()];

            }

            $userInfo = Vendors::where(['email' => $input['email'], 'reset_code' => $input['code']])->first();

            if ($userInfo == null) {

                return ['status' => 500, 'error' => ['code' => ['Invalid request. Kindly check your reset code please.']]];

            }

            if (Hash::check($input['password'], $userInfo['password'])) {

                return ['status' => 500, 'error' => ['password' => ['Password repetition is not allowed. Please try another password']]];

            }

            $userInfo->password = bcrypt($input['password']);

            $userInfo->reset_code = null;

            $userInfo->save();

            return ['status' => 200, 'msg' => 'The password has been reset successfully.'];

        } catch (\Exception $e) {

            return ['status' => 500, 'error' => $e->getMessage()];

        }

    }

    // profile details

    public static function profile_details($request)
    {

        try {

            $user_id = Auth::guard('vendors')->id();

            $user = Vendors::with('media')->where('id', $user_id)->first();

            return ['status' => 200, 'data' => $user];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    // profile update

    public static function profile_update($request)
    {

        try {

            $validator = Validator::make(

                $request->all(),

                [

                    'full_name' => 'required|min:3',

                    'email' => 'required|email|unique:vendors,email,' . $request->email . ',email',

                    'phone_number' => 'required|min:10',

                    'avatar' => 'required',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $user = Vendors::where('id', Auth::guard('vendors')->id())->first();

            $user->full_name = $request->full_name;

            $user->email = $request->email;

            $user->phone_number = $request->phone_number;

            $user->avatar = $request->avatar ?? null;

            $user->save();

            return ['status' => 200,];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    // password

    public static function profile_password($request)
    {

        try {

            $validator = Validator::make(

                $request->all(),

                [

                    'password' => 'required|min:6|confirmed',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $user = Vendors::where('id', Auth::guard('vendors')->id())->first();

            $user->password = bcrypt($request->password);

            $user->save();

            return ['status' => 200,];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    // logout

    public static function profile_logout($request)
    {

        try {

            Auth::guard('vendors')->logout();

            return ['status' => 200];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

}
