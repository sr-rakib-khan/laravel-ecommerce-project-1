<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    //coupon index mehthod
    function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('coupons')->latest()->get();

            return DataTables::of($data)->addIndexColumn()->addColumn('action', function ($row) {
                $actionbtn = '<a href="" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-regular fa-pen-to-square"></i>edit</a>
                <a href="' . route('coupon.delete', [$row->id]) . '" class="btn btn-danger btn-sm" id="coupon_delete"><i class="fa-solid fa-trash"></i>delete</a>';
                return $actionbtn;
            })->rawColumns(['action'])->make(true);
        }
        return view('admin.offer.coupon.index');
    }
    // coupon store method 
    function store(Request $request)
    {
        $data = array();
        $data['coupon_code'] = $request->coupon_code;
        $data['valid_date'] = $request->coupon_date;
        $data['type'] = $request->coupon_type;
        $data['coupon_amount'] = $request->coupon_amount;
        $data['status'] = $request->coupon_status;

        DB::table('coupons')->insert($data);
        return response()->json('coupon inserted');
    }

    //coupon edit method

    function edit($id)
    {
        $coupon =  DB::table('coupons')->where('id', $id)->first();
        return view('admin.offer.coupon.edit', compact('coupon'));
    }

    // coupon update method 
    function update(Request $request)
    {
        $data = array();
        $data['coupon_code'] = $request->coupon_code;
        $data['valid_date'] = $request->coupon_date;
        $data['type'] = $request->coupon_type;
        $data['coupon_amount'] = $request->coupon_amount;
        $data['status'] = $request->coupon_status;

        DB::table('coupons')->where('id', $request->id)->update($data);
        return response()->json('coupon updated');
    }

    // coupon delete method
    function destroy($id)
    {
        DB::table('coupons')->where('id', $id)->delete();
        return response()->json('coupon deleted!');
    }
}
