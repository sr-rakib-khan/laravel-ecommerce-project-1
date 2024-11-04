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
                            <h3 class="text-start">All tickets</h3>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{route('create.ticket')}}" class="btn btn-primary">Open ticket</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">service</th>
                                    <th scope="col">subject</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ticket as $row)
                                <tr>
                                    <td>{{date('d F,Y'), strtotime($row->date)}}</td>
                                    <td>{{$row->service}}</td>
                                    <td>{{$row->subject}}</td>
                                    <td>
                                        @if($row->status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                        @elseif($row->status == 1)
                                        <span class="badge badge-info">Replied</span>
                                        @elseif($row->status == 2)
                                        <span class="badge badge-info">Closed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('view.ticket', $row->id)}}">view</a>
                                        
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