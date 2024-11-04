@extends('layouts.app')
@section('navbar')
@include('layouts.fornt_partial.main_nav')
@endsection
@section('content')
<!-- Banner -->

<div class="banner">
    <div class="banner_background" style="background-image:url({{asset('public/forntend')}}/images/banner_background.jpg)"></div>
    <div class="container fill_height">
        <div class="row fill_height">
            <div class="banner_product_image"><img src="{{asset('public/files/product/'.$banerproduct->thumbnail)}}" alt=""></div>
            <div class="col-lg-5 offset-lg-4 fill_height">
                <div class="banner_content">
                    <h1 class="banner_text">{{$banerproduct->brand->brand_name}}</h1>
                    @if($banerproduct->discount_price==null)
                    <div class="banner_price">{{$setting->currency}}{{$banerproduct->selling_price}}</div>
                    @else
                    <div class="banner_price"><span>{{$setting->currency}}{{$banerproduct->selling_price}}</span>{{$setting->currency}}{{$banerproduct->discount_price}}</div>
                    @endif
                    <div class="banner_product_name">{{$banerproduct->name}}</div>
                    <div class="button banner_button"><a href="{{route('product.details',$banerproduct->slug)}}">Shop Now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- show campaign -->
@if($campaign->count()>0)
<div class="brands">
    <div class="container">
        <h3 class="">Campaign Products</h3>
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">

                    <!-- Brands Slider -->

                    <div class="owl-carousel owl-theme brands_slider">
                        <!-- brand slider item  -->
                        @foreach($campaign as $row)
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center">
                                <a href="#">
                                    <img title="{{$row->campaign_title}}" src="{{$row->campaign_logo}}" alt="" width="40" height="50">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Characteristics -->

<div class="characteristics">
    <div class="container">
        <div class="row">

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('public/forntend')}}/images/char_1.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('public/forntend')}}/images/char_2.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('public/forntend')}}/images/char_3.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('public/forntend')}}/images/char_4.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deals of the week -->

<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->

                <div class="deals">
                    <div class="deals_title">Deals of the Week</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">

                            <!-- Deals Item -->
                            @foreach($today_deal as $deal)
                            <div class="owl-item deals_item">
                                <div class="deals_image"><img src="{{asset('public/files/product/'.$deal->thumbnail)}}" alt=""></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="#">{{$deal->category->category_name}}</a></div>
                                        @if($deal->discount_price==null)
                                        <div class="product_price" style="margin-top: 25px;">{{$setting->currency}}{{$deal->selling_price}}</div>
                                        @else
                                        <div class="product_price"> {{$setting->currency}}{{$deal->discount_price}}</div>
                                        @endif
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name">{{$deal->name}}</div>
                                        <div class="deals_item_price ml-auto">$225</div>
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Available: <span>{{$deal->stock_quantity}}</span></div>
                                            <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:17%"></span></div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Hurry Up</div>
                                            <div class="deals_timer_subtitle">Offer ends in:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                    <span>hours</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                    <span>mins</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                    <span>secs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Featured</li>
                                <li>Most Popular</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">

                                <!-- Slider Item -->
                                @foreach($featured_product as $row)
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('public/files/product/'.$row->thumbnail)}}" width="60%" alt=""></div>
                                        <div class="product_content">
                                            @if($row->discount_price == NULL)
                                            <div class="product_price discount">{{$setting->currency}}{{$row->selling_price}}</div>
                                            @else
                                            <div class="product_price discount">{{$setting->currency}}{{$row->selling_price}} <span>{{$setting->currency}}{{$row->discount_price}}</span></div>
                                            @endif
                                            <div class="product_name">
                                                <div><a href="{{route('product.details',$row->slug)}}">{{$row->name}}</a></div>
                                            </div>
                                            <div class="product_extras">
                                                <div class="product_color">
                                                    <input type="radio" checked name="product_color" style="background:#b19c83">
                                                    <input type="radio" name="product_color" style="background:#000000">
                                                    <input type="radio" name="product_color" style="background:#999999">
                                                </div>
                                                <button class="product_cart_button">Add to Cart</button>
                                            </div>
                                        </div>
                                        <a href="{{route('wishlist.add', $row->id)}}">
                                            <div class="product_fav">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                        </a>
                                        <ul class="product_marks">
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">

                                <!-- Slider Item -->
                                @foreach($popular_product as $row)
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('public/files/product/'.$row->thumbnail)}}" width="60%" alt=""></div>
                                        <div class="product_content">
                                            @if($row->discount_price == NULL)
                                            <div class="product_price discount">{{$setting->currency}}{{$row->selling_price}}</div>
                                            @else
                                            <div class="product_price discount">{{$setting->currency}}{{$row->selling_price}} <span>{{$setting->currency}}{{$row->discount_price}}</span></div>
                                            @endif
                                            <div class="product_name">
                                                <div><a href="{{route('product.details',$row->slug)}}">{{$row->name}}</a></div>
                                            </div>
                                            <div class="product_extras">
                                                <div class="product_color">
                                                    <input type="radio" checked name="product_color" style="background:#b19c83">
                                                    <input type="radio" name="product_color" style="background:#000000">
                                                    <input type="radio" name="product_color" style="background:#999999">
                                                </div>
                                                <button class="product_cart_button">Add to Cart</button>
                                            </div>
                                        </div>
                                        <a href="{{route('wishlist.add',$row->id)}}">
                                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        </a>
                                        <ul class="product_marks">
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<!-- Popular Categories -->

<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Popular Categories</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                    <div class="popular_categories_link"><a href="#">full catalog</a></div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">

                        <!-- Popular Categories Item -->
                        @foreach($home_category as $row)
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img src="{{$row->category_logo}}" alt=""></div>
                                <div class="popular_category_text">{{$row->category_name}}</div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner -->

