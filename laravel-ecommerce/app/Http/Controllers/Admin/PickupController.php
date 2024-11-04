<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class PickupController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    //pickup points index method
    function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('pickup_points')->latest()->get();

            return DataTables::of($data)->addIndexColumn()->addColumn('action', function ($row) {
                $actionbtn = '<a href="" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-regular fa-pen-to-square"></i>edit</a>
                <a href="' . route('pickup_point.delete', [$row->id]) . '" class="btn btn-danger btn-sm" id="pickup_point_delete"><i class="fa-solid fa-trash"></i>delete</a>';
                return $actionbtn;
            })->rawColumns(['action'])->make(true);
        }
        return view('admin.pickup_point.index');
    }

    //pickup point store method
    function store(Request $request)
    {
        $data = array();
        $data['pickup_point_name'] = $request->pickup_point_name;
        $data['pickup_point_address'] = $request->pickup_point_address;
        $data['pickup_point_phone'] = $request->pickup_point_phone;
        $data['pickup_point_phone_two'] = $request->pickup_point_phone_two;

        DB::table('pickup_points')->insert($data);
        return response()->json('pickup point added');
    }


    //pickup point method
    function destroy($id)
    {
        DB::table('pickup_points')->where('id', $id)->delete();
        return response()->json('pickup point deleted');
    }

    //pickup point edit method
    function edit($id)
    {
        $pickup = DB::table('pickup_points')->where('id', $id)->first();
        return view('admin.pickup_point.edit', compact('pickup'));
    }

    // pickup point update method 
    function update(Request $request)
    {
        $data = array();
        $data['pickup_point_name'] = $request->pickup_point_name;
        $data['pickup_point_address'] = $request->pickup_point_address;
        $data['pickup_point_phone'] = $request->pickup_point_phone;
        $data['pickup_point_phone_two'] = $request->pickup_point_phone_two;

        DB::table('pickup_points')->where('id', $request->id)->update($data);
        return response()->json('pickup point updated');
    }
}
