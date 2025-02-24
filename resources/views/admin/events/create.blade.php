@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Events Create</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('event.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <label>Title</label>
                        <input type="text" placeholder="Enter Title" name="title" required class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label>Desc</label>
                        <textarea type="text" placeholder="Enter Description" name="description" required class="form-control"></textarea>
                    </div>

                    <div class="col-md-3">
                        <label>Start Date</label>
                        <input type="date" min="{{date('Y-m-d')}}" placeholder="Enter Start Date" name="start_date" required class="form-control">
                    </div>


                     <div class="col-md-3">
                        <label>Start Time</label>
                        <input type="time" placeholder="Enter Start time" name="start_time" required class="form-control">
                    </div>


                    <div class="col-md-3">
                        <label>End Date</label>
                        <input type="date" min="{{date('Y-m-d')}}" placeholder="Enter End Date" name="end_date" required class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>End Time</label>
                        <input type="time" placeholder="Enter End time" name="end_time" required class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>Image</label>
                        <input type="file" name="image" accept="image/*" required class="form-control">
                    </div>

                    

                    <div class="col-md-3">
                        <label>Active</label>
                        <select class="form-control" name="active" required>
                            <option value="{{NULL}}">Choose</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label>Address</label>
                        <input type="text" name="address" required class="form-control">
                    </div>

                     <div class="col-md-12 mt-2">
                        <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection