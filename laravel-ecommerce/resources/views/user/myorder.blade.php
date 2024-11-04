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
                        <div class="col-md-6">
                            <a href="{{route('write.review')}}" class="text-end">Write your review</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div style="margin-top: 20px;">
                        <h5>my order</h5>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myorder as $row)
                                <tr>
                                    <td>{{$row->order_id}}</td>
                                    <td>{{$row->date}}</td>
                                    <td>{{$row->total}}</td>
                                    <td>
                                        @if($row->status == 0)
                                        <span class="badge badge-danger">Order pending</span>
                                        @elseif($row->status == 1)
                                        <span class="badge badge-info">Order received</span>
                                        @elseif($row->status == 2)
                                        <span class="badge badge-info">Order shiped</span>
                                        @elseif($row->status == 3)
                                        <span class="badge badge-info">Order done</span>
                                        @elseif($row->status == 4)
                                        <span class="badge badge-info">Order return</span>
                                        @else
                                        <span class="badge badge-info">Order cancled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('order.details', $row->id)}}" class="btn btn-info btn-sm">view</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection