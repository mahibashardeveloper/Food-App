<?php

namespace App\Services;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\DeliveryCharge;

class DeliveryService extends BaseController
{

    public static function list($request)
    {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10000;
            $keyword = $request->q ?? '';
            $results = DeliveryCharge::where('admin_id', $admin_id)->orderBy('id', 'desc');
            if (isset($keyword) && !empty($keyword)) {
                $results->where(function ($q) use ($keyword) {
                    $q->where('deliveryChargeName', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('deliveryChargeAmount', 'LIKE', '%' . $keyword . '%');
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
                    'deliveryChargeName' => 'required',
                    'deliveryChargeAmount' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $deliveryCharge = new DeliveryCharge();
            $deliveryCharge-> admin_id = $admin_id;
            $deliveryCharge-> deliveryChargeName = $request->deliveryChargeName;
            $deliveryCharge-> deliveryChargeAmount = $request->deliveryChargeAmount;
            $deliveryCharge-> save();
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
            $deliveryCharge = DeliveryCharge::where('admin_id', $admin_id)->where('id', $request->id)->first();
            if($deliveryCharge == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            return ['status' => 200, 'data' => $deliveryCharge];
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
                    'deliveryChargeName' => 'required',
                    'deliveryChargeAmount' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $deliveryCharge = DeliveryCharge::where('admin_id', $admin_id)->where('id', $request->id)->first();
            if($deliveryCharge == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            $deliveryCharge->deliveryChargeName = $request->deliveryChargeName;
            $deliveryCharge->deliveryChargeAmount = $request->deliveryChargeAmount;
            $deliveryCharge->save();
            return ['status' => 200, 'msg' => 'data has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function delete($request)
    {
        try {
            DeliveryCharge::whereIn('id', $request->ids)->delete();
            return ['status' => 200, 'msg' => 'data has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
