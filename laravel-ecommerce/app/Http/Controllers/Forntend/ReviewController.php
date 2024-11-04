<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    function reviewstore(Request $request)
    {
        $validated = $request->validate([
            'review' => 'required',
            'rating' => 'required',
        ]);


        $review_check = Review::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
        if ($review_check) {
            $notification = array('message' => 'Already you have a review with this product!', 'alert-type' => 'warning');
            return redirect()->back()->with($notification);
        } else {
            Review::insert([
                'review' => $request->review,
                'rating' => $request->rating,
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'review_date' => date('d-m-Y'),
                'review_month' => date('F'),
                'review_year' => date('Y'),
            ]);

            $notification = array('message' => 'Thank you for your review!', 'alert-type' => 'success');

            return redirect()->back()->with($notification);
        }
    }


    //write review for website
    function WriteReview()
    {
        return view('user.review');
    }


    //website review store
    function WebsiteReviewstore(Request $request)
    {
        $review_check = DB::table('websitereviews')->where('user_id', Auth::user()->id)->first();
        if ($review_check) {
            $notification = array('message' => 'Your review already exits!', 'alert-type' => 'success');

            return redirect()->back()->with($notification);
        } else {
            $review = array();
            $review['user_id'] = Auth::user()->id;
            $review['name'] = $request->name;
            $review['review'] = $request->review;
            $review['rating'] = $request->rating;
            $review['review_date'] = date("Y-m-d");

            DB::table('websitereviews')->insert($review);

            $notification = array('message' => 'Review Inserted', 'alert-type' => 'success');

            return redirect()->back()->with($notification);
        }
    }
}
