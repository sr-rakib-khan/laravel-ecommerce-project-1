<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    // brand index method

    function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('brands')->get();

            return DataTables::of($data)->addIndexColumn()->addColumn('action', function ($row) {
                $actionbtn = '<a href="" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#brandeditModal"><i class="fa-regular fa-pen-to-square"></i>edit</a>
                <a href="' . route('brand.delete', [$row->id]) . '" class="btn btn-danger btn-sm delete"><i class="fa-solid fa-trash"></i>delete</a>';
                return $actionbtn;
            })->rawColumns(['action'])->make(true);
        }
        // $category = DB::table('categories')->get();
        return view('admin.category.brand.index');
    }

    //brand store method

    function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands',
        ]);
        
        $slug = Str::slug($request->brand_name, '-');
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::slug($request->brand_name, '-');

        // working with photo
        if ($request->brand_logo) {
            $manager = new ImageManager(new Driver());
            $photo = $request->brand_logo;
            $photo_read = $manager->read($photo);
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_resize = $photo_read->resize(300, 300)->save('public/files/brand/' . $photo_name);

            $data['brand_logo'] = 'public/files/brand/' . $photo_name;
        }


        DB::table('brands')->insert($data);
        $notification = array('message' => 'Brand Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //brand destroy mehtod
    function destroy($id)
    {
        $data = DB::table('brands')->where('id', $id)->first();
        $photo = $data->brand_logo;
        if (File::exists($photo)) {
            unlink($photo);
        }

        DB::table('brands')->where('id', $id)->delete();
        $notification = array('message' => 'Brand Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //edit brand name

    function edit($id)
    {
        $data = DB::table('brands')->where('id', $id)->first();
        return view('admin.category.brand.edit', compact('data'));
    }


    //brand update
    function update(Request $request)
    {
        $slug = Str::slug($request->brand_name, '-');
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::slug($request->brand_name, '-');

        // working with photo
        $new_logo = $request->brand_logo;
        if ($new_logo) {
            $old_logo = $request->old_logo;
            if (File::exists($old_logo)) {
                unlink($old_logo);
            }

            $manager = new ImageManager(new Driver());
            $photo = $request->brand_logo;
            $photo_read = $manager->read($photo);
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_resize = $photo_read->resize(300, 300)->save('public/files/brand/' . $photo_name);

            $data['brand_logo'] = 'public/files/brand/' . $photo_name;

            DB::table('brands')->where('id', $request->id)->update($data);
            $notification = array('message' => 'Brand updated', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['brand_logo'] = $request->old_logo;
            DB::table('brands')->where('id', $request->id)->update($data);
            $notification = array('message' => 'Brand updated', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}
