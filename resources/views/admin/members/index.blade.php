@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Members</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Create Member</a>
            <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Action</th>                        
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
                            <td>{{$status}}</td>
                            <td>{{$p->role_status==NULL?'-':$p->role_status}}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{route('members.edit',['id'=>$p->id])}}">Edit</a>
                                <a class="btn btn-success btn-xs" href="{{route('members.view',['user'=>$p->id])}}">Show</a> 
                                @if($p->role_status!=NULL)
                                <a class="btn btn-warning btn-xs" href="{{route('members.removebod',['user'=>$p->id])}}">Remove Role</a
                                >
                                @else
                                <a class="btn btn-info btn-xs" href="{{route('members.bod',['user'=>$p->id])}}">Set Role</a
                                >
                                @endif
                                <a class="btn btn-danger btn-xs" href="{{route('members.delete',['id'=>$p->id])}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection