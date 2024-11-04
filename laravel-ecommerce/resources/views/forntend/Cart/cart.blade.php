@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/cart_responsive.css">
@include('layouts.fornt_partial.collaps_nav')

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart</div>
                    @foreach($content as $row)
                    @php
                    $product = DB::table('products')->where('id', $row->id)->first();
                    $colors = explode(',',$product->color);
                    $sizes = explode(',',$product->size);
                    @endphp
                    <div class="cart_items">
                        <ul class="cart_list">
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{asset('public/files/product/'.$row->options->thumbnail)}}" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{$product->name}}</div>
                                    </div>
                                    @if($row->options->color)
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart item-title">Color</div>
                                        <div class="cart_item_text">
                                            <select class="custom-select form-control-sm color" data-id="{{$row->rowId}}" style="min-width:100px;" name="color" id="">
                                                @foreach($colors as $color)
                                                <option value="{{$color}}" @if($color==$row->options->color) selected="" @endif>{{$color}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                    @if($row->options->size)
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Size</div>
                                        <div class="cart_item_text">
                                            <select class="custom-select form-control-sm size" data-id="{{$row->rowId}}" style="min-width:100px;" name="size" id="">
                                                @foreach($sizes as $size)
                                                <option value="{{$size}}" @if($size==$row->options->size) selected="" @endif>{{$size}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text">
                                            <input type="number" data-id="{{$row->rowId}}" class="form-control-sm qty" min="1" value="{{$row->qty}}" max="10">
                                        </div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">{{$setting->currency}}{{$row->price}}x{{$row->qty}}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">{{$setting->currency}}{{$row->price*$row->qty}}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Action</div>
                                        <a href="#">
                                            <div id="removecart" data-id="{{$row->rowId}}" class="cart_item_text">X</div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endforeach

                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">{{$setting->currency}}{{Cart::subtotal()}}</div>
                        </div>
                    </div>

                    <div class="cart_buttons">
                        <a href="{{route('login')}}" type="button" class="button cart_button_clear">Continue Shoping</a>
                        <a href="{{route('checkout')}}" type="button" class="button cart_button_checkout">Checkout</a>
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