@extends('layouts.admin')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Payment Gateway Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Payment gateway setting</li>
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
                <div class="card card-primary col-md-4">
                    <div class="card-header">
                        <h3 class="card-title">Amarpay Payment gateway</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('amarpay.update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$amarpay->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="meta_title">Store Id</label>
                                <input type="text" name="store_id" value="{{$amarpay->store_id}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="meta author">Signature Key</label>
                                <input type="text" name="signature_key" class="form-control" value="{{$amarpay->signature_key}}">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="status" value="1" @if($amarpay->status == 1) checked @endif>
                                <label for="meta author">Live Server</label>
                                <small>(if Live server checked it work for live sever)</small>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card card-primary col-md-4">
                    <div class="card-header">
                        <h3 class="card-title">Shurjopay Payment gateway</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('update.shurjopay')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$shurjopay->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="meta_title">Store Id</label>
                                <input type="text" name="store_id" value="{{$shurjopay->store_id}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="meta author">Signature Key</label>
                                <input type="text" name="signature_key" class="form-control" value="{{$shurjopay->signature_key}}">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="status" value="1" @if($shurjopay->status == 1) checked @endif>
                                <label for="meta author">Live server</label>
                                <small>(if live server checked it work for live sever)</small>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <div class="card card-primary col-md-4">
                    <div class="card-header">
                        <h3 class="card-title">SSlcommerz Payment gateway</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('update.sslcommerz')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$sslcommerz->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="meta_title">Store Id</label>
                                <input type="text" name="store_id" value="{{$sslcommerz->store_id}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="meta author">Signature Key</label>
                                <input type="text" name="signature_key" class="form-control" value="{{$sslcommerz->signature_key}}">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="status" value="1" @if($sslcommerz->status == 1) checked @endif>
                                <label for="meta author">Live Server</label>
                                <small>(if live server checked it work for live sever)</small>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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