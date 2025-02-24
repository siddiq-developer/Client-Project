<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\EventMemberEC;
use Validator;
use App\Models\EventInvitation;
use App\Mail\EventMail;
use App\Models\EventVote;
use App\Models\EventCandidate;
use Mail;
class EventController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::get();
        return view('admin.events.index',compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
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
            'title' => ['required'],
            'description' => ['required'],
            'start_date' => ['required'],
            'start_time' => ['required'],            
            'end_date' => ['required'],
            'end_time' => ['required'],
            'active' => ['required'],
        ]);
   
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error_message',$validator->errors());
        }            

        $data=$request->input();
        $event=new Event();
        $event->title = $request->title;
        $event->slug = \Str::slug($request->title);
        $event->description= $request->description;
        $event->start_date= $request->start_date;
        $event->start_time= $request->start_time;
        $event->end_date= $request->end_date;
        $event->end_time= $request->end_time;
        $event->status= $request->active;
        $event->address= $request->address;
         if ($request->hasFile('image')) {
              $image =  $request->file('image')->getClientOriginalName();
                      $request->file('image')->storeAs(
                          'events',
                          $image,
                          'public' );
            
            $event->image = $image;
            $event->save();
        }


        return redirect()->route('event.index')->with('success_message','Event Created');

        }catch(\Exception $e){
            return redirect()->back()->withInput()->with('error_message',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event,$id)
    {
        $event = $event->where('id',$id)->first();
        return view('admin.events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event,$id)
    {
        
        try{

        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'start_date' => ['required'],
            'start_time' => ['required'],            
            'end_date' => ['required'],
            'end_time' => ['required'],
            'active' => ['required'],
        ]);
   
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error_message',$validator->errors());
        }            

        $data=$request->input();
        $event=Event::where('id',$id)->first();

        $event->title = $request->title;
        $event->slug = \Str::slug($request->title);
        $event->description= $request->description;
        $event->start_date= $request->start_date;
        $event->start_time= $request->start_time;
        $event->end_date= $request->end_date;
        $event->end_time= $request->end_time;
        $event->status= $request->active;
        $event->address= $request->address;
         if ($request->hasFile('image')) {
              $image =  $request->file('image')->getClientOriginalName();
                      $request->file('image')->storeAs(
                          'events',
                          $image,
                          'public' );
            
            $event->image = $image;

        }
            $event->save();

        return redirect()->route('event.index')->with('success_message','Event Created');

        }catch(\Exception $e){
            return redirect()->back()->withInput()->with('error_message',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function delete(Event $event,$id)
    {
        try{
        $event = $event->where('id',$id)->delete();

        return redirect()->route('event.index')->with('success_message','Event Deleted');

        }catch(\Exception $e){
            return redirect()->back()->withInput()->with('error_message',$e->getMessage());
        }
    }

    public function attendance ($id)
    {
        $event = Event::where('id',$id)->first();
        if(strtotime(date('Y-m-d'))<=strtotime($event->start_date)){
          if(strtotime(date('H:i:s'))<=strtotime($event->start_time)){
            return redirect()->back()->with('success_message','Event has not been started');
          }    
        }
        $invite = EventInvitation::where('event_id',$id)->where('status','1')->get();
        return view('admin.events.attendance',compact('event','invite'));

    }

     public function invite ($id)
    {
        $event = Event::where('id',$id)->first();
        $members = User::whereHas('roles', function ($query) {
            $query->where('name', 'Member');
        })->get();

        $invite = EventInvitation::where('event_id',$id)->get();
        return view('admin.events.invite',compact('event','members','invite'));

    }

     public function candidates ($id)
    {
        $event = Event::where('id',$id)->first();
        $members = User::whereHas('roles', function ($query) {
            $query->where('name', 'Member');
        })->get();

        $candidateRoles = EventCandidate::where('event_id',$id)->get();
        return view('admin.events.candidates',compact('event','members','candidateRoles'));

    }

    public function invite_members(Request $request)
    {
        foreach($request->members as $m){
            $check = EventInvitation::where('member_id',$m)->where('event_id',$request->event_id)->whereStatus('0')->first();
            if(!$check){

             $co = new EventInvitation();
                $co->member_id = $m;
                $co->token = \Str::random(32);     
                $co->event_id  = $request->event_id;  
                $co->status    = '0';
                $co->attendance    = '0';
                $co->save();
                $user = User::where('id',$m)->first();
                $event = Event::where('id',$request->event_id)->first();
                $data = [
                    'user' => $user,                
                    'event' => $event,
                    'token' => $co->token,
                ];
            
            $mail = Mail::to($user->email)->send(new EventMail($data));

            }


        }
        return redirect()->route('event.index')->with('success_message','Event Invitation Sent');

    }

    public function set_candidates(Request $request)
    {

        if($request->op){
         foreach($request->op as $m){
              $check = EventCandidate::where('member_id',$m)->where('event_id',$request->event_id)->where('status','Officers President')->first();
              if(!$check){
                  $co = new EventCandidate();
                  $co->member_id = $m;
                  $co->token = \Str::random(32);     
                  $co->event_id  = $request->event_id;  
                  $co->status    = 'Officers President';
                  $co->save();
              }
          }
        }
        if($request->vp){
          foreach($request->vp as $m){
              $check = EventCandidate::where('member_id',$m)->where('event_id',$request->event_id)->where('status','Vice President')->first();
              if(!$check){
                  $co = new EventCandidate();
                  $co->member_id = $m;
                  $co->token = \Str::random(32);     
                  $co->event_id  = $request->event_id;  
                  $co->status    = 'Vice President';
                  $co->save();
              }
          }
        }

        if($request->gst){
          foreach($request->gst as $m){
              $check = EventCandidate::where('member_id',$m)->where('event_id',$request->event_id)->where('status','General Secretary Treasurer')->first();
              if(!$check){
                  $co = new EventCandidate();
                  $co->member_id = $m;
                  $co->token = \Str::random(32);     
                  $co->event_id  = $request->event_id;  
                  $co->status    = 'General Secretary Treasurer';
                  $co->save();
              }
          }
        }

        if($request->bod){
          foreach($request->bod as $m){
              $check = EventCandidate::where('member_id',$m)->where('event_id',$request->event_id)->where('status','Board of Director')->first();
              if(!$check){
                  $co = new EventCandidate();
                  $co->member_id = $m;
                  $co->token = \Str::random(32);     
                  $co->event_id  = $request->event_id;  
                  $co->status    = 'Board of Director';
                  $co->save();
              }
          }
        }
          return redirect()->back()->with('success_message','Event Candidates Set Successfully');

    }

    public function markattendance($id)
    {
        $check = EventInvitation::where('id',$id)->first();
        $check->attendance = 1;
        $check->save();

        return redirect()->back()->with('success_message','Event Attendanace Marked');        
    }   

    public function voting($id)
    {
        $event = Event::where('id',$id)->first();
        $members = User::whereHas('roles', function ($query) {
            $query->where('name', 'Member');
        })->with('ec_d', function ($query) use ($id){
            $query->where('event_id', $id);
        })->get();

        $ec = EventInvitation::where('event_id',$id)->get();

        return view('admin.events.vote',compact('event','members','ec'));    
    }  

    public function event_member_ec($id,$event_id,$status)
    {

        if($status =='ec'){
          $status = 'Election Commision';
        }

        if($status =='op'){
          $status = 'Officers President';
        }

        if($status =='vp'){
          $status = 'Vice President';
        }

        if($status =='gst'){
          $status = 'General Secretary Treasurer';
        }

        if($status =='bod'){
          $status = 'Board of Director';
        }


        $new = new EventMemberEC();
        $new->user_id = $id;
        $new->event_id = $event_id;
        $new->status = $status;
        $new->save();

        $candidate = EventCandidate::where('event_id',$event_id)->where('status',$status)->where('member_id',$id)->first();
        $candidate->result = 1;
        $candidate->save();

        return redirect()->back()->with('success_message','Set as '.$status);        
    }

    public function remove_event_member_ec($id,$event_id)
    {
        $new = EventMemberEC::where('user_id',$id)->where('event_id',$event_id)->first();
        $status = $new->status;
        $new->delete();
        return redirect()->back()->with('error_message','Removed as '.$status);        
    }

    public function event_details($id)
    {
        $event = Event::where('id',$id)->get();
        $attendance = EventInvitation::where('event_id',$id)->get();
        $ec = EventMemberEC::where('event_id',$id)->with('vote_d', function ($query) use ($id){
            $query->where('event_id', $id);
        })->get();
        return view('admin.events.details',compact('event','attendance','ec'));
    }

    public function voting_result($id)
    {
        $event = Event::where('id',$id)->get();
        $ec = EventMemberEC::where('event_id',$id)->with('vote_d', function ($query) use ($id){
            $query->where('event_id', $id);
        })->get();

        $roles = EventCandidate::where('event_id',$id)->groupBy('status')->get()->pluck('status')->toArray();

        $all_candidates = EventCandidate::where('event_id',$id)->get();        

        return view('admin.events.voting_result',compact('event','ec','roles','all_candidates'));
    }

    public function change_voting_status($id,$status)
    {
        $new = Event::find($id);
        $new->voting_status = $status;
        $new->save();

        return redirect()->back()->with('success_message','Updated');        
    }

    public function calender()
    {
        $events = Event::all();
        $javascriptEvents = $events->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => date('Y-m-d',strtotime($event->start_date)), // Assuming start_date is a DateTime instance
                'end' => date('Y-m-d',strtotime($event->end_date)), // Assuming end_date is a DateTime instance
            ];
        });
        return view('admin.events.calender',compact('javascriptEvents'));        
    }
    
}
