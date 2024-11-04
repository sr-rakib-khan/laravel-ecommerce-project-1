<?php

use App\Models\Review;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('forntend.index');
// });

Auth::routes();


Route::get('/login', function () {
    return redirect()->to('/');
})->name('login');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/customer/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('customer.logout');

// fronted all route goes here 
Route::group(['namespace' => 'App\Http\Controllers\Forntend'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/product/details/{slug}', 'IndexController@ProductDetails')->name('product.details');

    //profile rotue
    Route::get('/customer/profile/', 'ProfileController@Profile')->name('profile');

    // user settings route 
    Route::get('user/setting', 'ProfileController@setting')->name('user.setting');

    // user password change route 
    Route::post('user/password/change', 'ProfileController@UserpasswordChange')->name('user.password.change');

    //my order route
    Route::get('my/order', 'ProfileController@Myorder')->name('my.order');
    Route::get('order/details/{id}', 'ProfileController@OrderDetails')->name('order.details');
    Route::get('order/tracking', 'IndexController@OrderTracking')->name('order.tracking');
    Route::post('order/chcek', 'IndexController@OrderCheck')->name('order.check');

    //category wise product
    Route::get('/category/product/{catid}', 'IndexController@CategoryProduct')->name('category.product');

    //subcategory wise product
    Route::get('/subcategory/product/{subcatid}', 'IndexController@SubCategoryProduct')->name('subcategory.product');


    //childcategory wise product
    Route::get('/childcategory/product/{childcatid}', 'IndexController@ChildCategoryProduct')->name('childcategory.product');


    //brand wise product
    Route::get('/brand/product/{brandid}', 'IndexController@BrandProduct')->name('brand.product');

    //Review route for product
    Route::post('/review/store', 'ReviewController@reviewstore')->name('review.store');


    //Review route for website
    Route::get('/write/review', 'ReviewController@WriteReview')->name('write.review');

    //Review store route for website
    Route::post('/website/review/store', 'ReviewController@WebsiteReviewstore')->name('website.review.store');

    // route for wishlist add 
    Route::get('wishlist/add/{id}', 'Cartcontroller@wishlistadd')->name('wishlist.add');

    //route for wishlist show
    Route::get('wishlist', 'Cartcontroller@ShowWishlist')->name('wishlist');

    //route for wishlist remove
    Route::get('wishlist/remove', 'Cartcontroller@RemoveWishlist')->name('wishlist.remove');

    //add to cart route
    Route::post('add to cart/', 'CartController@AddtocartPd')->name('add.to.cart.product_details');

    //order place route
    Route::post('order/place/', 'CheckoutController@OrderPlace')->name('order.place');


    //checkout route
    Route::get('checkout/', 'CheckoutController@Checkout')->name('checkout');

    //coupon apply
    Route::post('coupon/', 'CheckoutController@CouponApply')->name('coupon.apply');

    //coupon remove
    Route::get('coupon/remove', 'CheckoutController@CouponRemove')->name('coupon.remove');

    // remove cart product 
    Route::get('remove/cart-product/{id}', 'CartController@RemovecartProduct');

    // update cart product qty row 
    Route::get('cart-qty/update/{rowId}/{qty}', 'CartController@Updatecart_ProdutqtyRow');

    // update cart product color row 
    Route::get('cart-product-color/update/{rowId}/{color}', 'CartController@Updatecart_productcolorRow');


    // update cart product size row 
    Route::get('cart-product-size/update/{rowId}/{size}', 'CartController@Updatecart_productsizeRow');

    // my cart route 
    Route::get('my-cart/', 'CartController@Mycart')->name('my.cart');


    //dynamic page show
    Route::get('dynamic-page/show/{slug}', 'IndexController@Dynamicpageshow')->name('view.page');


    //dynamic page show
    Route::get('subscribe', 'IndexController@subscribe')->name('newsletter');

    //support ticket route
    Route::get('open/ticket', 'ProfileController@ticket')->name('open.ticket');
    Route::get('create/ticket', 'ProfileController@CreateTicket')->name('create.ticket');
    Route::post('ticket/store', 'ProfileController@TicketStore')->name('ticket.store');
    Route::get('view/ticket/{id}', 'ProfileController@ViewTicket')->name('view.ticket');

    //reply message route
    Route::post('reply/message', 'ProfileController@ReplyTicket')->name('customer.reply.store');

    //payment gateway route
    Route::post('success', 'CheckoutController@success')->name('success');
    Route::post('fail', 'CheckoutController@fail')->name('fail');
    Route::get('cancel', 'paymentController@cancel')->name('cancel');
});


//socialite route

Route::get('oauth/{driver}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('social.oauth');

Route::get('oauth/{driver}/calback', [App\Http\Controllers\Auth\LoginController::class, 'handleprovidercalback'])->name('social.calback');



// Route::get('/product_details', function () {
//     return view('forntend.product_details');
// });

// Route::get('/cart/destroy', function () {
//     Cart::destroy();
// });

// Route::get('/cart', function () {
//     return response()->json(Cart::content());
// });
