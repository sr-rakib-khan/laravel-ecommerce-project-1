@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/cart_responsive.css">
@include('layouts.fornt_partial.collaps_nav')

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Billing Address</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('order.place')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="customer name" class="form-label">Customer Name</label>
                                        <input type="text" name="c_name" value="{{Auth::user()->name}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer name" class="form-label">Country</label>
                                        <input type="text" name="c_country" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer name" class="form-label">Email Address</label>
                                        <input type="email" name="c_email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer name" class="form-label">City</label>
                                        <input type="text" name="c_city" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="customer name" class="form-label">Customer Phone</label>
                                        <input type="text" name="c_phone" value="{{Auth::user()->phone}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer name" class="form-label">Shipping Address</label>
                                        <input type="text" name="c_shipping_address" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer name" class="form-label">Zip Code</label>
                                        <input type="text" name="c_zip_code" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer name" class="form-label">Extra Phone</label>
                                        <input type="text" name="c_extra_phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <strong>Payment Type</strong>
                            <div class="row">
                                <div class="form-check col-md-3 ml-3">
                                    <input class="form-check-input" type="radio" name="payment_type" value="paypal">
                                    <label class="form-check-label">
                                        Paypal
                                    </label>
                                </div>
                                <div class="form-check col-md-3">
                                    <input class="form-check-input" type="radio" name="payment_type" value="amarpay">
                                    <label class="form-check-label">
                                        Bkash/Nagad
                                    </label>
                                </div>
                                <div class="form-check col-md-3">
                                    <input class="form-check-input" type="radio" name="payment_type" value="Hand Cash">
                                    <label class="form-check-label">
                                        Hand Cash
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Order Placed</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <ul class="ml-2">
                        <div class="mb-2 mt-2">
                            <li>Sub Total: {{Cart::subtotal()}}</li>
                        </div>
                        @if(Session::has('coupon'))
                        <div class="mb-2">
                            <li>Coupon: <a href="{{route('coupon.remove')}}">X</a> {{Session::get('coupon')['discount']}}</li>
                        </div>
                        @endif
                        <div class="mb-2">
                            <li>Tax: 0.00</li>
                        </div>
                        <div class="mb-2">
                            <li>Shipping:0.00</li>
                        </div>
                        @if(Session::has('coupon'))
                        <Strong class="fs-3">Total: {{Session::get('coupon')['after_discount']}}</Strong>
                        @else
                        <Strong class="fs-3">Total: {{Cart::total()}}</Strong>
                        @endif

                        @if(!Session::has('coupon'))
                        <hr>
                        <form action="{{route('coupon.apply')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Coupon Apply</label>
                                <input type="text" name="coupon_code" class="form-control" placeholder="coupon code">
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success">Apply Coupon</button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection