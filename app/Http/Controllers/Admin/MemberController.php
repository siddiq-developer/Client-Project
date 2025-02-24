<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use App\Models\UserExpertise;
use App\Models\UserInterest;
use Validator;
class MemberController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::whereHas('roles', function ($query) {
            $query->where('name', 'Member');
        })->get();
        return view('admin.members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

       $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
   
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error_message',$validator->errors());
        }
             
        $data=$request->input();
        $user=User::create($data);
        $user->assignRole(3);                

        return redirect()->route('members.index')->with('success_message','User Created');

        }catch(\Exception $e){

            return redirect()->back()->withInput()->with('error_message',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user_expertise = UserExpertise::where('user_id',$user->id)->get();
        $user_interest = UserInterest::where('user_id',$user->id)->get();        
        return view('admin.members.show',compact('user_expertise','user_interest','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $user = $user->where('id',$id)->first();
        return view('admin.members.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,$id)
    {
    
   try{
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);
   
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error_message',$validator->errors());
        }

        $user = $user->where('id',$id)->first();             
        $data=$request->input();

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password!='' && $request->password!=NULL){
            $user->password = bcrypt($request->password);
        }

            $user->save();
        return redirect()->route('members.index')->with('success_message','User Updated');

        }catch(\Exception $e){
            
            return redirect()->back()->withInput()->with('error_message',$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user,$id)
    {
        try{
        $user = $user->where('id',$id)->delete();

        return redirect()->route('members.index')->with('success_message','User Deleted');

        }catch(\Exception $e){
            return redirect()->back()->withInput()->with('error_message',$e->getMessage());
        }
    }

    public function bod(User $user)
    {
        return view('admin.members.bod',compact('user'));
    }

    public function setBOD(Request $request)
    {
        $user = User::find($request->user_id);
        $user->role_status = $request->role_status;
        $user->bod_description = $request->note;
        $user->save();
        return redirect()->route('members.index')->with('success_message','Member set as BOD');
    }

    public function removebod(User $user)
    {
        $user->role_status = NULL;
        $user->save();
        return redirect()->route('members.index')->with('success_message','Member removed as BOD');
    }

}   
