@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_responsive.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/shop_responsive.css">
@include('layouts.fornt_partial.collaps_nav')
<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">{{$childcategories->childcategory_name}}</h2>
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
                        @foreach($brands as $brand)
                        <div class="owl-item">
                            <a href="{{route('brand.product',$brand->id)}}">
                                <div class="brands_item d-flex flex-column justify-content-center"><img width="40px" height="50px" src="{{asset($brand->brand_logo)}}" alt="">{{$brand->brand_name}}</div>
                            </a>
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

<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Category</div>
                        <ul class="sidebar_categories">
                            @foreach($category as $cat)
                            <li><a href="{{route('category.product',$cat->id)}}">{{$cat->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle color_subtitle">Color</div>
                        <ul class="colors_list">
                            <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                            <li class="color"><a href="#" style="background: #000000;"></a></li>
                            <li class="color"><a href="#" style="background: #999999;"></a></li>
                            <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                            <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                            <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{count($products)}}</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid row">
                        <div class="product_grid_border"></div>

                        <!-- Product Item -->
                        @foreach($products as $product)
                        <div class="product_item is_new col-lg-2">
                            <div class="product_border"></div>
                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('public/files/product/'.$product->thumbnail)}}" alt=""></div>
                            <div class="product_content">
                                @if($product->discount_price==null)
                                <div class="product_price" style="margin-top: 25px;">{{$setting->currency}}{{$product->selling_price}}</div>
                                @else
                                <div class="product_price"><del class="text-danger">{{$setting->currency}}{{$product->selling_price}}</del> {{$setting->currency}}{{$product->discount_price}}</div>
                                @endif
                                <div class="product_name">
                                    <div><a href="{{route('product.details',$product->slug)}}" tabindex="0">{{$product->name}}</a></div>
                                </div>
                            </div>
                            <a href="{{route('wishlist.add',$product->id)}}" class="product_fav"><i class="fas fa-heart"></i></a>
                        </div>
                        @endforeach

                    </div>

                    <!-- Shop Page Navigation -->

                    <div class="shop_page_nav d-flex flex-row">
                        <!-- <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div> -->
                        <ul class="page_nav d-flex flex-row">
                            {{$products->links()}}
                        </ul>
                        <!-- <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div> -->
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- product for you -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Product for you</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- product for you slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        <!-- product for you Item -->
                        @foreach($random_products as $product)
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('public/files/product/'.$product->thumbnail)}}" alt=""></div>
                                <div class="viewed_content text-center">
                                    @if($product->discount_price==null)
                                    <div class="product_price" style="margin-top: 25px;">{{$setting->currency}}{{$product->selling_price}}</div>
                                    @else
                                    <div class="product_price"><del class="text-danger">{{$setting->currency}}{{$product->selling_price}}</del> {{$setting->currency}}{{$product->discount_price}}</div>
                                    @endif
                                    <div class="viewed_name"><a href="#">{{$product->name}}</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{asset('public/forntend')}}/js/shop_custom.js"></script>
@endsection