@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Events</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
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

        <div class="col-md-12">
            <h5>Event Members Detail</h5>
           <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($attendance->where('status','1') as $p)

                        @if($p->status=='1')
                            @php $status = 'Attended'; @endphp
                        @elseif($p->status=='0')
                            @php $status = 'Pending'; @endphp
                        @else
                            @php $status = 'Rejected'; @endphp
                        @endif
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$p->user_d->name}}</td>
                            <td>{{$status}}</td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>

        </div>

        <div class="col-md-12">
            <h5>Election Commission for Event</h5>
            <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total Votes</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($ec as $p)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$p->user_d->name}}</td>
                            <td>{{$p->user_d->email}}</td>
                            <td>{{$p->vote_d->count()}}</td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection