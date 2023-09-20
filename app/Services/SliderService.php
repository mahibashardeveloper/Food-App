<?php

namespace App\Services;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Sliders;
use Illuminate\Support\Facades\Storage;

class SliderService extends BaseController
{

    public static function list($request)
    {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10000;
            $keyword = $request->q ?? '';
            $results = Sliders::where('admin_id', $admin_id)->orderBy('id', 'desc');
            if (isset($keyword) && !empty($keyword)) {
                $results->where(function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', '%' . $keyword . '%');
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
                    'avatar' => 'required|unique:sliders,avatar',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $slider = new Sliders();
            $slider-> admin_id = $admin_id;
            $slider-> avatar = $request->avatar ?? null;
            $slider-> save();
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
            $slider = Sliders::where('admin_id', $admin_id)->where('id', $request->id)->first();
            if($slider == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            return ['status' => 200, 'data' => $slider];
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
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $slider = Sliders::where('admin_id', $admin_id)->where('id', $request->id)->first();
            if($slider == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            $slider->name = $request->name;
            $slider-> avatar = $request->avatar ?? null;
            $slider->save();
            return ['status' => 200, 'msg' => 'data has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function delete($request)
    {
        try {
            Sliders::whereIn('id', $request->ids)->delete();
            foreach ($request->ids as $sliderId) {
                $slider = Sliders::find($sliderId);
                if ($slider && $slider->avatar) {
                    $avatarPath = $slider->avatar;
                    Storage::delete($avatarPath);
                }
            }
            return ['status' => 200, 'msg' => 'data has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
