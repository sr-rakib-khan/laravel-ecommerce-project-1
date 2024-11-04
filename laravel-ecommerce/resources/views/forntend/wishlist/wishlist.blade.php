@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/cart_responsive.css">
@include('layouts.fornt_partial.collaps_nav')

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Your Wishlist</div>
                    @foreach($wishlist as $row)
                    <div class="cart_items">
                        <ul class="cart_list">
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{asset('public/files/product/'.$row->thumbnail)}}" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{$row->name}}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Action</div>
                                        <a href="{{route('product.details',$row->slug)}}" class="btn btn-success">View Product</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    @endforeach

                    <div class="cart_buttons">
                        @if(isset($wishlist_count) && $wishlist_count>0)
                        <a href="{{route('wishlist.remove')}}"><button type="button" class="button cart_button_checkout">Remove From Wishlist</button></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ajax cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    // ajax code for cart remove 
    $(document).on('click', '#removecart', function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            url: '{{url("remove/cart-product/")}}/' + id,
            type: 'get',
            success: function(data) {
                toastr.success(data);
                // $('#addcart')[0].reset();
                $('.cart').load(location.href + ' .cart');
                $('.cart_section').load(location.href + ' .cart_section');

            }
        });
    });

    // ajax code for cart qty update 
    $(document).on('blur', '.qty', function(e) {
        e.preventDefault();
        var qty = $(this).val();
        var rowId = $(this).data("id");
        $.ajax({
            url: '{{url("cart-qty/update/")}}/' + rowId + '/' + qty,
            type: 'get',
            success: function(data) {
                toastr.success(data);
                $('.cart').load(location.href + ' .cart');
                $('.cart_section').load(location.href + ' .cart_section');

            }
        });
    });

    // ajax code for cart color update 
    $(document).on('change', '.color', function(e) {
        e.preventDefault();
        var color = $(this).val();
        var rowId = $(this).data("id");
        $.ajax({
            url: '{{url("cart-product-color/update/")}}/' + rowId + '/' + color,
            type: 'get',
            success: function(data) {
                toastr.success(data);
                $('.cart').load(location.href + ' .cart');
                $('.cart_section').load(location.href + ' .cart_section');
            }
        });
    });



    // ajax code for cart size update 
    $(document).on('change', '.size', function(e) {
        e.preventDefault();
        var size = $(this).val();
        var rowId = $(this).data("id");
        $.ajax({
            url: '{{url("cart-product-size/update/")}}/' + rowId + '/' + size,
            type: 'get',
            success: function(data) {
                toastr.success(data);
                $('.cart').load(location.href + ' .cart');
                $('.cart_section').load(location.href + ' .cart_section');
            }
        });
    });
</script>
@endsection