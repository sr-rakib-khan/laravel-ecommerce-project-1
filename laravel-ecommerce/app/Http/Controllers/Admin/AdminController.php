<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //admin method

    function admin()
    {
        return view('admin.home');
    }

    // custom admin logout

    function adminlogout()
    {
        Auth::logout();

        $notification = array('message' => 'You are logout!', 'alert-type' => 'success');

        return redirect()->route('admin.login')->with($notification);
    }

    //admin password change method
    function passwordchange()
    {
        return view('admin.profile.password_change');
    }

    //admin password update method
    function passwordupdate(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $current_password = Auth::user()->password;
        $old_password = $request->old_password;
        if (Hash::check($old_password, $current_password)) {
            $user = User::findorfail(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array('message' => 'Password Changed', 'alert-type' => 'success');
            return redirect()->route('admin.login')->with($notification);
        } else {
            $notification = array('message' => 'Old Password not matched', 'alert-type' => 'warning');
            return redirect()->back()->with($notification);
        }
    }
}
