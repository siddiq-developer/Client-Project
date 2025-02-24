@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Events</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('event.create') }}" class="btn btn-primary mb-3 btn-sm">Create Event</a>
            <div class="col-md-12">
                <small class="col-md-12">Attendance can only be marked after the event is started</small>
            </div>
            <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Desc.</th>
                        <th>Start Date / Time</th>
                        <th>End Date / Time</th>                        
                        <th>Address</th>
                        <th>Active</th>
                        <th>Action</th>                        
                    </tr>
                </thead>

                <tbody>
                    @foreach($event as $p)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td width="15%">
                                <img style="width: 100%;" src="{{\Storage::disk('public')->url('app/public/events/'.$p->image)}}">
                            </td>
                            <td>{{$p->title}}</td>
                            <td>{{$p->description}}</td>
                            <td>{{$p->start_date}} {{$p->start_time}}</td>
                            <td>{{$p->end_date}} {{$p->end_time}}</td>
                            <td>{{$p->status?'Yes':'No'}}</td>
                            <td>{{$p->address}}</td>
                            <td>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-xxs dropdown-toggle" data-bs-toggle="dropdown">Actions</button>
                                    <div class="dropdown-menu">
                                         <a class="btn mt-1 btn-block btn-xxs" href="{{route('event.edit',['id'=>$p->id])}}">Edit</a>
                                                <a class="btn mt-1 btn-block btn-xxs" href="{{route('event.delete',['id'=>$p->id])}}">Delete</a>
                                                <a class="btn mt-1 btn-block btn-xxs" href="{{route('event.attendance',['id'=>$p->id])}}">Attendance</a>
                                                <a class="btn mt-1 btn-block btn-xxs" href="{{route('event.candidates',['id'=>$p->id])}}">Candidates</a>
                                                <a class="btn mt-1 btn-block btn-xxs" href="{{route('event.voting',['id'=>$p->id])}}">Voting</a>

                                                <a class="btn mt-1 btn-block btn-xxs" href="{{route('event.details',['id'=>$p->id])}}">Details</a>
                                                @if($p->voting_status=='0')
                                                    <a class="btn mt-1 btn-block btn-xxs" href="{{route('event.change_voting_status',['id'=>$p->id,'status'=>'1'])}}">Start Voting</a>
                                                @elseif($p->voting_status=='1')
                                                    <a class="btn mt-1 btn-block btn-xxs" href="{{route('event.change_voting_status',['id'=>$p->id,'status'=>'2'])}}">Stop Voting</a>
                                                @endif

                                                
                                                @if(strtotime(date('Y-m-d'))<=strtotime($p->start_date))
                                                    <a class="btn mt-1 btn-block btn-block btn-xxs" href="{{route('event.invite',['id'=>$p->id])}}">Invite Members</a>
                                                @endif
                                    </div>
                                </div>
                               
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection