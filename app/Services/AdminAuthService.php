<?php

namespace App\Services;

use App\Models\Admins;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminAuthService
{

    // login
    public static function Login($request)
    {
        try {
            $input = $request->input();
            $validator = Validator::make($input, [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return ['status' => 500, 'error' => $validator->errors()];
            }
            $userInfo = Admins::where('email', $input['email'])->first();
            if ($userInfo == null) {
                return ['status' => 500, 'error' => ['email' => ['Email is not exist. Please re-check your email address.']]];
            }
            if (Hash::check($input['password'], $userInfo['password'])) {
                $credential = [
                    'email' => $input['email'],
                    'password' => $input['password']
                ];
                if (Auth::guard('admins')->attempt($credential)) {
                    return ['status' => 200, 'msg' => 'Login Successful!'];
                } else {
                    return ['status' => 500, 'error' => ['email' => 'Invalid credentials! Please try again.']];
                }
            } else {
                return ['status' => 500, 'error' => ['password' => ['Invalid credentials! Please try again.']]];
            }
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

    // forget
    public static function forgot($request)
    {
        try {
            $input = $request->input();
            $validator = Validator::make($input, [
                'email' => 'required|email',
            ]);
            if ($validator->fails()) {
                return ['status' => 500, 'error' => $validator->errors()];
            }
            $userInfo = Admins::where('email', $input['email'])->first();
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
            $userInfo = Admins::where(['email' => $input['email'], 'reset_code' => $input['code']])->first();
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
            $user_id = Auth::guard('admins')->id();
            $user = Admins::with('media')->where('id', $user_id)->first();
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
                    'company_name' => 'required',
                    'email' => 'required|email|unique:admins,email,' . $request->email . ',email',
                    'avatar' => 'required',
                    'first_name' => 'required|min:3',
                    'last_name' => 'required|min:3',
                    'phone_number' => 'required|min:10',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $user = Admins::where('id', Auth::guard('admins')->id())->first();
            $user->company_name = $request->company_name;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->avatar = $request->avatar ?? null;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
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
            $user = Admins::where('id', Auth::guard('admins')->id())->first();
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
            Auth::guard('admins')->logout();
            return ['status' => 200];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    // settings details
    public static function settings_details($request)
    {
        try {
            $user_id = Auth::guard('admins')->id();
            $user = Settings::where('id', $user_id)->first();
            return ['status' => 200, 'data' => $user];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    // settings update
    public static function settings_update($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'facebook' => 'required|url',
                    'twitter' => 'required|url',
                    'instagram' => 'required|url',
                    'linkedin' => 'required|url',
                    'youtube' => 'required|url',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $user = Settings::where('id', Auth::guard('admins')->id())->first();
            $user->facebook = $request->facebook;
            $user->twitter = $request->twitter;
            $user->instagram = $request->instagram;
            $user->linkedin = $request->linkedin;
            $user->youtube = $request->youtube;
            $user->save();
            return ['status' => 200,];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
