<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // index method for data read 
    function index()
    {
        $data = DB::table('subcategories')->join('categories', 'subcategories.category_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->get();

        //catetory data
        $category = Category::all();

        return view('admin.category.subcategory.index', compact('data', 'category'));
    }

    //store method
    function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
        ]);


        //model
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
        ]);

        $notification = array('message' => 'Subcategory inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // subcategory delete method 

    function destroy($id)
    {
        // model 
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        $notification = array('message' => 'Subcategory deleted', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }


    //subcategory edit method

    function edit($id)
    {
        $subcategory = Subcategory::find($id);
        $category = Category::all();

        return view('admin.category.subcategory.edit', compact('subcategory', 'category'));
    }


    //subcategory update
    function update(Request $request)
    {
        $id = $request->id;
        $subcategory = Subcategory::where('id', $id)->first();
        $subcategory->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-')
        ]);

        $notification = array('message' => 'Subcategory updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
