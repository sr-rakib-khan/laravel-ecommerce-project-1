<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Mail\Invoice;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\support\Facades\Mail;

class CheckoutController extends Controller
{
    function Checkout()
    {
        if (!Auth::check()) {
            $notification = array('message' => 'Login to your account for checkout', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        } else {
            return view('forntend.Cart.checkout');
        }
    }

    //apply coupon method
    function CouponApply(Request $request)
    {
        $check = DB::table('coupons')->where('coupon_code', $request->coupon_code)->first();

        if ($check) {
            if (date('Y-m-d', strtotime(date('Y-m-d'))) <= date('Y-m-d', strtotime($check->valid_date))) {
                Session::put('coupon', [
                    'name' => $check->coupon_code,
                    'discount' => $check->coupon_amount,
                    'after_discount' => Cart::subtotal() - $check->coupon_amount,
                ]);
                $notification = array('message' => 'Coupon Applied!', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            } else {
                $notification = array('message' => 'Expaired coupon code!', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array('message' => 'Invalid coupon code! Try agin', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }


    function CouponRemove()
    {
        Session::forget('coupon');
        $notification = array('message' => 'Coupon Removed', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    function OrderPlace(Request $request)
    {
        if ($request->payment_type == 'Hand Cash') {
            $order = array();
            $order['user_id'] = Auth::user()->id;
            $order['c_name'] = $request->c_name;
            $order['c_phone'] = $request->c_phone;
            $order['c_country'] = $request->c_country;
            $order['c_shipping_address'] = $request->c_shipping_address;
            $order['c_email'] = $request->c_email;
            $order['c_zip_code'] = $request->c_zip_code;
            $order['c_city'] = $request->c_city;
            $order['c_extra_phone'] = $request->c_extra_phone;

            if (Session::has('coupon')) {
                $order['subtotal'] = Cart::subtotal();
                $order['coupon_code'] = Session::get('coupon')['name'];
                $order['coupon_discount'] = Session::get('coupon')['discount'];
                $order['after_discount'] = Session::get('coupon')['after_discount'];
            } else {
                $order['subtotal'] = Cart::subtotal();
            }
            $order['total'] = Cart::total();
            $order['payment_type'] = $request->payment_type;
            $order['tax'] = 0;
            $order['shipping_charge'] = 0;
            $order['order_id'] = uniqid();
            $order['status'] = 0;
            $order['date'] = date('d-m-y');
            $order['month'] = date('F');
            $order['year'] = date('Y');

            $order_id = DB::table('orders')->insertGetId($order);
            Mail::to($request->c_email)->send(new Invoice($order));

            $content = Cart::content();
            $details = array();

            foreach ($content as $row) {
                $details['order_id'] = $order_id;
                $details['product_id'] = $row->id;
                $details['product_name'] = $row->name;
                $details['color'] = $row->options->color;
                $details['size'] = $row->options->size;
                $details['quantity'] = $row->qty;
                $details['single_price'] = $row->price;
                $details['subtotal_price'] = $row->price * $row->qty;

                DB::table('order_details')->insert($details);
            }

            Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }

            $notification = array('message' => 'Successfully order placed', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } elseif ($request->payment_type == 'amarpay') {
            $amarpay = DB::table('payment_gateway_bd')->first();
            $tran_id = "test" . rand(1111111, 9999999); //unique transection id for every transection 

            $currency = "BDT"; //aamarPay support Two type of currency USD & BDT  

            $amount = Cart::subtotal();   //10 taka is the minimum amount for show card option in aamarPay payment gateway

            //For live Store Id & Signature Key please mail to support@aamarpay.com
            $store_id = "aamarpaytest";

            $signature_key = "dbb74894e82415a2f7ff0ec3a97e4183";

            $url = "https://​sandbox​.aamarpay.com/jsonpost.php"; // for Live Transection use "https://secure.aamarpay.com/jsonpost.php"

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
            "store_id": "' . $store_id . '",
            "tran_id": "' . $tran_id . '",
            "success_url": "' . route('success') . '",
            "fail_url": "' . route('fail') . '",
            "cancel_url": "' . route('cancel') . '",
            "amount": "' . $amount . '",
            "currency": "' . $currency . '",
            "signature_key": "' . $signature_key . '",
            "desc": "Merchant Registration Payment",
            "cus_name": "' . $request->c_name . '",
            "cus_email": "' . $request->c_email . '",
            "cus_add1": "' . $request->c_shipping_address . '",
            "cus_city": "' . $request->c_city . '",
            "cus_country": "' . $request->c_country . '",
            "cus_phone": "' . $request->c_phone . '",
            "opt_a": "' . $request->c_extra_phone . '",
            "opt_b": "' . $request->c_zip_code . '",
            "type": "json"
        }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // dd($response);

            $responseObj = json_decode($response);

            if (isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {

                $paymentUrl = $responseObj->payment_url;
                // dd($paymentUrl);
                return redirect()->away($paymentUrl);
            } else {
                echo $response;
            }
        }
    }

    public function success(Request $request)
    {
        $request_id = $request->mer_txnid;

        //verify the transection using Search Transection API 

        $url = "http://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=aamarpaytest&signature_key=dbb74894e82415a2f7ff0ec3a97e4183&type=json";

        //For Live Transection Use "http://secure.aamarpay.com/api/v1/trxcheck/request.php"

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);


        $order = array();
        $order['user_id'] = Auth::user()->id;
        $order['c_name'] = $request->cus_name;
        $order['c_phone'] = $request->cus_phone;
        $order['c_country'] = $data['cus_country'];
        $order['c_shipping_address'] = $data['cus_add1'];
        $order['c_email'] = $request->cus_email;
        $order['c_zip_code'] = $data['opt_b'];
        $order['c_city'] = $data['cus_city'];
        $order['c_extra_phone'] = $data['opt_a'];

        if (Session::has('coupon')) {
            $order['subtotal'] = Cart::subtotal();
            $order['coupon_code'] = Session::get('coupon')['name'];
            $order['coupon_discount'] = Session::get('coupon')['discount'];
            $order['after_discount'] = Session::get('coupon')['after_discount'];
        } else {
            $order['subtotal'] = Cart::subtotal();
        }
        $order['total'] = Cart::total();
        $order['payment_type'] = "Amarpay";
        $order['tax'] = 0;
        $order['shipping_charge'] = 0;
        $order['order_id'] = uniqid();
        $order['status'] = 1;
        $order['date'] = date('d-m-y');
        $order['month'] = date('F');
        $order['year'] = date('Y');

        $order_id = DB::table('orders')->insertGetId($order);
        Mail::to($request->cus_email)->send(new Invoice($order));

        $content = Cart::content();
        $details = array();

        foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['single_price'] = $row->price;
            $details['subtotal_price'] = $row->price * $row->qty;

            DB::table('order_details')->insert($details);
        }

        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }



        $notification = array('message' => 'Successfully order placed', 'alert-type' => 'success');
        return redirect()->route('home')->with($notification);
    }


    public function fail(Request $request)
    {
        return $request;
    }
}
