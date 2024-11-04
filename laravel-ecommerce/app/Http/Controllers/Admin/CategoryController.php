<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Html\Editor\Fields\Field;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //category index method
    function index()
    {
        $data = DB::table('categories')->get();
        return view('admin.Category.category.index', compact('data'));
    }

    //category store method
    function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);


        $category = new Category();
        $category->category_name = $request->category_name;
        $category->show_homepage = $request->show_homepage;
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name, '-');

        $slug = Str::slug($request->category_name, '-');
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['show_homepage'] = $request->show_homepage;
        // $data['category_slug'] = Str::slug($request->category_name, '-');

        // working with photo
        if ($request->category_logo) {
            $manager = new ImageManager(new Driver());
            $photo = $request->category_logo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save('public/files/category/' . $photo_name);

            // $data['category_logo'] = 'public/files/category/' . $photo_name;
            $category->category_logo =
                'public/files/category/' . $photo_name;
        }

        // DB::table('categories')->insert($data);

        $category->save();

        $notification = array('message' => 'Category Inserted!', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    // category destroy method 
    function destroy($id)
    {
        //query builder
        // DB::table('categories')->where('id', $id)->delete();

        //modal
        $category =  Category::find($id);
        $category->delete();
        $notification = array('message' => 'Category deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // edit mehtod 
    function edit($id)
    {
        $data = DB::table('categories')->where('id', $id)->first();
        return view('admin.Category.category.edit', compact('data'));
    }

    // update method 
    function update(Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['show_homepage'] = $request->show_homepage;
        $data['category_slug'] = Str::slug($request->category_name, '-');
        $slug = Str::slug($request->category_name, '-');

        if ($request->category_logo) {
            if (File::exists($request->old_logo)) {
                unlink($request->old_logo);
            }

            $manager = new ImageManager(new Driver());
            $photo = $request->category_logo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save('public/files/category/' . $photo_name);

            // $data['category_logo'] = 'public/files/category/' . $photo_name;
            $data['category_logo'] =
                'public/files/category/' . $photo_name;
        }else{
            $data['category_logo'] = $request->old_logo;
        }

        DB::table('categories')->where('id', $id)->update($data);
        $notification = array('message' => 'Category updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