<div class="banner_2">
    <div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <!-- Banner 2 Slider -->

        <div class="owl-carousel owl-theme banner_2_slider">

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- home page category wise product -->
@foreach($home_category as $row)

@php
$cat_product = DB::table('products')->where('category_id', $row->id)->orderBy('id','DESC')->get();
@endphp
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">{{$row->category_name}}</div>
                        <ul class="clearfix">
                            <li class="active">view more</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9" style="z-index:1;">

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">

                                    <!-- Slider Item -->
                                    @foreach($cat_product as $row)
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('public/files/product/'.$row->thumbnail)}}" alt="" width="50%"></div>
                                            <div class="product_content">
                                                @if($row->discount_price==null)
                                                <div class="text-danger">{{$setting->currency}}{{$row->selling_price}}</div>
                                                @else
                                                <div class=""><del class="">{{$setting->currency}}{{$row->selling_price}}</del> <span style="font-size: 20px;" class="text-danger">{{$setting->currency}}{{$row->discount_price}}</span></div>
                                                @endif
                                                <div class="product_name">
                                                    <div><a href="{{route('product.details',$row->slug)}}">{{$row->name}}</a></div>
                                                </div>
                                                <div class="product_extras">
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </div>
                                            <a href="{{route('wishlist.add',$row->id)}}" class="product_fav"><i class="fas fa-heart"></i></a>
                                            <ul class="product_marks">
                                            </ul>
                                        </div>
                                    </div>>
                                    @endforeach
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Adverts -->

<div class="adverts">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img src="images/adv_1.png" alt=""></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_subtitle">Trends 2018</div>
                        <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img src="images/adv_2.png" alt=""></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img src="images/adv_3.png" alt=""></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Trends -->

<div class="trends">
    <div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
    <div class="trends_overlay"></div>
    <div class="container">
        <div class="row">

            <!-- Trends Content -->
            <div class="col-lg-3">
                <div class="trends_container">
                    <h2 class="trends_title">Trends 2018</h2>
                    <div class="trends_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                    </div>
                    <div class="trends_slider_nav">
                        <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                </div>
            </div>

            <!-- Trends Slider -->
            <div class="col-lg-9">
                <div class="trends_slider_container">

                    <!-- Trends Slider -->

                    <div class="owl-carousel owl-theme trends_slider">

                        <!-- Trends Slider Item -->
                        @foreach($trendy_product as $row)
                        <div class="owl-item">
                            <div class="trends_item is_new">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('public/files/product/'.$row->thumbnail)}}" alt=""></div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="#">{{$row->category->category_name}}</a></div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name"><a href="{{route('product.details',$row->slug)}}">{{$row->name}}</a></div>
                                        @if($banerproduct->discount_price==null)
                                        <div class="banner_price">{{$setting->currency}}{{$banerproduct->selling_price}}</div>
                                        @else
                                        <div class="banner_price"><span>{{$setting->currency}}{{$banerproduct->selling_price}}</span>{{$setting->currency}}{{$banerproduct->discount_price}}</div>
                                        @endif
                                    </div>
                                </div>
                                <a href="">
                                    <ul class="trends_marks">
                                        <li class="fas fa-eye"></li>
                                    </ul>
                                </a>
                                <a href="{{route('wishlist.add',$row->id)}}">
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Reviews -->

<div class="reviews">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="reviews_title_container">
                    <h3 class="reviews_title">Latest Reviews</h3>
                    <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                </div>

                <div class="reviews_slider_container">

                    <!-- Reviews Slider -->
                    <div class="owl-carousel owl-theme reviews_slider">

                        <!-- Reviews Slider Item -->
                        @foreach($website_review as $row)
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img src="images/review_1.jpg" alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">{{$row->name}}</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            @if($row->rating == 5)
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            @elseif($row->rating == 4)
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star"></span>
                                            @elseif($row->rating == 3)
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            @elseif($row->rating == 2)
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            @elseif($row->rating == 1)
                                            <span class="fa fa-star text-danger"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            @endif
                                        </div>
                                        <div class="review_time">{{$row->review_date}}</div>
                                    </div>
                                    <div class="review_text">
                                        <p>{{$row->review}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="reviews_dots"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Most Viewed Products</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        <!-- Recently Viewed Item -->
                        @foreach($most_viewed_product as $row)
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('public/files/product/'.$row->thumbnail)}}" alt=""></div>
                                <div class="viewed_content text-center">
                                    @if($row->discount_price==null)
                                    <div class="">{{$setting->currency}}{{$row->selling_price}}</div>
                                    @else
                                    <div class=""><del>{{$setting->currency}}{{$row->selling_price}}</del><span style="font-size:18px; color:red;"> {{$setting->currency}}{{$row->discount_price}}</span></div>
                                    @endif
                                    <div class="viewed_name"><a href="{{route('product.details',$row->slug)}}">{{$row->name}}</a></div>
                                </div>
                                <ul class="item_marks">
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Brands -->

<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">

                    <!-- Brands Slider -->

                    <div class="owl-carousel owl-theme brands_slider">
                        <!-- brand slider item  -->
                        @foreach($brand as $row)
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center">
                                <a href="{{route('brand.product',$row->id)}}"><img title="{{$row->brand_name}}" src="{{$row->brand_logo}}" alt="" width="40" height="50"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text">
                            <p>...and receive %20 coupon for first shopping.</p>
                        </div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="{{route('newsletter')}}" class="newsletter_form">
                            @csrf
                            <input type="email" name="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                            <button class="newsletter_button" type="submit">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection