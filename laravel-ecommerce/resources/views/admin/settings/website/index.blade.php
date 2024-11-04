@extends('layouts.admin')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Website Setting</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="card card-primary col-md-10">
                    <div class="card-header">
                        <h3 class="card-title">Website Setting</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('website.update', $website->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select name="currency" class="form-select" id="">
                                    <option value="৳" {{($website->currency=="৳")? "selected":''}}>Taka</option>
                                    <option value="$" {{($website->currency=="$")? "selected":"" }}>USD</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meta author">Phone One</label>
                                <input type="text" name="phone_one" class="form-control" value="{{$website->phone_one}}">
                            </div>
                            <div class="form-group">
                                <label for="meta_tag">Phone Two</label>
                                <input type="text" name="phone_two" class="form-control" value="{{$website->phone_two}}">
                            </div>
                            <div class="form-group">
                                <label for="main_email">Main email</label>
                                <input class="form-control" value="{{$website->main_email}}" name="main_email" />
                            </div>
                            <div class="form-group">
                                <label for="support_email">Support email</label>
                                <input type="text" value="{{$website->support_email}}" name="support_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" id="" cols="30" rows="05">{{$website->address}}</textarea>
                            </div>
                            <strong class="text-info">--Social Links--</strong>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" value="{{$website->facebook}}" name="facebook" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" value="{{$website->twitter}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" value="{{$website->instagram}}" name="instagram" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" value="{{$website->linkedin}}" name="linkedin" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="youtube">Youtube</label>
                                <input type="text" value="{{$website->youtube}}" name="youtube" class="form-control">
                            </div>
                            <strong class="text-info">--Logo & Favicon--</strong>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                <input type="hidden" value="{{$website->logo}}" name="old_logo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="favicon">Favicon</label>
                                <input type="file" name="favicon" class="form-control">
                                <input type="hidden" value="{{$website->favicon}}" name="old_favicon" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Website Settings</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection