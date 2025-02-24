@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Events</h2>
    </div>
    <form method="post" action="{{route('event.set.candidates')}}">
        @csrf
        <input type="hidden" name="event_id" value="{{$event->id}}">
        <div class="row">
            <div class="col-md-12">            
                <label>Event Title</label>    
                <input type="text" readonly value="{{$event->title}}" class="form-control">
            </div>

            <div class="col-md-6">            
                <label>Select Members For Officers President</label>    
                <select class="form-control" multiple style="height:200px;min-height: 200px;" name="op[]">
                      <option value="{{NULL}}">Choose</option>  
                      @foreach($members as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                </select>
            </div>

            <div class="col-md-6">            
                <label>Select Members For Vice President</label>    
                <select class="form-control" multiple style="height:200px;min-height: 200px;" name="vp[]">
                      <option value="{{NULL}}">Choose</option>  
                      @foreach($members as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                </select>
            </div>

            <div class="col-md-6">            
                <label>Select Members For General Secretary Treasurer</label>    
                <select class="form-control" multiple style="height:200px;min-height: 200px;" name="gst[]">
                      <option value="{{NULL}}">Choose</option>  
                      @foreach($members as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                </select>
            </div>

            <div class="col-md-6">            
                <label>Select Members For Board of Directors</label>    
                <select class="form-control" multiple style="height:200px;min-height: 200px;" name="bod[]">
                      <option value="{{NULL}}">Choose</option>  
                      @foreach($members as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                </select>
            </div>

            <div class="col-md-6 mt-2">            
                <input type="submit" value="Submit" class="btn btn-primary btn-xxs">
            </div>
            <hr class="mb-2">
            <div class="col-md-12 mt-2">
                <h3>Nominated Candidates</h3>
                <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date & Time</th>
                        <th>Name</th>
                        <th>Candidate Role</th>
                        <th>Votes</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($candidateRoles as $p)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$p->created_at->diffForHumans()}}</td>
                            <td>{{$p->user_d->name}}</td>
                            <td>{{$p->status}}</td>
                             <td>{{$p->total_votes}}</td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>

            </div>
        </div>
    </form>
</div>
@endsection