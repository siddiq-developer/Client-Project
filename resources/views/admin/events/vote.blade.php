@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Voting</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
                            
                <div class="row">
                     <div class="col-md-3">
                        <a href="{{ route('event.voting.results',['id'=>$event->id]) }}" class="btn btn-primary btn-sm btn-block">View Voting Results</a>
                     </div>


                        @if($event->voting_status=='0')
                        <div class="col-md-3">
                                    <a class="btn btn-info btn-sm btn-block" href="{{route('event.change_voting_status',['id'=>$event->id,'status'=>'1'])}}">Start Voting</a>
                                </div>
                                @elseif($event->voting_status=='1')
                                <div class="col-md-3">
                                    <a class="btn btn-danger btn-sm btn-block" href="{{route('event.change_voting_status',['id'=>$event->id,'status'=>'2'])}}">Stop Voting</a>
                                </div>
                                @elseif($event->voting_status=='2')
                                <div class="col-md-3">
                                    <a class="btn btn-success btn-sm btn-block" href="{{route('event.change_voting_status',['id'=>$event->id,'status'=>'3'])}}">Annouce Results</a> 
                                    </div>
                                <div class="col-md-3">
                                                                        <h4 style="color:red">Voting Stopped</h4>   
                                </div>    

                                @else
                                    <h4 style="color:green">Results Annouced</h4>
                                @endif
                     </div>   
                </div>
                            

                              
            <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($members as $p)
                        @php 

                            if($p->status=='1'){
                                $status = 'Active';
                            }elseif($p->status=='0'){
                                $status = 'Pending';
                            }else{
                                $status = 'In-Active';                                
                            }

                        @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->email}}</td>
                             <td>{{$p->ec_d?$p->ec_d->status:'-'}}</td>
                            <td>{{$status}}</td>
                            
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection