@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Events</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                                <a class="btn btn-info btn-xs m-1" href="{{route('user.event.show',['id'=>$p->id])}}">Details</a>
                                @if(strtotime(date('Y-m-d'))>=strtotime($p->start_date))
                                    <a class="btn btn-info btn-xs m-1" href="{{route('user.event.voting',['id'=>$p->id])}}">Voting</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection