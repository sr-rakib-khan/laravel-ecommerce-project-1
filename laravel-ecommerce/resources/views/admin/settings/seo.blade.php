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
                        <li class="breadcrumb-item active">onPage SEO</li>
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
                <div class="card card-primary col-md-6">
                    <div class="card-header">
                        <h3 class="card-title">Your SEO Settings</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('seo.setting.update', $data->id)}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="meta_title">Meta title</label>
                                <input type="text" name="meta_title" value="{{$data->meta_title}}" class="form-control" id="meta_title" placeholder="Enter meta title">
                            </div>
                            <div class="form-group">
                                <label for="meta author">Meta author</label>
                                <input type="text" name="meta_author" class="form-control" value="{{$data->meta_author}}" id="meta author" placeholder="Enter meta author">
                            </div>
                            <div class="form-group">
                                <label for="meta_tag">Meta tag</label>
                                <input type="text" name="meta_tag" class="form-control" value="{{$data->meta_tag}}" id="meta_tag" placeholder="Enter meta tag">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta description</label>
                                <textarea class="form-control" name="meta_description" id="" cols="30" rows="5">{{$data->meta_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keyword</label>
                                <input type="text" value="{{$data->meta_keyword}}" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Enter meta keyword">
                            </div>
                            <strong>---others---</strong> <br><br>
                            <div class="form-group">
                                <label for="google_varification">Google verifiacion</label>
                                <input type="text" name="google_varification" class="form-control" value="{{$data->google_varification}}" id="google_varification" placeholder="Enter google varification">
                            </div>
                            <div class="form-group">
                                <label for="google_analytics">Google Analytics</label>
                                <input type="text" value="{{$data->google_analytics}}" name="google_analytics" class="form-control" id="google_analytics" placeholder="Enter google analytics">
                            </div>
                            <div class="form-group">
                                <label for="alexa_varification">Alexa varification</label>
                                <input type="text" name="alexa_varification" value="{{$data->alexa_varification}}" class="form-control" id="alexa_varification" placeholder="Enter alexa varification">
                            </div>
                            <div class="form-group">
                                <label for="google_adsense">Google adsense</label>
                                <input type="text" value="{{$data->google_adsense}}" name="google_adsense" class="form-control" id="google_adsense" placeholder="Enter google adsense">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update SEO Settings</button>
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