<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    //seo page show method
    function seo()
    {
        $data = DB::table('seos')->first();
        return view('admin.settings.seo', compact('data'));
    }

    //seo setting update
    function seoupdate(Request $request, $id)
    {
        $data = array();
        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['google_varification'] = $request->google_varification;
        $data['google_analytics'] = $request->google_analytics;
        $data['alexa_varification'] = $request->alexa_varification;
        $data['google_adsense'] = $request->google_adsense;

        DB::table('seos')->where('id', $id)->update($data);

        $notification = array('message' => 'SEO Setting updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //smtp setting page show method

    function smtp()
    {
        $smtp = DB::table('smtps')->first();
        return view('admin.settings.smtp', compact('smtp'));
    }

    //smtp setting update
    function smtpupdate(Request $request, $id)
    {
        $data = array();
        $data['mailer'] = $request->mailer;
        $data['host'] = $request->host;
        $data['port'] = $request->port;
        $data['user_name'] = $request->user_name;
        $data['password'] = $request->password;

        DB::table('smtps')->where('id', $id)->update($data);

        $notification = array('message' => 'SMTP Setting updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    //website settings

    function website()
    {
        $website = DB::table('settings')->first();

        return view('admin.settings.website.index', compact('website'));
    }

    //website setting update

    function update(Request $request, $id)
    {
        $data = array();
        $data['currency'] = $request->currency;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['youtube'] = $request->youtube;

        // && $request->favicon
        //         unlink($request->old_favicon);


        // working with logo 



        // working with favicon 


        // work with favicon and logo 
        if ($request->logo) {
            if (File::exists($request->old_logo)) {
                unlink($request->old_logo);
            }
            $manager = new ImageManager(new Driver());
            $logo_slug = Str::slug($request->logo, '-');
            $logo = $request->logo;
            $logo_read = $manager->read($logo);
            $logo_name = $logo_slug  . "." . $logo->getClientOriginalExtension();
            $logo_resize = $logo_read->resize(30, 30)->save('public/files/settings/' . $logo_name);
            $data['logo'] = 'public/files/settings/' . $logo_name;
        } else {
            $data['logo'] = $request->old_logo;
        }


        if ($request->favicon) {
            if (File::exists($request->old_favicon)) {
                unlink($request->old_favicon);
            }
            $manager = new ImageManager(new Driver());
            $favicon_slug = Str::slug($request->favicon, '-');
            $favicon = $request->favicon;
            $favicon_read = $manager->read($favicon);
            $favincon_name = $favicon_slug . "." . $favicon->getClientOriginalExtension();
            $favicon_resize = $favicon_read->resize(30, 30)->save('public/files/settings/' . $favincon_name);
            $data['favicon'] = 'public/files/settings/' . $favincon_name;
        } else {
            $data['favicon'] = $request->old_favicon;
        }



        DB::table('settings')->where('id', $id)->update($data);

        $notification = array('message' => 'Website Settings updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    //payment gateway method
    function PaymentGateway()
    {
        $amarpay = DB::table('payment_gateway_bd')->first();
        $shurjopay = DB::table('payment_gateway_bd')->skip(1)->first();
        $sslcommerz = DB::table('payment_gateway_bd')->skip(2)->first();

        return view('admin.payment_gateway.edit', compact('amarpay', 'shurjopay', 'sslcommerz'));
    }

    //update amarpay method
    function AmarpayUpdate(Request $request)
    {
        $data = array();
        $data['store_id'] = $request->store_id;
        $data['signature_key'] = $request->signature_key;
        $data['status'] = $request->status;

        DB::table('payment_gateway_bd')->where('id', $request->id)->update($data);
        $notification = array('message' => 'Amarpay payment gateway updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //upade shurjopay method
    function ShurjopayUpdate(Request $request)
    {
        $data = array();
        $data['store_id'] = $request->store_id;
        $data['signature_key'] = $request->signature_key;
        $data['status'] = $request->status;

        DB::table('payment_gateway_bd')->where('id', $request->id)->update($data);
        $notification = array('message' => 'Shurjopay payment gateway updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //upade shurjopay method
    function SSlcommerzpayUpdate(Request $request)
    {
        $data = array();
        $data['store_id'] = $request->store_id;
        $data['signature_key'] = $request->signature_key;
        $data['status'] = $request->status;

        DB::table('payment_gateway_bd')->where('id', $request->id)->update($data);
        $notification = array('message' => 'Sslcommerz payment gateway updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
