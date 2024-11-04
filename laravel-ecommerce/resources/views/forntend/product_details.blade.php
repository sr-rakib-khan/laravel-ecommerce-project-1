@extends('layouts.app')
@section('content')
@include('layouts.fornt_partial.collaps_nav')

<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/bootstrap4/bootstrap.min.css">
<link href="{{asset('public/forntend')}}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_responsive.css">

<div class="single_product">
    <div class="container">
        <div class="row">
            <!-- Images -->
            <div class="col-lg-1 order-lg-1 order-2">
                @php
                $images= json_decode($product->images, true);
                $color= explode(',', $product->color);
                $size= explode(',', $product->size);
                @endphp
                <ul class="image_list">
                    @foreach($images as $iamge)
                    <li data-image="{{asset('public/files/product/'.$iamge)}}"><img src="{{asset('public/files/product/'.$iamge)}}" alt=""></li>
                    @endforeach
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-4 order-lg-2 order-1">
                <div class="image_selected"><img src="{{asset('public/files/product/'.$product->thumbnail)}}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-3 order-3">
                <div class="product_description">
                    <div class="product_category">{{$product->category->category_name}}>{{$product->subcategory->subcategory_name}}</div>
                    <div class="product_name">{{$product->name}}</div>
                    <div class="product_category"><b>Brand: {{$product->brand->brand_name}}</b></div>
                    <div class="product_category"><b>Stock: {{$product->stock_quantity}}</b></div>
                    <div class="product_category"><b>Unit: {{$product->unit}}</b></div>
                    <div class="rating_r rating_r_4 product_rating">
                        @if($review_sum !=NULL)
                        @if(intval($review_sum/$review_count)==5)
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        @elseif(intval($review_sum/$review_count)==4)
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star"></span>
                        @elseif(intval($review_sum/$review_count)==3)
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        @elseif(intval($review_sum/$review_count)==2)
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        @elseif(intval($review_sum/$review_count)==1)
                        <span class="fa fa-star text-danger"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        @endif
                        @endif
                    </div>
                    <div class="product_text">
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="{{route('add.to.cart.product_details')}}" method="post" id="addcart">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            @if($product->discount_price == NULL)
                            <input type="hidden" name="price" value="{{$product->selling_price}}">
                            @else
                            <input type="hidden" name="price" value="{{$product->discount_price}}">
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    @isset($product->size)
                                    <div class="col-lg-6">
                                        <label for="">Size</label>
                                        <select style="min-width: 90px;" class="form-control form-control-sm" name="size">
                                            @foreach($size as $row)
                                            <option value="{{$row}}">{{$row}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endisset
                                    @isset($product->color)
                                    <div class="col-lg-6">
                                        <label for="">Color</label>
                                        <select style="min-width: 90px;" class="form-control form-control-sm" name="color">
                                            @foreach($color as $row)
                                            <option value="{{$row}}">{{$row}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endisset
                                </div>
                            </div>
                            <div class="clearfix" style="z-index: 1000;">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" min="1" max="10" name="quantuty" value="1">
                                </div>
                            </div>

                            @if($product->discount_price==null)
                            <div class="product_price" style="margin-top: 25px;">{{$setting->currency}}{{$product->selling_price}}</div>
                            @else
                            <div class="product_price"><del class="text-danger">{{$setting->currency}}{{$product->selling_price}}</del>{{$setting->currency}}{{$product->discount_price}}</div>
                            @endif
                            <div class="button_container">
                                <div class="input-group mb-3">
                                    @if($product->stock_quantity > 0)
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    @else
                                    <button class="btn btn-primary">Out of stock</button>
                                    @endif
                                    <a href="{{route('wishlist.add',$product->id)}}" type="submit" class="btn btn-secondary ml-1">Add to wishlist</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ml-5 order-3" style="border-left: 1px solid black">
                <div>
                    <span>pickup point of the product</span>
                    <h3>{{$product->pickup_point->pickup_point_name}}</h3>
                </div>
                <hr>
                <div class="mt-4">
                    <span>Home delivery:</span>
                    <p class="lh-1">->(4-6) After the order placed</p>
                    <p class="lh-1">->Cash on delivery Avilable</p>
                </div>
                <hr>
                <div class="mt-4">
                    <span>Product return & Warenty:</span>
                    <p>->(4-6) 7 days return gerunty</p>
                    <p>->Warenty not Avilable</p>
                </div>
                <hr>
                <div class="mt-4">
                    <span>Product Video</span>
                    <video src="{{asset('public/forntend')}}/videos/productsimple.mp4" width="320" height="240" controls></video>
                    <iframe src="https://www.youtube.com/watch?v=PBykiW32kac&t=613s" frameborder="0" allow="accelerometer;autoplay;clipboard-write" title="youtube video player"></iframe>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p class="">Rating and review of{{$product->name}}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Avarage rating of this product</p>
                                <div>
                                    @if($review_sum !=NULL)
                                    @if(intval($review_sum/$review_count)==5)
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    @elseif(intval($review_sum/$review_count)==4)
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star"></span>
                                    @elseif(intval($review_sum/$review_count)==3)
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    @elseif(intval($review_sum/$review_count)==2)
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    @elseif(intval($review_sum/$review_count)==1)
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p>Total review of this product</p>
                                <div>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span>total: {{$review_5}}</span>
                                </div>
                                <div>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star"></span>
                                    <span>total: {{$review_4}}</span>
                                </div>
                                <div>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span>total: {{$review_3}}</span>
                                </div>
                                <div>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span>total: {{$review_2}}</span>
                                </div>
                                <div>
                                    <span class="fa fa-star text-danger"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span>total: {{$review_1}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <form action="{{route('review.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="from-group">
                                        <div class="mb-3">
                                            <label for="review" class="form-label">Write Your Review</label>
                                            <textarea name="review" class="form-control" id="review" rows="1"></textarea>
                                        </div>
                                        <label for="review" class="form-label">Write your review</label>
                                        <select name="rating" style="min-width: 270px;" class="form-control" aria-label="Default select example">
                                            <option disabled selected value="1">select your review</option>
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Star</option>
                                            <option value="3">3 Star</option>
                                            <option value="4">4 Star</option>
                                            <option value="5">5 Star</option>
                                        </select>
                                    </div>
                                    <br>
                                    @if(Auth::check())
                                    <button type="submit" class="btn btn-success">submit</button>
                                    @else
                                    <p class="text-danger">please login first to submit review</p>
                                    @endif
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            @foreach($review as $row)
                            <div class="col-md-5 m-2">
                                <div class="card">
                                    <div class="card-header">
                                        {{$row->user->name}} ({{date('d F,Y'),strtotime($row->review_date)}})
                                    </div>
                                    <div class="card-body">
                                        {{$row->review}}
                                        <div>
                                            @if($row->rating == 5)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            @elseif($row->rating == 4)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            @elseif($row->rating == 3)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            @elseif($row->rating == 2)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            @elseif($row->rating == 1)
                                            <span class="fa fa-star checked"></span>
                                            @endif
                                        </div>
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
</div>

<!-- Related Products -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Related Products</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        <!--Related product -->
                        @foreach($related_products as $row)
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('public/files/product/'.$row->thumbnail)}}" alt=""></div>
                                <div class="viewed_content text-center">
                                    @if($row->discount_price == null )
                                    <div class="viewed_price">{{$setting->currency}}{{$row->selling_price}}</div>
                                    @else
                                    <div class="viewed_price">{{$setting->currency}}{{$row->selling_price}} <span>{{$setting->currency}}{{$row->discount_price}}</span></div>
                                    @endif
                                    <div class="viewed_name"><a href="{{route('product.details',$row->slug)}}">{{substr($row->name, 0, 50)}}</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_new">new</li>
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

                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/forntend')}}/images/brands_1.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/forntend')}}/images/brands_2.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/forntend')}}/images/brands_3.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/forntend')}}/images/brands_4.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/forntend')}}/images/brands_5.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/forntend')}}/images/brands_6.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/forntend')}}/images/brands_7.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/forntend')}}/images/brands_8.jpg" alt=""></div>
                        </div>

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
                        <div class="newsletter_icon"><img src="{{asset('public/forntend')}}/images/send.png" alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text">
                            <p>...and receive %20 coupon for first shopping.</p>
                        </div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="#" class="newsletter_form">
                            <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                            <button class="newsletter_button">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('public/forntend')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('public/forntend')}}/styles/bootstrap4/popper.js"></script>
<script src="{{asset('public/forntend')}}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{asset('public/forntend')}}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{asset('public/forntend')}}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{asset('public/forntend')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('public/forntend')}}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{asset('public/forntend')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('public/forntend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{asset('public/forntend')}}/plugins/easing/easing.js"></script>
<script src="{{asset('public/forntend')}}/js/product_custom.js"></script>

<script type="text/javascript">
    $('#addcart').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
            url: url,
            type: 'post',
            data: request,
            success: function(data) {
                toastr.success(data);
                $('#addcart')[0].reset();
                $('.cart').load(location.href + ' .cart');
            }
        });
    });
</script>
@endsection