<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class WarehouseController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('warehouses')->latest()->get();

            return DataTables::of($data)->addIndexColumn()->addColumn('action', function ($row) {
                $actionbtn = '<a href="" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-regular fa-pen-to-square"></i>edit</a>
                <a href="' . route('warehouse.delete', [$row->id]) . '" class="btn btn-danger btn-sm delete"><i class="fa-solid fa-trash"></i>delete</a>';
                return $actionbtn;
            })->rawColumns(['action'])->make(true);
        }
        return view('admin.category.warehouse.index');
    }

    //wharehouse store
    function store(Request $request)
    {
        $validated = $request->validate([
            'warehouse_name' => 'required|unique:warehouses',
        ]);

        $data = array();
        $data['warehouse_name'] = $request->warehouse_name;
        $data['warehouse_address'] = $request->warehouse_address;
        $data['warehouse_phone'] = $request->warehouse_phone;

        DB::table('warehouses')->insert($data);
        $notification = array('message' => 'Warehouse Added', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // warehouse delete method 
    function destroy($id)
    {
        DB::table('warehouses')->where('id', $id)->delete();
        $notification = array('message' => 'Warehouse Deleted', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }


    // warehouse edit method 
    function edit($id)
    {
        $warehouse = DB::table('warehouses')->where('id', $id)->first();
        return view('admin.category.warehouse.edit', compact('warehouse'));
    }

    //warehouse update method
    function update(Request $request)
    {
        $data = array();
        $data['warehouse_name'] = $request->warehouse_name;
        $data['warehouse_address'] = $request->warehouse_address;
        $data['warehouse_phone'] = $request->warehouse_phone;

        DB::table('warehouses')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Warehouse Updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
