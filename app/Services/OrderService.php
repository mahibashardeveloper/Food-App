<?php

namespace App\Services;

use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderService
{

    public static function list($request)
    {
        try {
            $customer_id = Auth::guard('customers')->id();
            $limit = $request->limit ?? 10000;
            $keyword = $request->q ?? '';
            $results = Orders::where('customer_id', $customer_id)->orderBy('id', 'desc');
            if (isset($keyword) && !empty($keyword)) {
                $results->where(function ($q) use ($keyword) {
                    $q->where('order_name', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('order_price', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('order_quantity', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('order_subtotal', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('order_status', 'LIKE', '%' . $keyword . '%');
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
                    'order_name' => 'required',
                    'order_price' => 'required',
                    'order_quantity' => 'required',
                    'order_subTotal' => 'required',
                    'order_status' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $customer_id = Auth::guard('customers')->id();
            $order = new Orders();
            $order-> customer_id = $customer_id;
            $order-> order_name = $request->order_name;
            $order-> order_price = $request->order_price;
            $order-> order_quantity = $request->order_quantity;
            $order-> order_subTotal = $request->order_subTotal;
            $order-> order_status = $request->order_status;
            $order-> save();
            return ['status' => 200, 'msg' => 'data has been saved successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function single($request)
    {
        try {
            $customer_id = Auth::guard('customers')->id();
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $order = Orders::where('customer_id', $customer_id)->where('id', $request->id)->first();
            if($order == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            return ['status' => 200, 'data' => $order];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function update($request)
    {
        try {
            $customer_id = Auth::guard('admins')->id();
            $validator = Validator::make(
                $request->all(),
                [
                    'order_name' => 'required',
                    'order_price' => 'required',
                    'order_quantity' => 'required',
                    'order_subTotal' => 'required',
                    'order_status' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $order = Orders::where('customer_id', $customer_id)->where('id', $request->id)->first();
            if($order == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            $order-> order_name = $request->order_name;
            $order-> order_price = $request->order_price;
            $order-> order_quantity = $request->order_quantity;
            $order-> order_subTotal = $request->order_subTotal;
            $order-> order_status = $request->order_status;
            $order->save();
            return ['status' => 200, 'msg' => 'data has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function delete($request)
    {
        try {
            Orders::whereIn('id', $request->ids)->delete();
            return ['status' => 200, 'msg' => 'data has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
