@extends('layouts.admin')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ticket</h1>
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
                            <h3 class="card-title">All Tickets</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>User</th>
                                        <th>Subject</th>
                                        <th>Service</th>
                                        <th>Priority</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ticket as $key=>$row)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->subject}}</td>
                                        <td>{{$row->service}}</td>
                                        <td>{{$row->priority}}</td>
                                        <td>{{$row->date}}</td>
                                        <td>
                                            @if($row->status == 1)
                                            <span class="badge badge-warning">Running</span>
                                            @elseif($row->status == 2)
                                            <span class="badge badge-muted">Closed</span>
                                            @else
                                            <span class="badge badge-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{route('show.ticket', $row->id)}}">view</a>
                                            <a class="btn btn-danger btn-sm" href="{{route('ticket.delete', $row->id)}}">delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
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



    <!-- ajax cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let cat_id = $(this).data('id');
            $.get('category/edit/' + cat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
    @endsection