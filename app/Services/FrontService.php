<?php

namespace App\Services;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FrontService extends BaseController
{

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

            $results = Products::orderBy('id', 'asc');

            $paginatedData = $results->paginate($limit);

            return ['status' => 200, 'data' => $paginatedData];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

}
