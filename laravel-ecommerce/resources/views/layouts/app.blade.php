<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/bootstrap4/bootstrap.min.css">

    <link href="{{asset('public/forntend')}}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">

    <link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">

    <link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/plugins/OwlCarousel2-2.2.1/animate.css">

    <link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/plugins/slick-1.8.0/slick.css">

    <link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/main_styles.css">

    <link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/responsive.css">



    <!-- toastr link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />




</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{asset('public/forntend')}}/images/phone.png" alt=""></div>{{$setting->phone_one}}
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{asset('public/forntend')}}/images/mail.png" alt=""></div><a href="https://colorlib.com/cdn-cgi/l/email-protection#234542505750424f465063444e424a4f0d404c4e"><span class="__cf_email__" data-cfemail="34525547404755585147745359555d581a575b59">{{$setting->main_email}}</span></a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                @if(Auth::check())
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="#">{{Auth::user()->name}}<i class="fas fa-chevron-down"></i></a>
                                            <ul style="width: 200px;">
                                                <li><a href="{{route('profile')}}">Profile</a></li>
                                                <li><a href="#">Setting</a></li>
                                                <li><a href="#">Order List</a></li>
                                                <li><a href="{{route('customer.logout')}}">Log out</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                @endif

                                @guest
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="#">Log in<i class="fas fa-chevron-down"></i></a>
                                            <ul style="width:300px">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form action="{{route('login')}}" method="post">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label">Email address</label>
                                                                <input type="email" name="email" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Password</label>
                                                                <input type="password" name="password" class="form-control">
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-6 offset-md-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                        <label class="form-check-label" for="remember">
                                                                            {{ __('Remember Me') }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-success" type="submit">login</button>
                                                        </form>
                                                        <a class="btn btn-info btn-sm mt-3" href="{{route('social.oauth','google')}}">Login with google</a>
                                                    </div>
                                                </div>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('register')}}">Register<i class="fas fa-chevron-down"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo">
                                    <img src="{{asset($setting->logo)}}" height="80px" alt="">
                                </div>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <input type="search" required="required" class="header_search_input" placeholder="Search for products...">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        <li><a class="clc" href="#">Computers</a></li>
                                                        <li><a class="clc" href="#">Laptops</a></li>
                                                        <li><a class="clc" href="#">Cameras</a></li>
                                                        <li><a class="clc" href="#">Hardware</a></li>
                                                        <li><a class="clc" href="#">Smartphones</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img src="{{asset('public/forntend')}}/images/heart.png" alt=""></div>
                                    @php
                                    $wishlist_count = DB::table('wishlists')->where('user_id', Auth::id())->count();
                                    @endphp
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="{{route('wishlist')}}">Wishlist</a></div>
                                        <div class="wishlist_count">{{$wishlist_count}}</div>
                                    </div>
                                </div>

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <a href="{{route('my.cart')}}">
                                            <div class="cart_icon">
                                                <img src="{{asset('public/forntend')}}/images/cart.png" alt="">
                                                <div class="cart_count"><span>{{Cart::count()}}</span></div>
                                            </div>
                                        </a>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="#">Cart</a></div>
                                            <div class="cart_price">{{$setting->currency}} {{Cart::total()}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('navbar')

        </header>

        @yield('content')

        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 footer_col">
                        <div class="footer_column footer_contact">
                            <div class="logo_container">
                                <div class="logo">
                                    <img src="{{asset($setting->logo)}}" height="80px" alt="">
                                </div>
                            </div>
                            <div class="footer_title">Got Question? Call Us 24/7</div>
                            <div class="footer_phone">{{$setting->phone_one}}</div>
                            <div class="footer_contact_text">
                                <p>17 Princess Road, London</p>
                                <p>Grester London NW18JR, UK</p>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{$setting->youtube}}"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href=""><i class="fab fa-google"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @php
                    $page_one = DB::table('pages')->where('page_position', 1)->get();
                    $page_two = DB::table('pages')->where('page_position', 2)->get();
                    @endphp
                    <div class="col-lg-2 offset-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Find it Fast</div>
                            <ul class="footer_list">
                                @foreach($page_one as $row)
                                <li><a href="{{route('view.page',$row->page_slug)}}">{{$row->page_title}}</a></li>
                                @endforeach
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <ul class="footer_list footer_list_2">
                                @foreach($page_two as $row)
                                <li><a href="{{route('view.page',$row->page_slug)}}">{{$row->page_title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Customer Care</div>
                            <ul class="footer_list">
                                <li><a href="{{route('home')}}">My Account</a></li>
                                <li><a href="{{route('order.tracking')}}">Order Tracking</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">Customer Services</a></li>
                                <li><a href="#">Returns / Exchange</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Product Support</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- Copyright -->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                            <div class="copyright_content">
                                Copyright &copy;<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://templatespoint.net/" target="_blank">TemplatesPoint</a>
                            </div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
                                </ul>
                            </div>
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
    <script src="{{asset('public/forntend')}}/plugins/slick-1.8.0/slick.js"></script>
    <script src="{{asset('public/forntend')}}/plugins/easing/easing.js"></script>
    <script src="{{asset('public/forntend')}}/js/custom.js"></script>

    <!-- toastr js link  -->
    <script src="{{asset('public/backend')}}/plugins/toastr/toastr.min.js"></script>

    <!-- toastr js code  -->
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}";
        switch (type) {
            case 'info':
                toastr.info("{{Session::get('message')}}");
                break;
            case 'success':
                toastr.success("{{Session::get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{Session::get('message')}}");
                break;
        }
        @endif
    </script>



</body>

</html>