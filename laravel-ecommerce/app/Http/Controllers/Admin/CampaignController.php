<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class CampaignController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    function index(Request $request)
    {
        // $data = DB::table('campaigns')->where('status', 1)->get();

        // return view('Admin.offer.campaign.index', compact('data'));

        if ($request->ajax()) {
            $data = DB::table('campaigns')->get();

            return DataTables::of($data)->addIndexColumn()->addColumn('action', function ($row) {
                $actionbtn = '<a href="" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#campaigneditModal"><i class="fa-regular fa-pen-to-square"></i>edit</a>
                <a href="' . route('campaign.delete', [$row->id]) . '" class="btn btn-danger btn-sm delete"><i class="fa-solid fa-trash"></i>delete</a>';
                return $actionbtn;
            })->rawColumns(['action'])->make(true);
        }

        return view('admin.offer.campaign.index');
    }

    // campaign store 
    function store(Request $request)
    {
        $validated = $request->validate([
            'campaign_title' => 'required|unique:campaigns',
            'start_date' => 'required',
            'end_date' => 'required',
            'discount' => 'required',
        ]);


        $data = array();
        $data['campaign_title'] = $request->campaign_title;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['status'] = $request->status;
        $data['discount'] = $request->discount;


        if ($request->campaign_logo) {
            $manager = new ImageManager(new Driver());
            $photo = $request->campaign_logo;
            $photo_read = $manager->read($photo);
            $photo_name = hexdec(uniqid()) . "." . $photo->getClientOriginalExtension();
            $photo_resize = $photo_read->resize(468, 90)->save('public/files/campaign/' . $photo_name);

            $data['campaign_logo'] = 'public/files/campaign/' . $photo_name;
        }

        DB::table('campaigns')->insert($data);
        $notification = array('message' => 'Campaign Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    function destroy($id)
    {
        $data = DB::table('campaigns')->where('id', $id)->first();
        $image = $data->campaign_logo;
        if (File::exists($image)) {
            unlink($image);
        }

        DB::table('campaigns')->where('id', $id)->delete();
        $notification = array('message' => 'Campaign Deleted', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }


    function edit($id)
    {
        $data = DB::table('campaigns')->where('id', $id)->first();
        return view('admin.offer.campaign.edit', compact('data'));
    }

    function update(Request $request)
    {
        $data = array();
        $data['campaign_title'] = $request->campaign_title;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['status'] = $request->status;
        $data['discount'] = $request->discount;


        if ($request->campaign_logo) {
            if (File::exists($request->campaign_old_logo)) {
                unlink($request->campaign_old_logo);
            }
            $manager = new ImageManager(new Driver());
            $photo = $request->campaign_logo;
            $photo_read = $manager->read($photo);
            $photo_name = hexdec(uniqid()) . "." . $photo->getClientOriginalExtension();
            $photo_resize = $photo_read->resize(468, 90)->save('public/files/campaign/' . $photo_name);

            $data['campaign_logo'] = 'public/files/campaign/' . $photo_name;
            DB::table('campaigns')->where('id', $request->id)->update($data);
            $notification = array('message' => 'Campaign Updated', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $data['campaign_logo'] = $request->campaign_old_logo;
            DB::table('campaigns')->where('id', $request->id)->update($data);
            $notification = array('message' => 'Campaign Updated', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }


    }
}
