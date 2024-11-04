<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    //page show method
    function index()
    {
        $data = DB::table('pages')->get();
        return view('admin.settings.pages.index', compact('data'));
    }


    //page crate method
    function create()
    {
        return view('admin.settings.pages.create');
    }

    // page store method 
    public function store(Request $request)
    {
        DB::table('pages')->insert([
            'page_position' => $request->page_position,
            'page_name' => $request->page_name,
            'page_slug' => Str::slug($request->page_name, '-'),
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
        ]);

        $notification = array('message' => 'Page inserted successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //page delete method
    function destroy($id)
    {
        DB::table('pages')->where('id', $id)->delete();
        $notification = array('message' => 'page deleted successfully', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }

    // page edit method 
    function edit($id)
    {
        $page = DB::table('pages')->where('id', $id)->first();
        return view('admin.settings.pages.edit', compact('page'));
    }

    //page update 
    function update(Request $request, $id)
    {
        $data = array();
        $data['page_position'] = $request->page_position;
        $data['page_name'] = $request->page_name;
        $data['page_slug'] = Str::slug($request->page_name, '-');
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;

        DB::table('pages')->where('id', $id)->update($data);

        $notification = array('message' => 'page updated successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
