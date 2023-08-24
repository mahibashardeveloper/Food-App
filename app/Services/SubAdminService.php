<?php

namespace App\Services;

use App\Models\SubAdmins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubAdminService
{

    public static function list($request)
    {

        try {

            $admin_id = Auth::guard('admins')->id();

            $limit = $request->limit ?? 10000;

            $keyword = $request->q ?? '';

            $results = SubAdmins::where('admin_id', $admin_id)->orderBy('id', 'desc');

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

                    'full_name' => 'required|unique:sub_admins,full_name',

                    'email' => 'required|unique:sub_admins,email',

                    'phone_number' => 'required|unique:sub_admins,phone_number',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $hashed_random_password = Str::random(8);

            $admin_id = Auth::guard('admins')->id();

            $subAdmin = new SubAdmins();

            $subAdmin-> admin_id = $admin_id;

            $subAdmin-> avatar = $request->avatar ?? null;

            $subAdmin-> full_name = $request->full_name;

            $subAdmin-> email = $request->email;

            $subAdmin-> phone_number = $request->phone_number;

            $subAdmin-> password = bcrypt($hashed_random_password);

            $subAdmin-> save();

            Mail::send('emails.verify-subAdmin', ['user' => $subAdmin,'password' => $hashed_random_password], function ($message) use ($subAdmin) {
                $message->to($subAdmin->email, $subAdmin->full_name)->subject(env('APP_NAME') . 'Redishketch');
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

            $subAdmin = SubAdmins::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($subAdmin == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            return ['status' => 200, 'data' => $subAdmin];

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

            $subAdmin = SubAdmins::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($subAdmin == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            $subAdmin->avatar = $request->avatar ?? null;

            $subAdmin->full_name = $request->full_name;

            $subAdmin->email = $request->email;

            $subAdmin->phone_number = $request->phone_number;

            $subAdmin->save();

            return ['status' => 200, 'msg' => 'data has been updated successfully.'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    public static function delete($request)
    {

        try {

            SubAdmins::whereIn('id', $request->ids)->delete();

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

                    'email' => 'required|email|exists:sub_admins,email',

                    'password' => 'required|min:6'

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $credential = ['email' => $request->email, 'password' => $request->password];

            if (Auth::guard('sub_admins')->attempt($credential, $request->remember)) {

                return ['status' => 200, 'data' => Auth::guard('sub_admins')->user()];

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

            $userInfo = SubAdmins::where('email', $input['email'])->first();

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

            $userInfo = SubAdmins::where(['email' => $input['email'], 'reset_code' => $input['code']])->first();

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

            $user_id = Auth::guard('sub_admins')->id();

            $user = SubAdmins::with('media')->where('id', $user_id)->first();

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

                    'email' => 'required|email|unique:sub_admins,email,' . $request->email . ',email',

                    'phone_number' => 'required|min:10',

                    'avatar' => 'required',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $user = SubAdmins::where('id', Auth::guard('sub_admins')->id())->first();

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

            $user = SubAdmins::where('id', Auth::guard('sub_admins')->id())->first();

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

            Auth::guard('sub_admins')->logout();

            return ['status' => 200];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

}
