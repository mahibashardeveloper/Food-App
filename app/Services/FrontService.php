<?php

namespace App\Services;

use App\Models\Categories;
use App\Models\DeliveryCharge;
use App\Models\Products;
use App\Models\Sliders;
use Illuminate\Routing\Controller as BaseController;

class FrontService extends BaseController
{

    public static function slider_list($request)
    {
        try {
            $limit = $request->limit ?? 10000;
            $results = Sliders::orderBy('id', 'asc');
            $paginatedData = $results->paginate($limit);
            return ['status' => 200, 'data' => $paginatedData];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function category_list($request)
    {
        try {
            $limit = $request->limit ?? 10000;
            $results = Categories::orderBy('id', 'asc');
            $paginatedData = $results->paginate($limit);
            return ['status' => 200, 'data' => $paginatedData];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function product_list($request)
    {
        try {
            $limit = $request->limit ?? 10000;
            $results = Products::with('category_info')->orderBy('id', 'asc');
            $paginatedData = $results->paginate($limit);
            return ['status' => 200, 'data' => $paginatedData];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }


    public static function productList($request)
    {
        try {
            $limit = $request->limit ?? 20;
            $results = Products::with('category_info')->orderBy('id', 'asc');
            if(isset($request->category_id) && !empty($request->category_id)){
                $results->where('category_id', $request->category_id);
            }
            $paginatedData = $results->paginate($limit);
            return ['status' => 200, 'data' => $paginatedData];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function deliveryCharge_list($request)
    {
        try {
            $limit = $request->limit ?? 10000;
            $results = DeliveryCharge::orderBy('id', 'asc');
            $paginatedData = $results->paginate($limit);
            return ['status' => 200, 'data' => $paginatedData];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
