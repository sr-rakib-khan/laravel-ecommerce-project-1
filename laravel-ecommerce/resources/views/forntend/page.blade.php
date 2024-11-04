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
                        <h3>{{$page_details->page_title}}</h3>
                    </div>
                    <div class="card-body">
                        {!! $page_details->page_description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{asset('public/forntend')}}/js/shop_custom.js"></script>
@endsection