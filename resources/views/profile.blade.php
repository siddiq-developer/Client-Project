@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Profile</h2>
    </div>
    <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
    @csrf    
    <div class="row">
        <div class="col-md-12">
            <h3>Personal Information</h3>
        </div>
        <div class="col-md-4"> 
            <label>Name</label>               
            <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required>
        </div>

        <div class="col-md-4"> 
            <label>Gender</label>               
            <select class="form-control" required name="gender">
                <option value="Male" <?php if(Auth::user()->gender=='Male') echo 'selected="selected"'; ?>>Male</option>    
                <option value="Female" <?php if(Auth::user()->gender=='Female') echo 'selected="selected"'; ?>>Female</option>    
            </select>
        </div>

         <div class="col-md-4">                
            <label>Date of Birth</label>               
            <input type="date" max="{{date('Y-m-d')}}" name="dateofbirth" value="{{Auth::user()->dateofbirth}}" class="form-control" required>
        </div>

        <div class="col-md-3">                
            <label>Global ID <small>Optional</small></label>               
            <input type="text" name="global_id" value="{{Auth::user()->global_id}}" class="form-control">
        </div>

        <div class="col-md-3">                
            <label>Email</label>               
            <input type="email" readonly name="email" value="{{Auth::user()->email}}" class="form-control" required>
        </div> 

        <div class="col-md-3">                
            <label>Phone</label>               
            <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" required>
        </div>        

        <div class="col-md-3">              
            <label>Image</label>               
            <input type="file" class="form-control" accept="image/*" name="image">              
        </div>

         <div class="col-md-6 mt-2">              
            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-xs">     
        </div>        


    </div>

    </form>
    <hr>


    <div class="row">
        <div class="col-md-12">
            <h3>Area of Expertise</h3>
        </div>
        <div class="col-md-12"> 
            <a href="javaScript:void(0)" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#areaOfExpertise">Edit</a>
        </div>       

        <!-- Modal -->
                @include('modals.expertise')
        <div class="row mt-2">
                @foreach($user_expertise as $e)        
                    <div class="col-md-3 m-1">
                        <span class="badge badge-pill badge-primary">{{$e->title}}</span>
                    </div>
                @endforeach    
        </div>        

    </div>


    <hr>

    <div class="row">
        <div class="col-md-12">
            <h3>Projects of Interest</h3>
        </div>
        <div class="col-md-12"> 
            <a href="javaScript:void(0)" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#areaOfInterest">Edit</a>
        </div>       

        <!-- Modal -->
                @include('modals.projects_of_interests')
        <div class="row mt-2">
                @foreach($user_interest as $e)        
                    <div class="col-md-3 m-1">
                        <span class="badge badge-pill badge-primary">{{$e->title}}</span>
                    </div>
                @endforeach    
        </div>        

    </div>

    <hr>

    <form method="post" action="{{route('profile.password.update')}}" enctype="multipart/form-data">
    @csrf    
    <div class="row">
        <div class="col-md-12">
            <h3>Account Security</h3>
        </div>
        <div class="col-md-6">              
            <label>Old Password</label>               
            <input type="text" onfocus="this.type='password'" name="old_password" required class="form-control">              
        </div>

        <div class="col-md-6">              
            <label>New Password (Leave empty if not changed)</label>               
            <input type="text" onfocus="this.type='password'" type="password" name="password" class="form-control">              
        </div>          

         <div class="col-md-6 mt-2">              
            <input type="submit" value="Submit"  name="submit" class="btn btn-primary btn-xs">              
        </div>        
    </div>

    </form>
</div>
@endsection