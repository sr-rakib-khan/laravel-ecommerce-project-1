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
                        <li class="breadcrumb-item active">Create Page</li>
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
                <div class="card card-primary col-md-8">
                    <div class="card-header">
                        <h3 class="card-title">Create a new page</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('page.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="old password">Page Position</label>
                                <select class="form-select" name="page_position" id="">
                                    <option value="1">one</option>
                                    <option value="2">tow</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="page_name">Page name</label>
                                <input type="text" name="page_name" class="form-control" placeholder="page name">
                            </div>
                            <div class="form-group">
                                <label for="page_title">Page Title</label>
                                <input type="text" name="page_title" class="form-control " placeholder="Page Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Page Description</label>
                                <textarea class="form-control textarea" name="page_description" id=""></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Page</button>
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