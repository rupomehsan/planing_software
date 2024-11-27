<?php

namespace App\Http\Controllers\Admin\BarshikPorikolpona;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarshikPorikolpona\BarshikPorikolpona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BarshikPoricolponaController extends Controller
{
    public function index(){
        // dd('index is called');
        $pageLimit = request()->input('limit') ?? 10;
        $orderByColumn = request()->input('sort_by_col');
        $orderByType = request()->input('sort_type');
        $status = request()->input('status');
        $fields = request()->input('fields');
        $with = [];
        $condition = [];
        $data = BarshikPorikolpona::query();

        if (request()->has('search') && request()->input('search')) {
            $searchKey = request()->input('search');
            $data = $data->where(function ($q) use ($searchKey) {
                $q->where('full_name','like', '%' . $searchKey . '%')
                ->orWhere('email', 'like', '%' . $searchKey . '%');
            });
        }

        if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
            $data = $data
                ->with($with)
                ->select($fields)
                ->where($condition)
                ->where('status', $status)
                ->limit($pageLimit)
                ->orderBy($orderByColumn, $orderByType)
                ->get();
        } else {
            $data = $data
                ->with($with)
                ->select($fields)
                ->where($condition)
                ->where('status', $status)
                ->orderBy($orderByColumn, $orderByType)
                ->paginate($pageLimit);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function show($slug)
    {

        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = BarshikPorikolpona::where('slug', $slug)
            ->select($select)
            ->first();
        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ],200);
        } else {
            return response()->json([
                'err_message' => 'data not found',
                'errors' => [
                    'user' => [],
                ],
            ], 404);
        }
    }
    public function store()
    {
        // dd(request()->all(),auth()->user(),request()->password);
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'role' => ['required'],
            'email' => ['required'],
            'password' => ['required','confirmed','min:8'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $randomNumber = rand(1000, 9999);
        $slug = Str::slug(request()->full_name) . '-' . $randomNumber;

        $data = new BarshikPorikolpona();
        $data->full_name = request()->full_name;
        $data->role = request()->role;
        $data->email = request()->email;
        $data->slug = $slug;
        $data->creator = auth()->id();
        $data->status = 1;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = BarshikPorikolpona::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }
        // dd($data, request()->all());
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'role' => ['required'],
            'email' => ['required'],
            'password' => ['sometimes','nullable','min:8','confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->full_name = request()->full_name;
        $data->role = request()->role;
        $data->email = request()->email;
        $data->creator = auth()->id();
        $data->status = 1;
        $data->save();

        if (request()->hasFile('image')) {
            //
        }
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ],200);

    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'slug' => ['required', 'exists:barshik_porikolponas,slug'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = BarshikPorikolpona::where('slug',request()->slug)->first();
        $data->status = 0;
        $data->save();

        return response()->json([
            'status' => 'success',
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $data = BarshikPorikolpona::where('slug',request()->slug)->first();
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given slug ' . (request()->slug ? request()->slug : 'null')]],
            ], 422);
        }
        $data->delete();

        return response()->json([
            'status' => 'success',
            'result' => 'Item Successfully deleted'
        ],200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:barshik_porikolponas,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = BarshikPorikolpona::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }

    public function import(){
        // dd(request()->data);
        foreach (request()->data as $row) {
            $randomNumber = rand(1000, 9999);
            $slug = Str::slug($row['title']) . '-' . $randomNumber;
            BarshikPorikolpona::create([
                "title" => $row['title'],
                "slug" =>$slug,
                "creator" => auth()->id(),
                "status" =>1,

           ]);
       }

       return response()->json([
            'status' => 'success',
            'result' => 'Item Successfully uploded'
        ],200);

    }

}
