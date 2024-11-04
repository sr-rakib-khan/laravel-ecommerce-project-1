<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Imagick\Driver;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function Profile()
    {
        $orders = DB::table('orders')->where('user_id', Auth::id())->orderBy('id', 'DESC')->limit(10)->get();
        return view('forntend.profile', compact('orders'));
    }

    function setting()
    {
        return view('user.setting');
    }


    //customer password change
    // function UserpasswordChange(Request $request)
    // {
    //     $validated = $request->validate([
    //         'old_password' => 'required',
    //         'new_password' => 'required|min:6|confirmed'
    //     ]);

    //     $current_password = Auth::user()->password;
    //     $old_password = $request->old_password;
    //     if (Hash::check($old_password, $current_password)) {
    //         $user = User::findorfail(Auth::id());
    //         $user->password = Hash::make($request->new_password);
    //         $user->save();
    //         Auth::logout();

    //         $notification = array('message' => 'Password Changed', 'alert-type' => 'success');
    //         return redirect()->url('/')->with($notification);
    //     } else {
    //         $notification = array('message' => 'Old Password not matched', 'alert-type' => 'warning');
    //         return redirect()->back()->with($notification);
    //     }
    // }


    function UserpasswordChange(Request $request)
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
            return redirect()->route('login')->with($notification);
        } else {
            $notification = array('message' => 'Old Password not matched', 'alert-type' => 'warning');
            return redirect()->back()->with($notification);
        }
    }

    function Myorder()
    {
        $myorder = DB::table('orders')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('user.myorder', compact('myorder'));
    }



    //order details method
    function OrderDetails($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        $order_details = DB::table('order_details')->where('order_id', $id)->get();
        return view('user.order_details', compact('order', 'order_details'));
    }


    //open ticket method
    function ticket()
    {
        $ticket = DB::table('ticktes')->where('user_id', Auth::id())->latest()->take(10)->get();
        return view('user.ticket', compact('ticket'));
    }

    //create ticket metod
    function CreateTicket()
    {
        return view('user.create');
    }

    //ticket store method
    function TicketStore(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required',
        ]);


        $data = array();
        $data['priority'] = $request->priority;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $data['service'] = $request->service;
        $data['user_id'] = Auth::id();
        $data['status'] = 0;
        $data['date'] = date('y-m-d');

        // working with photo
        if ($request->image) {
            $manager = new ImageManager(new Driver());
            $photo = $request->image;
            $photo_read = $manager->read($photo);
            $photo_name = uniqid() . "." . $photo->getClientOriginalExtension();
            $photo_resize = $photo_read->resize(300, 300)->save('public/files/ticket/' . $photo_name);

            $data['image'] = 'public/files/ticket/' . $photo_name;
        }


        DB::table('ticktes')->insert($data);
        $notification = array('message' => 'Ticket Inserted', 'alert-type' => 'success');
        return redirect()->route('open.ticket')->with($notification);
    }

    //view ticket method
    function ViewTicket($id)
    {
        $ticket = DB::table('ticktes')->where('id', $id)->first();
        return view('user.view', compact('ticket'));
    }

    function ReplyTicket(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required',
        ]);


        $data = array();
        $data['message'] = $request->message;
        $data['ticket_id'] = $request->ticket_id;
        $data['user_id'] = Auth::id();
        $data['date'] = date('y-m-d');

        // working with photo
        if ($request->image) {
            $manager = new ImageManager(new Driver());
            $photo = $request->image;
            $photo_read = $manager->read($photo);
            $photo_name = uniqid() . "." . $photo->getClientOriginalExtension();
            $photo_resize = $photo_read->resize(300, 300)->save('public/files/ticket/' . $photo_name);

            $data['image'] = 'public/files/ticket/' . $photo_name;
        }


        DB::table('replies')->insert($data);
        $notification = array('message' => 'Reply Added', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
