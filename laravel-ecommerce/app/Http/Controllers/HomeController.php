<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_order = DB::table('orders')->where('user_id', Auth::id())->count();
        $complete_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 3)->count();
        $cancle_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 5)->count();
        $return_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 4)->count();

        $orders = DB::table('orders')->where('user_id', Auth::id())->orderBy('id', 'DESC')->limit(10)->get();
        return view('home', compact('orders', 'total_order', 'complete_order', 'cancle_order', 'return_order'));
    }

    function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
