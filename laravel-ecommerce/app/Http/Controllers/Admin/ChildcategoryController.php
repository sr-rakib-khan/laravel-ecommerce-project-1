<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ChildcategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    // child category index method 
    function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('childcategories')->join('categories', 'childcategories.category_id', 'categories.id')->join('subcategories', 'childcategories.subcategory_id', 'subcategories.id')->select('categories.category_name', 'subcategories.subcategory_name', 'childcategories.*')->get();

            return DataTables::of($data)->addIndexColumn()->addColumn('action', function ($row) {
                $actionbtn = '<a href="" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-regular fa-pen-to-square"></i>edit</a>
                <a href="' . route('childcategory.delete', [$row->id]) . '" class="btn btn-danger btn-sm delete"><i class="fa-solid fa-trash"></i>delete</a>';
                return $actionbtn;
            })->rawColumns(['action'])->make(true);
        }
        $category = DB::table('categories')->get();
        return view('admin.category.childcategory.index', compact('category'));
    }


    //child category store

    function store(Request $request)
    {
        $category_id = DB::table('subcategories')->where('id', $request->subcategory_id)->first();

        $id = $category_id->category_id;

        $data = [
            'category_id' => $id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => Str::slug($request->childcategory_name, '-'),
        ];

        DB::table('childcategories')->insert($data);

        $notification = array('message' => 'Child Category inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    function destroy($id)
    {
        DB::table('childcategories')->where('id', $id)->delete();
        $notification = array('message' => 'Child Category deleted', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }


    //child category edit method

    function edit($id)
    {
        $category = DB::table('categories')->get();
        $childcategory = DB::table('childcategories')->where('id', $id)->first();
        return view('admin.category.childcategory.edit', compact('category', 'childcategory'));
    }



    //child category update 

    function update(Request $request)
    {
        $cat_id = DB::table('subcategories')->where('id', $request->subcategory_id)->first();

        $data = array();
        $data['category_id'] = $cat_id->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_name'] = $request->childcategory_name;
        $data['childcategory_slug'] = Str::slug($request->childcategory_name, '-');

        DB::table('childcategories')->where('id', $request->id)->update($data);
        $notification = array('message' => 'Child Category updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



    //get child category for product insert page
    function getchildcategory($id)
    {
        $data = DB::table('childcategories')->where('subcategory_id', $id)->get();
        return response()->json($data);
    }
}
