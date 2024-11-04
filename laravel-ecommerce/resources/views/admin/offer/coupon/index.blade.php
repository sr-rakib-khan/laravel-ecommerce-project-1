@extends('layouts.admin')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Coupon</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#couponaddModal">
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
                            <h3 class="card-title">All Coupon list</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Coupon Code</th>
                                        <th>Valid Date</th>
                                        <th>Type</th>
                                        <th>Coupon Amount</th>
                                        <th>Status</th>
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
    <div class="modal fade" id="couponaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('coupon.store')}}" method="Post" id="add_coupon">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="coupon_code" class="form-label">Coupon Code</label>
                            <input type="text" class="form-control" name="coupon_code" placeholder="coupon code">
                        </div>
                        <div class="mb-3">
                            <label for="coupon_type" class="form-label">Coupon Type</label>
                            <select class="form-select" name="coupon_type" id="">
                                <option value="1">Fixed</option>
                                <option value="2">percentage</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="coupon_code" class="form-label">Coupon Status</label>
                            <select class="form-select" name="coupon_status" id="coupon_status">
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="coupon_amount" class="form-label">Coupon Amount</label>
                            <input type="text" class="form-control" name="coupon_amount" placeholder="coupon amount">
                        </div>
                        <div class="mb-3">
                            <label for="coupon_date" class="form-label">Coupon Date</label>
                            <input type="date" class="form-control" name="coupon_date">
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


    <!-- coupon edit modal  -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Coupon</h5>
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
            $(function coupon() {
                var table = $('.ytable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('coupon.index')}}",
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    }, {
                        data: 'coupon_code',
                        name: 'coupon_code'
                    }, {
                        data: 'valid_date',
                        name: 'valid_date'
                    }, {
                        data: 'type',
                        name: 'type'
                    }, {
                        data: 'coupon_amount',
                        name: 'coupon_amount'
                    }, {
                        data: 'status',
                        name: 'status'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    }]
                });



                // coupon store ajax code 
                $('#add_coupon').submit(function(e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var request = $(this).serialize();
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: request,
                        success: function(data) {
                            toastr.success(data);
                            $('#add_coupon')[0].reset();
                            $("#couponaddModal").modal('hide');
                            table.ajax.reload();
                        }
                    });
                });


                //coupon edit ajax code
                $(document).on('click', '.edit', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');

                    $.get('coupon/edit/' + id, function(data) {
                        $("#modal_body").html(data);
                    });
                });



                // ajax delete code 
                $(document).on('click', '#coupon_delete', function(e) {
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