<?php

namespace App\Services;

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    public static function list($request)
    {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10000;
            $keyword = $request->q ?? '';
            $results = Products::with(['media', 'category_info'])->where('admin_id', $admin_id)->orderBy('id', 'desc');
            if (isset($keyword) && !empty($keyword)) {
                $results->where(function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('price', 'LIKE', '%' . $keyword . '%');
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
                    'avatar' => 'required|unique:products,avatar',
                    'name' => 'required|unique:products,name',
                    'price' => 'required',
                    'category_id' => 'required',
                    'description' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $product = new Products();
            $product-> admin_id = $admin_id;
            $product-> name = $request->name;
            $product-> price = $request->price;
            $product-> category_id = $request->category_id;
            $product-> avatar = $request->avatar;
            $product-> description = $request->description;
            $product-> save();
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
            $product = Products::with(['media', 'category_info'])->where('admin_id', $admin_id)->where('id', $request->id)->first();
            if($product == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            return ['status' => 200, 'data' => $product];
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
                    'avatar' => 'required',
                    'name' => 'required',
                    'price' => 'required',
                    'category_id' => 'required',
                    'description' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $product = Products::where('admin_id', $admin_id)->where('id', $request->id)->first();
            if($product == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product-> avatar = $request->avatar;
            $product->description = $request->description;
            $product->save();
            return ['status' => 200, 'msg' => 'data has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function delete($request)
    {
        try {
            Products::whereIn('id', $request->ids)->delete();
            return ['status' => 200, 'msg' => 'data has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
