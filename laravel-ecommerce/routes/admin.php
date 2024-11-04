<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SubcategoryController;




Route::get('/admin-login', [LoginController::class, 'adminlogin'])->name('admin.login');

// Route::get('/admin/home', [HomeController::class, 'admin'])->middleware('is_admin')->name('admin.home');


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'is_admin'], function () {
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@adminlogout')->name('admin.logout');

    // global route 
    Route::get('/get-child-category/{id}', 'ChildcategoryController@getchildcategory');

    //admin password change route
    Route::get('/admin/password/change', 'AdminController@passwordchange')->name('admin.password.change');

    //admin password update route
    Route::post('/admin/password/update', 'AdminController@passwordupdate')->name('admin.password.update');


    //category route
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.delete');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/update', 'CategoryController@update')->name('category.update');
    });


    //subcategory route
    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/', 'SubcategoryController@index')->name('subcategory.index');
        Route::post('/store', 'SubcategoryController@store')->name('subcategory.store');
        Route::get('/delete/{id}', 'SubcategoryController@destroy')->name('subcategory.delete');
        Route::get('/edit/{id}', 'SubcategoryController@edit');
        Route::post('/update', 'SubcategoryController@update')->name('subcategory.update');
    });

    //childcategory route
    Route::group(['prefix' => 'childcategory'], function () {
        Route::get('/', 'ChildcategoryController@index')->name('childcategory.index');
        Route::post('/store', 'ChildcategoryController@store')->name('childcategory.store');
        Route::get('/delete/{id}', 'ChildcategoryController@destroy')->name('childcategory.delete');
        Route::get('/edit/{id}', 'ChildcategoryController@edit')->name('childcategory.edit');
        Route::post('/update', 'ChildcategoryController@update')->name('childcategory.update');
    });


    //brand route
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', 'BrandController@index')->name('brand.index');
        Route::post('/store', 'BrandController@store')->name('brand.store');
        Route::get('/delete/{id}', 'BrandController@destroy')->name('brand.delete');
        Route::get('/edit/{id}', 'BrandController@edit');
        Route::post('/update', 'BrandController@update')->name('brand.update');
    });

    //product route
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/store', 'ProductController@store')->name('product.store');
        // Route::get('/delete/{id}', 'ProductController@destroy')->name('brand.delete');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        // Route::post('/update', 'ProductController@update')->name('brand.update');

        // product not featured route 
        Route::get('/not-featured/{id}', 'ProductController@not_featured');

        // product featured route 
        Route::get('/featured/{id}', 'ProductController@featured');


        // product today-deal-no route 
        Route::get('/today-deal-no/{id}', 'ProductController@todaydealno');

        // product today-deal-yes route 
        Route::get('/today-deal-yes/{id}', 'ProductController@todaydealyes');

        // product status deactive route 
        Route::get('/status-deactive/{id}', 'ProductController@status_deactive');

        // product status active route 
        Route::get('/status-active/{id}', 'ProductController@status_active');
    });

    //Coupon route
    Route::group(['prefix' => 'coupon'], function () {
        Route::get('/', 'CouponController@index')->name('coupon.index');
        Route::post('/store', 'CouponController@store')->name('coupon.store');
        Route::delete('/delete/{id}', 'CouponController@destroy')->name('coupon.delete');
        Route::get('/edit/{id}', 'CouponController@edit');
        Route::post('/update', 'CouponController@update')->name('coupon.update');
    });

    //campaign route
    Route::group(['prefix' => 'campaign'], function () {
        Route::get('/', 'CampaignController@index')->name('campaign.index');
        Route::post('/store', 'CampaignController@store')->name('campaign.store');
        Route::get('/delete/{id}', 'CampaignController@destroy')->name('campaign.delete');
        Route::get('/edit/{id}', 'CampaignController@edit');
        Route::post('/update', 'CampaignController@update')->name('campaign.update');
    });


    //order route
    Route::group(['prefix' => 'order'], function () {
        Route::get('/', 'OrderController@index')->name('admin.order.index');
        Route::get('/delete/{id}', 'OrderController@OrderDelete')->name('order.admin.delete');
        Route::get('/admin/view/{id}', 'OrderController@OrderView');
        Route::get('/admin/edit/{id}', 'OrderController@EditOrder');
        Route::post('/update', 'OrderController@OrderUpdate')->name('admin.order.update');
    });

    //pick_up point route
    Route::group(['prefix' => 'pickup_point'], function () {
        Route::get('/', 'PickupController@index')->name('pickup_point.index');
        Route::post('/store', 'PickupController@store')->name('pickup_point.store');
        Route::delete('/delete/{id}', 'PickupController@destroy')->name('pickup_point.delete');
        Route::get('/edit/{id}', 'PickupController@edit');
        Route::post('/update', 'PickupController@update')->name('pickup_point.update');
    });

    //Settings route
    Route::group(['prefix' => 'setting'], function () {
        //seo route
        Route::group(['prefix' => 'seo'], function () {
            Route::get('/', 'SettingsController@seo')->name('seo.setting');
            Route::post('/update/{id}', 'SettingsController@seoupdate')->name('seo.setting.update');
        });

        //smtp route
        Route::group(['prefix' => 'smtp'], function () {
            Route::get('/', 'SettingsController@smtp')->name('smtp.setting');
            Route::post('/update/{id}', 'SettingsController@smtpupdate')->name('smtp.setting.update');
        });

        Route::group(['prefix' => 'payment-gateway'], function () {
            Route::get('/', 'SettingsController@PaymentGateway')->name('payment.gateway');
            Route::post('/update-amarpay', 'SettingsController@AmarpayUpdate')->name('amarpay.update');
            Route::post('/update-shurjopay', 'SettingsController@ShurjopayUpdate')->name('update.shurjopay');
            Route::post('/update-sslcommerz', 'SettingsController@SSlcommerzpayUpdate')->name('update.sslcommerz');
        });

        //website setting route
        Route::group(['prefix' => 'website'], function () {
            Route::get('/', 'SettingsController@website')->name('website.index');
            Route::post('/update/{id}', 'SettingsController@update')->name('website.update');
        });

        //page route
        Route::group(['prefix' => 'page'], function () {
            Route::get('/', 'PageController@index')->name('page.index');
            Route::get('/create', 'PageController@create')->name('page.create');
            Route::post('/store', 'PageController@store')->name('page.store');
            Route::post('/delete/{id}', 'PageController@destroy')->name('page.delete');
            Route::get('/edit/{id}', 'PageController@edit')->name('page.edit');
            Route::post('/update/{id}', 'PageController@update')->name('page.update');
        });

        //page route
        Route::group(['prefix' => 'ticket'], function () {
            Route::get('/', 'TicketController@index')->name('ticket.index');
            Route::get('/view/{id}', 'TicketController@view')->name('show.ticket');
            Route::post('reply/store/', 'TicketController@Store')->name('admin.reply.store');
            Route::get('ticket/delete/{id}', 'TicketController@TicketDestroy')->name('ticket.delete');
            // Route::get('/edit/{id}', 'PageController@edit')->name('page.edit');
            // Route::post('/update/{id}', 'PageController@update')->name('page.update');
        });

        //warehouse route
        Route::group(['prefix' => 'warehouse'], function () {
            Route::get('/', 'WarehouseController@index')->name('warehouse.index');
            Route::post('/store', 'WarehouseController@store')->name('warehouse.store');
            Route::get('/delete/{id}', 'WarehouseController@destroy')->name('warehouse.delete');
            Route::get('/edit/{id}', 'WarehouseController@edit');
            Route::post('/update', 'WarehouseController@update')->name('warehouse.update');
        });

        //blog-category route
        Route::group(['prefix' => 'blog-category'], function () {
            Route::get('/', 'BlogController@index')->name('admin.blog.category');
            Route::post('/store', 'BlogController@Store')->name('blog.category.store');

            Route::get('/delete/{id}', 'BlogController@Destroy')->name('blog.category.delete');
            Route::get('/edit/{id}', 'BlogController@Edit');
            Route::post('/update', 'BlogController@Update')->name('blog.category.update');
        });

        //blog route
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', 'BlogController@Viewblogindex')->name('admin.blog.index');
            Route::post('/store', 'BlogController@Store')->name('blog.category.store');

            Route::get('/delete/{id}', 'BlogController@Destroy')->name('blog.category.delete');
            Route::get('/edit/{id}', 'BlogController@Edit');
            Route::post('/update', 'BlogController@Update')->name('blog.category.update');
        });
    });
});
