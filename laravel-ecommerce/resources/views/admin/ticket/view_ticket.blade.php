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
                <div class="col-5">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            Ticket Details
                        </div>
                        <div class="card-body">
                            <ul>
                                <li><strong>Subject: </strong> {{$ticket->subject}}</li>
                                <li><strong>Service: </strong> {{$ticket->service}}</li>
                                <li><strong>Priority: </strong> {{$ticket->priority}}</li>
                                <li><strong>Message: </strong> {{$ticket->message}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Reply message
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('admin.reply.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea name="message" class="form-control" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input name="image" class="form-control" type="file">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Reply message">
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            All messages
                        </div>
                        <div class="card-body" style="height: 350px; overflow-y:scroll">
                            @php
                            $replies = DB::table('replies')->where('ticket_id', $ticket->id)->orderBy('id', 'DESC')->get();
                            @endphp

                            @isset($replies)
                            @foreach($replies as $row)
                            <div class="card mt-3 @if($row->user_id == 0) ml-5 @endif">
                                <div class="card-header @if($row->user_id == 0) bg-primary text-right @else bg-success @endif">
                                    @if($row->user_id == 0) Admin @else {{Auth::user()->name}} @endif
                                </div>
                                <div class="card-body">
                                    <div class="blockquote">
                                        <p>{{$row->message}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- ajax cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @endsection