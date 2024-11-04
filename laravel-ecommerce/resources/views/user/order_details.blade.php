@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_responsive.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@include('layouts.fornt_partial.collaps_nav')

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4">
            @include('user.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-start">Dashboard</h3>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div style="margin-top: 20px;">
                        <h5>Order Details</h5>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order_details as $key=>$row)
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{$row->product_name}}</td>
                                    <td>{{$row->color}}</td>
                                    <td>{{$row->size}}</td>
                                    <td>{{$row->quantity}}</td>
                                    <td>{{$row->single_price}}</td>
                                    <td>{{$row->subtotal_price}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-5">
                            <ul>
                                <li><strong>Name:</strong> {{$order->c_name}}</li>
                                <li><strong>Phone:</strong> {{$order->c_phone}}</li>
                                <li><strong>Order Id:</strong> {{$order->order_id}}</li>
                                <li><strong>Status:</strong> @if($order->status == 0)
                                    <span class="badge badge-danger">Order pending</span>
                                    @elseif($order->status == 1)
                                    <span class="badge badge-info">Order received</span>
                                    @elseif($order->status == 2)
                                    <span class="badge badge-info">Order shiped</span>
                                    @elseif($order->status == 3)
                                    <span class="badge badge-info">Order Completed</span>
                                    @elseif($order->status == 4)
                                    <span class="badge badge-info">Order return</span>
                                    @else
                                    <span class="badge badge-info">Order cancled</span>
                                    @endif
                                </li>
                                <li><strong>Date:</strong> {{$order->date}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection