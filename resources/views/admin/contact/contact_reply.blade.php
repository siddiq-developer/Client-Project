@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Contact Requests</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <h4>Contact Us</h4> 
            <form method="post" action="{{route('contacts.reply.save')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$contact->id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" class="form-control" readonly  value="{{$contact->name}}">
                            </div>
                            <div class="col-md-4">
                                <label>Email</label>
                                <input type="text" class="form-control" readonly  value="{{$contact->email}}">
                            </div>
                            <div class="col-md-4">
                                <label>Subject</label>
                                <input type="text" class="form-control" readonly  value="{{$contact->subject}}">
                            </div>

                            <div class="col-md-4">
                                <label>Message</label>
                                <input type="text" class="form-control" readonly  value="{{$contact->message}}">
                            </div>


                            <div class="col-md-12">
                                <label>Type text here</label>
                                <textarea class="form-control" id="reply" name="reply">
                                </textarea>
                            </div>          

                            <div class="col-md-3 mt-5">
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>                                                                      
                        </div>
                    </form>    
                        
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