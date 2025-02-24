@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Events</h2>
    </div>
    <form method="post" action="{{route('event.invite.members')}}">
        @csrf
        <input type="hidden" name="event_id" value="{{$event->id}}">
        <div class="row">
            <div class="col-md-6">            
                <label>Event Title</label>    
                <input type="text" readonly value="{{$event->title}}" class="form-control">
            </div>

            <div class="col-md-6">            
                <label>Select Members</label>    
                <select class="form-control" required multiple name="members[]" style="height:200px;min-height: 200px;">
                      <option value="{{NULL}}">Choose</option>  
                      @foreach($members as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                </select>
            </div>

            <div class="col-md-6 mt-2">            
                <input type="submit" value="Submit" class="btn btn-primary btn-sm">
            </div>

            <div class="col-md-12">

                <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date & Time</th>
                        <th>User Name</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($invite as $p)
                        @if($p->status=='1')
                            @php $status = 'Approved'; @endphp
                        @elseif($p->status=='0')
                            @php $status = 'Pending'; @endphp
                        @else
                            @php $status = 'Rejected'; @endphp
                        @endif
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$p->created_at->diffForHumans()}}</td>
                            <td>{{$p->user_d->name}}</td>
                            <td>{{$status}}</td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>

            </div>
        </div>
    </form>
</div>
@endsection