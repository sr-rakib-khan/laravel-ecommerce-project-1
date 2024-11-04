@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_responsive.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/shop_responsive.css">
@include('layouts.fornt_partial.collaps_nav')

<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Tracking</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{route('order.check')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="orderid" class="form-label">Order Id</label>
                                        <input type="text" name="order_id" class="form-control" placeholder="Order Id" required>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-success" type="submit">Order truck</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{asset('public/forntend')}}/js/shop_custom.js"></script>
@endsection