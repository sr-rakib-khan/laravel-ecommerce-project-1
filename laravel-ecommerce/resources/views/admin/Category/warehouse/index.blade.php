@extends('layouts.admin')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Warehouse</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#warehouseaddModal">
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
                            <h3 class="card-title">All Warehouse list</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Warehouse Name</th>
                                        <th>Warehouse address</th>
                                        <th>Warehouse Phone</th>
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

    <!--warehouse add Modal -->
    <div class="modal fade" id="warehouseaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new warehouse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('warehouse.store')}}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Warehouse Name</label>
                            <input type="text" class="form-control" name="warehouse_name" placeholder="warehouse name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Warehouse address</label>
                            <input type="text" name="warehouse_address" class="form-control" placeholder="warehouse address">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Warehouse Phone</label>
                            <input type="text" name="warehouse_phone" class="form-control" placeholder="warehouse phone">
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


    <!-- warehouse edit modal  -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Warehouse</h5>
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
        $(function warehouse() {
            let table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('warehouse.index')}}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'warehouse_name',
                    name: 'warehouse_name'
                }, {
                    data: 'warehouse_address',
                    name: 'warehouse_address'
                }, {
                    data: 'warehouse_phone',
                    name: 'warehouse_phone'
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
        //warehouse edit ajax code


        $('body').on('click', '.edit', function() {
            let id = $(this).data('id');

            $.get('warehouse/edit/' + id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
    @endsection