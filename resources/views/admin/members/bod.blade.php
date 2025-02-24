@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Member set as BOD</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label>Name </label>
            <p>{{$user->name}}</p>
        </div>

        <form method="post" action="{{route('members.setBOD')}}">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="row">
                <div class="col-md-12">
                    <label>Select Role</label>
                    <select name="role_status" class="form-control" required>
                        <option <?php if($user->role_status=='Board of Director') echo 'selected="selected"'; ?> value="Board of Director">Board of Director</option>
                        <option <?php if($user->role_status=='General Secterary') echo 'selected="selected"'; ?> value="General Secterary">General Secterary</option>
                        <option <?php if($user->role_status=='President') echo 'selected="selected"'; ?> value="President">President</option>
                        <option <?php if($user->role_status=='Vice President') echo 'selected="selected"'; ?> value="Vice President">Vice President</option>
                        <option <?php if($user->role_status=='Tresurer') echo 'selected="selected"'; ?> value="Tresurer">Tresurer</option>
                    </select>    
                </div>
                <div class="col-md-12">
                    <label>Note</label>
                    <textarea class="form-control" name="note" required>{{$user->bod_description}}</textarea>
                </div>
                <div class="col-md-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-success btn-xs" name="Submit">
                </div>
            </div>

        </form>

    </div>
</div>
@endsection