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
                    <div>
                        <form action="{{route('website.review.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Write Your Review</label>
                                <textarea class="form-control" name="review" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Rating</label>
                                <select class="form-select" aria-label="Default select example" name="rating" style="min-width: 300px;">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option selected value="5">Five</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection