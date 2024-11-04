<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class Cartcontroller extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('auth');
    // }

    function AddtocartPd(Request $request)
    {
        $product = product::find($request->id);

        Cart::add([
            'id' => $request->id,
            'name' => $product->name,
            'qty' => $request->quantuty,
            'price' => $request->price,
            'options' => ['size' => $request->size, 'color' => $request->color, 'thumbnail' => $product->thumbnail]
        ]);
        return response()->json('Added to cart');
    }

    function Mycart()
    {
        $content = Cart::content();

        return view('forntend.cart.cart', compact('content'));
    }

    // remove cart product 
    function RemovecartProduct($id)
    {
        Cart::remove($id);
        return response()->json('Removed');
    }

    //update cart product qty row
    function Updatecart_ProdutqtyRow($rowId, $qty)
    {
        Cart::update($rowId, ['qty' => $qty]);
        return response()->json('Quantity updated!');
    }


    // update cart product color row 
    function Updatecart_productcolorRow($rowId, $color)
    {
        $product = Cart::get($rowId);
        $thumbnail = $product->options->thumbnail;
        $size = $product->options->size;

        Cart::update($rowId, ['options'  => ['color' => $color, 'thumbnail' => $thumbnail, 'size' => $size]]);
        return response()->json('Color updated!');
    }


    //update cart product size row
    function Updatecart_productsizeRow($rowId, $size)
    {
        $product = Cart::get($rowId);
        $thumbnail = $product->options->thumbnail;
        $color = $product->options->color;

        Cart::update($rowId, ['options'  => ['color' => $color, 'thumbnail' => $thumbnail, 'size' => $size]]);
        return response()->json('Size updated!');
    }



    // wishlist add method 
    function wishlistadd($id)
    {
        $check_whishlist = DB::table('wishlists')->where('product_id', $id)->where('user_id', Auth::id())->first();
        if (auth()->check()) {

            if ($check_whishlist) {
                $notification = array('message' => 'You have already added it in your wishlist!', 'alert-type' => 'warning');

                return redirect()->back()->with($notification);
            } else {
                $data = array();
                $data['user_id'] = Auth::id();
                $data['product_id'] = $id;
                DB::table('wishlists')->insert($data);

                $notification = array('message' => 'Product added on your wishlist!', 'alert-type' => 'success');

                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array('message' => 'At first login to add wishlist!', 'alert-type' => 'warning');

            return redirect()->back()->with($notification);
        }
    }

    //show wishlist show

    function ShowWishlist()
    {
        $wishlist = DB::table('wishlists')->where('user_id', Auth::id())->join('products', 'wishlists.product_id', 'products.id')->select('wishlists.*', 'products.name', 'products.thumbnail', 'products.slug')->get();

        $wishlist_count = DB::table('wishlists')->where('user_id', Auth::id())->count();
        return view('forntend.wishlist.wishlist', compact('wishlist', 'wishlist_count'));
    }

    //wishlist remove method
    function RemoveWishlist()
    {
        $wishlist_remove = DB::table('wishlists')->where('user_id', Auth::id())->delete();

        $notification = array('message' => 'Removed Wishlist', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }
}
