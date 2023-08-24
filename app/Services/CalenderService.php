<?php

namespace App\Services;

use App\Models\Calenders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CalenderService
{

    public static function list($request)
    {

        try {

            $admin_id = Auth::guard('admins')->id();

            $limit = $request->limit ?? 10000;

            $keyword = $request->q ?? '';

            $results = Calenders::where('admin_id', $admin_id)->orderBy('id', 'desc');

            if (isset($keyword) && !empty($keyword)) {

                $results->where(function ($q) use ($keyword) {

                    $q->where('topic', 'LIKE', '%' . $keyword . '%');

                    $q->orWhere('date', 'LIKE', '%' . $keyword . '%');

                    $q->orWhere('time', 'LIKE', '%' . $keyword . '%');

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

                    'date' => 'required|unique:Calenders,date',

                    'time' => 'required|unique:Calenders,time',

                    'topic' => 'required|unique:Calenders,topic',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $admin_id = Auth::guard('admins')->id();

            $calender = new Calenders();

            $calender-> admin_id = $admin_id;

            $calender-> date = $request->date;

            $calender-> time = $request->time;

            $calender-> topic = $request->topic;

            $calender-> save();

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

            $calender = Calenders::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($calender == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            return ['status' => 200, 'data' => $calender];

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

                    'date' => 'required',

                    'time' => 'required',

                    'topic' => 'required',

                ]

            );

            if ($validator->fails()) {

                return ['status' => 500, 'errors' => $validator->errors()];

            }

            $calender = Calenders::where('admin_id', $admin_id)->where('id', $request->id)->first();

            if($calender == null){

                return ['status' => 500, 'errors' => 'data not found'];

            }

            $calender->date = $request->date;

            $calender->time = $request->time;

            $calender->topic = $request->topic;

            $calender->save();

            return ['status' => 200, 'msg' => 'data has been updated successfully.'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    public static function delete($request)
    {

        try {

            Calenders::whereIn('id', $request->ids)->delete();

            return ['status' => 200, 'msg' => 'data has been deleted successfully'];

        } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

}
