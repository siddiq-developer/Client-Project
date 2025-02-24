@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Events</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
                                @if($event[0]->voting_status=='0')
                                    <a class="btn mt-1 btn-info btn-xs" href="{{route('event.change_voting_status',['id'=>$event[0]->id,'status'=>'1'])}}">Start Voting</a>
                                @elseif($event[0]->voting_status=='1')
                                    <a class="btn mt-1 btn-danger btn-xs" href="{{route('event.change_voting_status',['id'=>$event[0]->id,'status'=>'2'])}}">Stop Voting</a>
                                @elseif($event[0]->voting_status=='2')
                                    <h4 style="color:red">Voting Stopped</h4>   
                                    <a class="btn mt-1 btn-success btn-xs" href="{{route('event.change_voting_status',['id'=>$event[0]->id,'status'=>'3'])}}">Annouce Results</a> 
                                @else
                                    <h4 style="color:green">Results Annouced</h4>
                                @endif
            <h5>Event Detail</h5>
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
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>

        
        @foreach($roles as $r)
        <div class="col-md-12 mt-2">
                <h3>Candidates for {{$r}}</h3>
                <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Candidate Role</th>
                        <th>Votes</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($all_candidates->where('status',$r) as $p)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$p->user_d->name}}</td>
                            <td>{{$p->status}}</td>
                             <td>{{$p->total_votes}}</td>
                             <td>
                                @if($p->result)
                                    <a class="btn btn-danger btn-xs" href="{{route('event.members.removeasec',['id'=>$p->member_id,'event_id'=>$p->event_id])}}">Remove as {{$p->status}}</a>
                                @else
                                    @if($r=='Election Commision')
                                    <a class="btn btn-primary btn-xs" href="{{route('event.members.setasec',['id'=>$p->member_id,'event_id'=>$p->event_id,'status'=>'ec'])}}">Set as EC</a>
                                    @endif

                                    @if($r=='Officers President')
                                    <a class="btn btn-primary btn-xs" href="{{route('event.members.setasec',['id'=>$p->member_id,'event_id'=>$p->event_id,'status'=>'op'])}}">Set as OP</a>
                                    @endif
                                    @if($r=='Vice President')
                                    <a class="btn btn-primary btn-xs" href="{{route('event.members.setasec',['id'=>$p->member_id,'event_id'=>$p->event_id,'status'=>'vp'])}}">Set as VP</a>
                                    @endif
                                    @if($r=='General Secretary Treasurer')
                                    <a class="btn btn-primary btn-xs" href="{{route('event.members.setasec',['id'=>$p->member_id,'event_id'=>$p->event_id,'status'=>'gst'])}}">Set as GST</a>   
                                    @endif
                                    @if($r=='Board of Director')<a class="btn btn-primary btn-xs" href="{{route('event.members.setasec',['id'=>$p->member_id,'event_id'=>$p->event_id,'status'=>'bod'])}}">Set as BOD</a>                         
                                    @endif           
                                @endif
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>

        </div>

        @endforeach

    </div>
</div>
@endsection