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
                        <h4>your default shiping credentials</h4>
                        <form action="{{route('website.review.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Country</label>
                                <input type="text" name="country" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">City</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Zip Code</label>
                                <input type="text" name="zipcode" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <div>
                        <h4>Change Your Password</h4>
                        <form action="{{route('user.password.change')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Old Password</label>
                                <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror">
                            </div>

                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class=" mb-3">
                                <label for="" class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="mb-3">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                            </div>

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

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