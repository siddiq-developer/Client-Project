@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Profile / {{$user->name}}</h2>
    </div>
    @csrf    
    <div class="row">
        <div class="col-md-12">
            <h3>Personal Information</h3>
        </div>
        <div class="col-md-4"> 
            <label>Name</label>               
            <p>{{$user->name}}</p>
        </div>

        <div class="col-md-4"> 
            <label>Gender</label>               
            <p>{{$user->gender}}</p>            
        </div>

         <div class="col-md-4">                
            <label>Date of Birth</label>               
            <p>{{$user->dateofbirth}}</p>            
        </div>

        <div class="col-md-3">                
            <label>Global ID <small>Optional</small></label>               
            <p>{{$user->global_id}}</p>            
        </div>

        <div class="col-md-3">                
            <label>Email</label>               
            <p>{{$user->email}}</p>            
        </div> 

        <div class="col-md-3">                
            <label>Phone</label>               
            <p>{{$user->phone}}</p>            
        </div>        

        <div class="col-md-3">              
            <label>Image</label>               
             <img style="width: 100%;" src="{{\Storage::disk('public')->url('app/public/users/'.$user->image)}}">
        </div>
    </div>


    <hr>


    <div class="row">
        <div class="col-md-12">
            <h3>Area of Expertise</h3>
        </div>
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

        <div class="row mt-2">
                @foreach($user_interest as $e)        
                    <div class="col-md-3 m-1">
                        <span class="badge badge-pill badge-primary">{{$e->title}}</span>
                    </div>
                @endforeach    
        </div>        

    </div>

    <hr>

</div>
@endsection