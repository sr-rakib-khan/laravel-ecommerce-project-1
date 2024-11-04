<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\product;
use App\Models\Review;

class IndexController extends Controller
{

    function index()
    {
        $banerproduct = product::where('product_slider', '1')->first();
        $category = Category::all();

        $featured_product = product::where('featured', 1)->orderBy('id', 'DESC')->limit(8)->get();

        //popular product
        $popular_product = product::where('status', 1)->orderBy('product_views', 'DESC')->limit(8)->get();

        //trendy product
        $trendy_product = product::where('status', 1)->where('trendy', 1)->orderBy('id', 'DESC')->limit(8)->get();

        // home category
        $home_category = DB::table('categories')->where('show_homepage', 1)->orderBy('category_name', 'ASC')->get();

        // brand show in the home page brand-slider 
        $brand = Brand::all();

        //today deal product
        $today_deal = product::where('status', 1)->where('today_deal', 1)->orderBy('id', 'DESC')->get();

        //most viewed product in the home page
        $most_viewed_product = product::orderBy('product_views', 'DESC')->get();

        // website review 
        $website_review = DB::table('websitereviews')->where('status', 1)->get();

        //campaign product
        $campaign = DB::table('campaigns')->where('status', 1)->get();

        return view('forntend.index', compact('category', 'banerproduct', 'featured_product', 'popular_product', 'trendy_product', 'home_category', 'brand', 'most_viewed_product', 'today_deal', 'website_review', 'campaign'));
    }


    function ProductDetails($slug)
    {
        // $product = DB::table('products')->where('slug', $slug)->first();
        $product = product::where('slug', $slug)->first();

        //product view count
        $view_count = product::where('slug', $slug)->increment('product_views');



        $related_products = product::where('subcategory_id', $product->subcategory_id)->orderBy('id', 'DESC')->take(10)->get();
        $review = Review::where('product_id', $product->id)->orderBy('id', 'DESC')->get();
        //total review count
        $review_5 = Review::where('product_id', $product->id)->where('rating', 5)->count();
        $review_4 = Review::where('product_id', $product->id)->where('rating', 4)->count();
        $review_3 = Review::where('product_id', $product->id)->where('rating', 3)->count();
        $review_2 = Review::where('product_id', $product->id)->where('rating', 2)->count();
        $review_1 = Review::where('product_id', $product->id)->where('rating', 1)->count();

        // $avarage review count 
        $review_sum = Review::where('product_id', $product->id)->sum('rating');
        $review_count = Review::where('product_id', $product->id)->count();

        return view('forntend.product_details', compact('product', 'related_products', 'review', 'review_5', 'review_4', 'review_3', 'review_2', 'review_1', 'review_sum', 'review_count'));
    }

    //category wise product
    function CategoryProduct($catid)
    {
        $subcategories = DB::table('subcategories')->where('category_id', $catid)->get();
        $brands = Brand::all();
        $products = DB::table('products')->where('category_id', $catid)->paginate(60);

        $random_products = product::where('status', 1)->inRandomOrder()->get();

        $category = Category::where('id', $catid)->first();
        return view('forntend.cat_wise', compact('subcategories', 'brands',  'products', 'random_products', 'category'));
    }


    //subcategory product
    function SubCategoryProduct($subcat)
    {
        $childcategories = DB::table('childcategories')->where('subcategory_id', $subcat)->get();
        $brands = Brand::all();
        $products = DB::table('products')->where('subcategory_id', $subcat)->paginate(60);

        $random_products = product::where('status', 1)->inRandomOrder()->get();

        $subcategories = DB::table('subcategories')->where('id', $subcat)->first();

        return view('forntend.subcat_wise', compact('childcategories', 'brands',  'products', 'random_products', 'subcategories'));
    }

    //childcategory product
    function ChildCategoryProduct($childcatid)
    {
        $childcategories = DB::table('childcategories')->where('id', $childcatid)->first();
        $category = DB::table('categories')->get();
        $brands = Brand::all();
        $products = DB::table('products')->where('childcategory_id', $childcatid)->paginate(60);

        $random_products = product::where('status', 1)->inRandomOrder()->get();


        return view('forntend.childcat_wise', compact('category', 'brands',  'products', 'random_products', 'childcategories'));
    }



    //brand wise product
    function BrandProduct($brandid)
    {
        $brand = DB::table('brands')->where('id', $brandid)->first();
        $category = DB::table('categories')->get();
        $brands = Brand::all();
        $products = DB::table('products')->where('brand_id', $brandid)->paginate(20);

        $random_products = product::where('status', 1)->inRandomOrder()->get();


        return view('forntend.brand_wise', compact('category', 'brands',  'products', 'random_products', 'brand'));
    }

    //dynamic page method
    function Dynamicpageshow($slug)
    {
        $page_details = DB::table('pages')->where('page_slug', $slug)->first();

        return view('forntend.page', compact('page_details'));
    }

    // newsletter subscribe 
    function subscribe(Request $request)
    {
        $subscribe_check = DB::table('newsletters')->where('email', $request->email)->first();

        if ($subscribe_check) {
            $notification = array('message' => 'Already Subscribed', 'alert-type' => 'warning');

            return redirect()->back()->with($notification);
        } else {
            $data = array();
            $data['email'] = $request->email;
            DB::table('newsletters')->insert($data);

            $notification = array('message' => 'Thanks for subscribe us', 'alert-type' => 'success');

            return redirect()->back()->with($notification);
        }
    }

    //order tracking method
    function OrderTracking()
    {
        return view('user.order_tracking');
    }

    function OrderCheck(Request $request)
    {
        $check = DB::table('orders')->where('order_id', $request->order_id)->first();

        if ($check) {
            $order = DB::table('orders')->where('order_id', $request->order_id)->first();
            $order_details = DB::table('order_details')->where('order_id', $order->id)->get();

            return view('user.order_details', compact('order', 'order_details'));
        } else {
            $notification = array('message' => 'Invalid Order id! Try later', 'alert-type' => 'warning');

            return redirect()->back()->with($notification);
        }
    }
}
