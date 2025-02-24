@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Members Create</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('members.store')}}">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" placeholder="Enter Name" name="name" required class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" placeholder="Enter Email" name="email" required class="form-control">
                    </div>

                     <div class="col-md-6">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Password" name="password" required class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>Status</label>
                        <select class="form-control" name="duration" required>
                            <option value="{{NULL}}">Choose</option>
                            <option value="1">Active</option>
                            <option value="-1">In-Active</option>
                            <option value="0">Pending</option>
                        </select>
                    </div>

                     <div class="col-md-4 mt-2">
                        <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection