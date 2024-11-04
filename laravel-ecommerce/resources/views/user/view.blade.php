@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/forntend')}}/styles/product_responsive.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@include('layouts.fornt_partial.collaps_nav')

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4">
            @include('user.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Your ticket details
                </div>
                <div class="col-md-4">
                    <ul>
                        <li><strong>Subject: </strong> {{$ticket->subject}}</li>
                        <li><strong>Service: </strong> {{$ticket->service}}</li>
                        <li><strong>Priority: </strong> {{$ticket->priority}}</li>
                        <li><strong>Message: </strong> {{$ticket->message}}</li>
                    </ul>
                </div>

                <div class="col-md-2">
                    <a href="{{asset($ticket->image)}}" target="_blank"><img src="{{$ticket->image}}" width="50px" alt=""></a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    All reply
                </div>
                <div class="card-body" style="height:350px; overflow-y:scroll;">
                    <div class="row">
                        <div class="col-md-6">
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
            <div class="card mt-2">
                <div class="card-header">
                    Reply message
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('customer.reply.store')}}" method="post" enctype="multipart/form-data">
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
            <div class="card mt-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-start">Create Ticket</h3>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <strong>submit your ticket we will reply</strong>
                    <br>
                    <br>

                    <div>
                        <form action="{{route('ticket.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Priority</label>
                                    <select class="form-select" name="priority" style="min-width: 250px;">
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Service</label>
                                    <select class="form-select" name="service" style="min-width: 250px;">
                                        <option value="Technical">Technical</option>
                                        <option value="Payment">Payment</option>
                                        <option value="Affiliate">Affiliate</option>
                                        <option value="Return">Return</option>
                                        <option value="Refund">Refund</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                <textarea class="form-control" name="message" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">submit ticket</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection