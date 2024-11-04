<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    function index()
    {
        $ticket = DB::table('ticktes')->leftJoin('users', 'ticktes.user_id', 'users.id')->select('ticktes.*', 'users.name')->get();

        return view('admin.ticket.index', compact('ticket'));
    }


    //view single ticket 

    function View($id)
    {
        $ticket = DB::table('ticktes')->leftJoin('users', 'ticktes.user_id', 'users.id')->where('ticktes.id', $id)->select('ticktes.*', 'users.name')->first();

        return view('admin.ticket.view_ticket', compact('ticket'));
    }


    //admin reply store
    function Store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required',
        ]);


        $data = array();
        $data['message'] = $request->message;
        $data['ticket_id'] = $request->ticket_id;
        $data['user_id'] = 0;
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
        DB::table('ticktes')->where('id', $request->ticket_id)->update(['status' => 1]);
        $notification = array('message' => 'Reply Added', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //ticket destroy
    function TicketDestroy($id)
    {
        DB::table('ticktes')->where('id', $id)->delete();
        $notification = array('message' => 'Ticket deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
