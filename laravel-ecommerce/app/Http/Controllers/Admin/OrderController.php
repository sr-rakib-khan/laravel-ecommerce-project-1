<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderReceivedMail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = product::latest()->get();
            $imageurl = 'public/files/product';
            $orders = "";
            $query = DB::table('orders')->orderBy('id', 'DESC');
            if ($request->date) {
                $date_formate = date('d-m-y', strtotime($request->date));
                $query->where('date', $date_formate);
            }
            if ($request->status == "all") {
                $query->where('status', 0)->orWhere('status', 1)->orWhere('status', 2)->orWhere('status', 3)->orWhere('status', 4)->orWhere('status', 5);
            }
            if ($request->status == 0) {
                $query->where('status', 0);
            }
            if ($request->status == 1) {
                $query->where('status', 1);
            }
            if ($request->status == 2) {
                $query->where('status', 2);
            }
            if ($request->status == 3) {
                $query->where('status', 3);
            }
            if ($request->status == 4) {
                $query->where('status', 4);
            }
            if ($request->status == 5) {
                $query->where('status', 5);
            }

            $orders = $query->get();

            return DataTables::of($orders)->addIndexColumn()
                ->editColumn(
                    'Status',
                    function ($row) {
                        if ($row->status == 0) {
                            return 'span class="badge badge-danger">Order pending</span>';
                        } elseif ($row->status == 1) {
                            return 'span class="badge badge-primary">Order received</span>';
                        } elseif ($row->status == 2) {
                            return '<span class="badge badge-primary">Order Shipped</span>';
                        } elseif ($row->status == 3) {
                            return '<span class="badge badge-success">Order Completed</span>';
                        } elseif ($row->status == 4) {
                            return '<span class="badge badge-warning">Order return</span>';
                        } else {
                            return '<span class="badge badge-danger">Order cancled</span>';
                        }
                    }
                )
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#ordereditModal"><i class="fa-regular fa-pen-to-square"></i>edit</a>
                <a href="" data-id="' . $row->id . '" class="btn btn-info btn-sm view" data-bs-toggle="modal" data-bs-target="#orderviewModal"><i class="fa-regular fa-eye"></i></a>
                <a href="' . route('order.admin.delete', $row->id) . '" class="btn btn-danger btn-sm delete"><i class="fa-solid fa-trash"></i></a>';
                    return $actionbtn;
                })->rawColumns(['Status', 'action'])->make(true);
        }
        return view('admin.order.index');
    }


    //order edit
    function EditOrder($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        return view('admin.order.edit', compact('order'));
    }


    //order update
    function OrderUpdate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $data = array();
        $data['c_name'] = $request->name;
        $data['c_shipping_address'] = $request->address;
        $data['c_phone'] = $request->phone;
        $data['status'] = $request->status;

        DB::table('orders')->where('id', $request->id)->update($data);
        $order = DB::table('orders')->where('id', $request->id)->first();

        if ($request->status == 1) {
            Mail::to($order->c_email)->send(new OrderReceivedMail($order));
        }


        return response()->json('Order updated successfully!');
    }


    // order view method
    function OrderView($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        $order_details = DB::table('order_details')->where('order_id', $id)->first();
        return view('admin.order.view', compact('order', 'order_details'));
    }

    //order delete
    function OrderDelete($id)
    {
        $order = DB::table('orders')->where('id', $id)->delete();
        $order_details = DB::table('order_details')->where('order_id', $id)->delete();

        $notification = array('message' => 'Order Deleted!', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }
}
