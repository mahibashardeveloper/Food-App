<?php

namespace App\Services;

use App\Models\Merchants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MerchantService
{
    public static function list($request)
    {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10000;
            $keyword = $request->q ?? '';
            $results = Merchants::where('admin_id', $admin_id)->orderBy('id', 'desc');
            if (isset($keyword) && !empty($keyword)) {
                $results->where(function ($q) use ($keyword) {
                    $q->where('company_name', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('website_link', 'LIKE', '%' . $keyword . '%');
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
                    'company_name' => 'required|unique:merchants,company_name',
                    'avatar' => 'required',
                    'website_link' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $merchant = new Merchants();
            $merchant-> admin_id = $admin_id;
            $merchant-> avatar = $request->avatar ?? null;
            $merchant-> company_name = $request->company_name;
            $merchant-> website_link = $request->website_link;
            $merchant-> save();
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
            $merchant = Merchants::where('admin_id', $admin_id)->where('id', $request->id)->first();
            if($merchant == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            return ['status' => 200, 'data' => $merchant];
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
                    'avatar' => 'required',
                    'website_link' => 'required'
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $merchant = Merchants::where('admin_id', $admin_id)->where('id', $request->id)->first();
            if($merchant == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            $merchant->avatar = $request->avatar ?? null;
            $merchant->company_name = $request->company_name;
            $merchant->website_link = $request->website_link;
            $merchant->save();
            return ['status' => 200, 'msg' => 'data has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function delete($request)
    {
        try {
            Merchants::whereIn('id', $request->ids)->delete();
            return ['status' => 200, 'msg' => 'data has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
