@extends('layouts.admin')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pickup point</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pickuppointaddModal">
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
                            <h3 class="card-title">All pickup point list</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Pickup point name</th>
                                        <th>Pickup point address</th>
                                        <th>Pickup point phone</th>
                                        <th>Pickup point phone two</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <form id="deleted_form" action="" method='delete'>
                                @csrf @method('DELETE')
                            </form>
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

    <!--coupon add Modal -->
    <div class="modal fade" id="pickuppointaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new pickup point</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('pickup_point.store')}}" method="Post" id="add_pickup_point">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="pickup_point_name" class="form-label">pickup point name</label>
                            <input type="text" class="form-control" name="pickup_point_name" placeholder="pickup point name">
                        </div>
                        <div class="mb-3">
                            <label for="pickup_point_address" class="form-label">pickup point address</label>
                            <input type="text" class="form-control" name="pickup_point_address" placeholder="pickup point name">
                        </div>
                        <div class="mb-3">
                            <label for="pickup_point_phone" class="form-label">pickup point phone</label>
                            <input type="text" class="form-control" name="pickup_point_phone" placeholder="pickup point phone">
                        </div>
                        <div class="mb-3">
                            <label for="pickup_point_phone_two" class="form-label">pickup point phone (two)</label>
                            <input type="text" class="form-control" name="pickup_point_phone_two">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- pickup point edit modal  -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit pickup point</h5>
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
        $(document).ready(function() {
            $(function pickup_point() {
                var table = $('.ytable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('pickup_point.index')}}",
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    }, {
                        data: 'pickup_point_name',
                        name: 'pickup_point_name'
                    }, {
                        data: 'pickup_point_address',
                        name: 'pickup_point_address'
                    }, {
                        data: 'pickup_point_phone',
                        name: 'pickup_point_phone'
                    }, {
                        data: 'pickup_point_phone_two',
                        name: 'pickup_point_phone_two'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    }]
                });



                // pickup point store ajax code 
                $('#add_pickup_point').submit(function(e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var request = $(this).serialize();
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: request,
                        success: function(data) {
                            toastr.success(data);
                            $('#add_pickup_point')[0].reset();
                            $("#pickuppointaddModal").modal('hide');
                            table.ajax.reload();
                        }
                    });
                });


                //pickup point edit ajax code
                $(document).on('click', '.edit', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');

                    $.get('pickup_point/edit/' + id, function(data) {
                        $("#modal_body").html(data);
                    });
                });



                // ajax delete code 
                $(document).on('click', '#pickup_point_delete', function(e) {
                    e.preventDefault();
                    var url = $(this).attr("href");
                    $('#deleted_form').attr('action', url);
                    swal({
                            title: 'Are you sure to delete',
                            text: "Once delte, This will parmanently delete",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $('#deleted_form').submit();
                            } else {
                                swal('your data is safe!');
                            }
                        });
                });


                $('#deleted_form').submit(function(e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var request = $(this).serialize();
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: request,
                        success: function(data) {
                            toastr.success(data);
                            $('#deleted_form')[0].reset();
                            table.ajax.reload();
                        }
                    });
                });
            });
        });
    </script>
    <script>
    </script>
    @endsection