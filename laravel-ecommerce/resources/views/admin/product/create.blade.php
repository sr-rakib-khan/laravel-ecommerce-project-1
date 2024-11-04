@extends('layouts.admin')
@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" integrity="sha512-3uVpgbpX33N/XhyD3eWlOgFVAraGn3AfpxywfOTEQeBDByJ/J7HkLvl4mJE1fvArGh4ye1EiPfSBnJo2fgfZmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag {
        background: #428bca;
        border: 1px solid white;
        padding: 1 6px;
        padding-left: 2px;
        padding-right: 2px;
        color: white;
        border-radius: 4px;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add new product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="product name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Code</label>
                                    <input type="text" name="code" class="form-control" value="{{old('code')}}" placeholder="product code">
                                </div>
                                <div class="form-group">
                                    <label for="">Category/Subcategory</label>
                                    <select id="subcategory_id" name="subcategory_id" class="form-select">
                                        <option disabled selected>chose category</option>
                                        @foreach($category as $row)
                                        @php
                                        $sub_cat = DB::table('subcategories')->where('category_id', $row->id)->get();
                                        @endphp
                                        <option class="text-primary" disabled>{{$row->category_name}}</option>
                                        @foreach($sub_cat as $row)
                                        <option value="{{$row->id}}">---{{$row->subcategory_name}}</option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Child Category</label>
                                    <select id="childcategory_id" name="childcategory_id" class="form-select">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand" class="form-select">
                                        <option disabled selected>Chose Brand name</option>
                                        @foreach($brand as $row)
                                        <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Pickup Point</label>
                                    <select name="pickup_point_id" class="form-select">
                                        <option disabled selected>Chose pickup point name</option>
                                        @foreach($pickup_point as $row)
                                        <option value="{{$row->id}}" selected>{{$row->pickup_point_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit</label>
                                    <input type="text" class="form-control" name="unit" value="{{old('unit')}}" placeholder="unit">
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" class="form-control" name="tags" data-role="tagsinput" value="{{old('tags')}}" placeholder="product tags">
                                </div>
                                <div class="form-group">
                                    <label for="Purchase_price">Purchase Price</label>
                                    <input type="text" class="form-control" name="Purchase_price" value="{{old('Purchase_price')}}" placeholder="product price">
                                </div>
                                <div class="form-group">
                                    <label for="selling_price">Selling Price</label>
                                    <input type="text" class="form-control" name="selling_price" value="{{old('selling_price')}}" placeholder="product selling price">
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">Discount Price</label>
                                    <input type="text" class="form-control" name="discount_price" value="{{old('discount_price')}}" placeholder="product discount price">
                                </div>
                                <div class="form-group">
                                    <label for="">Warehouse</label>
                                    <select name="warehouse" class="form-select">
                                        <option disabled selected>chose warehouse</option>
                                        @foreach($warehouse as $row)
                                        <option value="{{$row->warehouse_name}}">{{$row->warehouse_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" class="form-control" name="stock" value="{{old('stock')}}" placeholder="Stock">
                                </div>
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" name="color" data-role="tagsinput" value="{{old('color')}}" placeholder="Color">
                                </div>
                                <div class="form-group">
                                    <label for="tags">Size</label>
                                    <input type="text" class="form-control" name="size" data-role="tagsinput" value="{{old('size')}}" placeholder="Size">
                                </div>
                                <div class="form-group">
                                    <label for="tags">Product Details</label>
                                    <textarea class="form-control" name="product_details" cols="30" rows="03"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Video embaded code</label>
                                    <input type="video" class="form-control" name="video_embaded_code" placeholder="only code after embed">
                                    <strong class="text-danger">only code after embed</strong>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Main Thumbnail</label>
                                    <input type="file" accept="image/*" class="form-control" name="thubmnail">
                                </div>
                                <div class="">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <div class="card-header">
                                            <h3 class="card-title text-bold">More Images(click add for more images)</h3>
                                        </div>
                                        <tr>
                                            <td><input type="file" accept="image/*" name="images[]" class="form-control name_lsit"></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card p-4">
                                    <h6 class="text-bold">featured product</h6>
                                    <input type="checkbox" value="1" name="featured_product" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                                <div class="card p-4">
                                    <h6 class="text-bold">Towday Deal</h6>
                                    <input type="checkbox" value="1" name="today_deal" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>

                                <div class="card p-4">
                                    <h6 class="text-bold">Product Slider</h6>
                                    <input type="checkbox" value="1" name="product_slider" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>

                                <div class="card p-4">
                                    <h6 class="text-bold">Trendy Product</h6>
                                    <input type="checkbox" value="1" name="trendy_product" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>

                                <div class="card p-4">
                                    <h6 class="text-bold">Status</h6>
                                    <input type="checkbox" value="1" name="status" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" selected>1</option>
                                    </select>
                                </div> -->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- ajax cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js" integrity="sha512-J+763o/bd3r9iW+gFEqTaeyi+uAphmzkE/zU8FxY6iAvD3nQKXa+ZAWkBI9QS9QkYEKddQoiy0I5GDxKf/ORBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $('.dropify').dropify();


    $('input[data-bootstrap-switch]').each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    $(document).ready(function() {
        let postURL = "<?php echo url('addmore'); ?>";
        let i = 1;

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="file" accept="image/*" name="images[]" placeholder="enter your name" class="form-control name_list"/></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>')
        });

        $(document).on('click', '.btn_remove', function() {
            let button_id = $(this).attr('id');
            $('#row' + button_id + '').remove();
        });
    });
</script>

<script type="text/javascript">
    // ajax request send for get childcategory
    $('#subcategory_id').change(function() {
        let id = $(this).val();
        $.ajax({
            url: "{{url('/get-child-category/')}}/" + id,
            type: 'get',
            success: function(data) {
                $('select[name="childcategory_id"]').empty();
                $.each(data, function(key, data) {
                    $('select[name="childcategory_id"]').append('<option value="' + data.id + '">' + data.childcategory_name + '</option>');
                });
            }
        });
    });
</script>
@endsection