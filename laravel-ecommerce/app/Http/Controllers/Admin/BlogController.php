<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $blog_category = DB::table('blog_categories')->orderBy('id', 'DESC')->get();
        return view('admin.blog_category.blog_category', compact('blog_category'));
    }

    //blog category store
    function Store(Request $request)
    {
        $validated = $request->validate([
            'blog_category_name' => 'required|unique:blog_categories',
        ]);
        $data = array();
        $data['blog_category_name'] = $request->blog_category_name;
        $data['slug'] = Str::slug($request->blog_category_name, '-');
        DB::table('blog_categories')->insert($data);

        $notification = array('message' => 'Blog Category Inserted!', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    // blog category delete method
    function Destroy($id)
    {
        DB::table('blog_categories')->where('id', $id)->delete();

        $notification = array('message' => 'Blog Category Deleted!', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }

    //blog category edit method
    function Edit($id)
    {
        $blog_category =  DB::table('blog_categories')->where('id', $id)->first();
        return view('admin.blog_category.blog_category_edit', compact('blog_category'));
    }

    //blog category update
    function Update(Request $request)
    {
        $data = array();
        $data['blog_category_name'] = $request->blogcategory_name;
        $data['slug'] = Str::slug($request->blogcategory_name, '-');

        DB::table('blog_categories')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Blog Category updated!', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    //blog page view
    function Viewblogindex()
    {
        $blog = DB::table('blogs')->get();
        return view('admin.blog.index', compact('blog'));
    }
}
