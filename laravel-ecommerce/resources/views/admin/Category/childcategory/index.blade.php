@extends('layouts.admin')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Child Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#childcategoryaddModal">
                            +Add new
                        </button>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Child Categories list here</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Child Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>category name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!--child category add Modal -->
    <div class="modal fade" id="childcategoryaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Child Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('childcategory.store')}}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Category Name/ Subcategory name</label>
                            <select class="form-select" name="subcategory_id" id="">
                                <option value="" disabled selected>Select an option</option>
                                @foreach($category as $row)
                                @php
                                $subcategory = DB::table('subcategories')->where('category_id', $row->id)->get();
                                @endphp
                                <option value="">{{$row->category_name}}</option>
                                @foreach($subcategory as $row)
                                <option value="{{$row->id}}">---{{$row->subcategory_name}}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Child category Name</label>
                            <input type="text" name="childcategory_name" class="form-control" placeholder="child category Name">
                        </div>
                        <p>Your main category</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- child category edit modal  -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Chil Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>

    <!-- ajax cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $(function childcategory() {
            let table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('childcategory.index')}}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'childcategory_name',
                    name: 'childcategory_name'
                }, {
                    data: 'subcategory_name',
                    name: 'subcategory_name'
                }, {
                    data: 'category_name',
                    name: 'category_name'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                }]
            });
        });
    </script>

    <script type="text/javascript">
        //child category edit ajax code


        $('body').on('click', '.edit', function() {
            let subcat_id = $(this).data('id');

            $.get('childcategory/edit/' + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
    @endsection