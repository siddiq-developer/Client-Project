@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Events</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>{{$event->title}} Event Attendance</h4>
            <div class="col-md-12">

                <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date & Time</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Mark Attendance</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($invite as $p)
                        @if($p->attendance=='1')
                            @php $status = 'Present'; @endphp
                        @elseif($p->status=='0')
                            @php $status = 'Absent'; @endphp
                        @else
                            @php $status = 'Rejected'; @endphp
                        @endif
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$p->created_at->diffForHumans()}}</td>
                            <td>{{$p->user_d->name}}</td>
                            <td>{{$status}}</td>
                            <td>
                                @if($p->attendance==0)
                                <a href="{{route('events.markattendance',['id'=>$p->id])}}" class="btn btn-success btn-xs">Mark Attendance</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>

            </div>
        </div>

    </div>
</div>
@endsection