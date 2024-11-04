@extends('layouts.admin')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Campaign</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#campaignModal">
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
                            <h3 class="card-title">All campaign list here</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Campaign Title</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>Status</th>
                                        <th>Discount</th>
                                        <th>Brand Logo</th>
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

    <!--campaign add Modal -->
    <div class="modal fade" id="campaignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Campaign</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('campaign.store')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Campaign Title</label>
                                    <input type="text" name="campaign_title" class="form-control" placeholder="Campaign Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">End Date</label>
                                    <input type="date" name="end_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                                    <select name="status" class="form-control form-select-sm" aria-label=".form-select-sm example">
                                        <option value="1">Active</option>
                                        <option value="2">Deactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="discount" class="form-label">Discount(%)</label>
                                    <input type="text" name="discount" class="form-control" placeholder="discount">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Campaign Logo</label>
                                <input type="file" name="campaign_logo" class="form-control">
                            </div>
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


    <!-- campaign edit modal  -->
    <div class="modal fade" id="campaigneditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit campaign</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>

    <!-- ajax cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- dropify js link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script type="text/javascript">
        $(function campaign() {
            let table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('campaign.index')}}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'campaign_title',
                    name: 'campaign_title'
                }, {
                    data: 'start_date',
                    name: 'start_date'
                }, {
                    data: 'end_date',
                    name: 'end_date'
                }, {
                    data: 'status',
                    name: 'status'
                }, {
                    data: 'discount',
                    name: 'discount'
                }, {
                    data: 'campaign_logo',
                    name: 'campaign_logo',
                    render: function(data, type, full, meta) {
                        return "<img src=\"" + data + "\" height=\"40\" / > "
                    }
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
        //brand edit ajax code

        $('body').on('click', '.edit', function() {
            let campaign_id = $(this).data('id');
            $.get('campaign/edit/' + campaign_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>

    <!-- dropify jquery code  -->

    <script type="text/javascript">
        $('.dropify').dropify({

        });
    </script>
    @endsection