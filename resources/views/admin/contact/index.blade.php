@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Contact Requests</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <h4>Contact Us</h4> 
                <form method="get" action="?">  
                    <div class="row mb-2 mt-2">
                        <div class="col-md-6 pl-0" style="padding-left: 0px;">
                            <input type="text" name="search" class="form-control" value="{{\Request::get('search')}}">
                        </div>

                        <div class="col-md-4">
                            <select class="form-control" name="type">
                                <option <?php if(\Request::has('type') && \Request::get('type')=='all') echo 'selected="selected"'; ?> value="all">All</option>
                                <option <?php if(\Request::has('type') && \Request::get('type')=='unread') echo 'selected="selected"'; ?> value="unread">Un-Read</option>
                                <option <?php if(\Request::has('type') && \Request::get('type')=='read') echo 'selected="selected"'; ?> value="read">Read</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>      
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12 pl-0" style="padding-left: 0px;">
                        <button class="btn btn-danger mb-2 btn-sm" style="display:none" id="delete_all_button">Delete Selected</button>
                        <button class="btn btn-success mb-2 btn-sm" style="display:none" id="mark_as_read">Mark as Read</button>
                        <a href="{{route('mark_as_read.contact.us')}}" class="btn btn-primary mb-2 btn-sm">Mark All as Read</a>
                    </div>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td># <input type="checkbox" id="checkall"></td>
                                <td>Date</td>
                                <td>Ticket #</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Message</td>
                                <td>Action</td>
                            </tr>
                        </thead>        

                        <tbody>
                            @foreach($contact_us as $c)
                                <tr>
                                    <td>@if($c->is_read!=1)<i style="font-size: 10px; color: red" class="bi bi-circle-fill"></i>@endif {{$loop->iteration}} <input type="checkbox" id="check{{$c->id}}" class="checkboxestd" value="{{$c->id}}"></td>
                                    <td>{{$c->created_at}}</td>
                                    <td>{{$c->ticket_id}}</td>
                                    <td>{{$c->name}}</td>
                                    <td>{{$c->email}}</td>
                                    <td>{{$c->phone}}</td>
                                    <td>{{$c->message}}</td>
                                    <td>
                                        <a href="javascript:void" class="text-danger delete-single-contact" data-id="{{$c->id}}">
                                            <i class="bi bi-x-circle">Delete</i>
                                        </a>

                                        <a href="{{route('contacts.reply',['id'=>$c->id])}}"><i class="bi bi-reply-all-fill" title="Reply to Contact"></i>Reply</a>

                                        <a href="{{route('contacts.block',['id'=>$c->id])}}"><i class="bi bi-shield-shaded" title="Block Contact"></i>Block</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>        
                    </table>    
                </div>
                {{$contact_us->links()}}
            
        </div>

    </div>
</div>

<form method="post" action="{{route('delete.contact.us')}}" id="contact_delete_form">
    @csrf
    <input type="hidden" name="delete_list" id="delete_list">
</form>

<form method="post" action="{{route('readALL.contact.us')}}" id="contact_read_form">
    @csrf
    <input type="hidden" name="read_list" id="read_list">
</form>
@endsection