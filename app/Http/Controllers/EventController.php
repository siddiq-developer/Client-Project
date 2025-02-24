<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventMemberEC;
use App\Models\EventVote;
use App\Models\EventInvitation;
use App\Models\EventCandidate;
use Illuminate\Http\Request;

class EventController extends Controller
{
	public function event_index()
    {
        $my_events = EventInvitation::where('member_id',\Auth::user()->id)->where('status','1')->pluck('event_id')->toArray();
        $event = Event::whereIn('id',$my_events)->get();
        return view('user.events.index',compact('event'));
    }

    public function event_voting($id)
    {
    	$event = Event::where('id',$id)->first();
        $ec = EventMemberEC::where('event_id',$id)->get();
        $ev = EventVote::where('event_id',$id)->where('user_id',auth()->user()->id)->get();
        $evop = EventVote::where('event_id',$id)->where('user_id',auth()->user()->id)->where('vote_for','Officers President')->first();
        $evvp = EventVote::where('event_id',$id)->where('user_id',auth()->user()->id)->where('vote_for','Vice President')->first();
        $evgst = EventVote::where('event_id',$id)->where('user_id',auth()->user()->id)->where('vote_for','General Secretary Treasurer')->first();
        $evbod = EventVote::where('event_id',$id)->where('user_id',auth()->user()->id)->where('vote_for','Board of Director')->first();
        $opcandidates = EventCandidate::where('event_id',$id)->where('status','Officers President')->get();
        $vpcandidates = EventCandidate::where('event_id',$id)->where('status','Vice President')->get();
        $gstcandidates = EventCandidate::where('event_id',$id)->where('status','General Secretary Treasurer')->get();
        $bodcandidates = EventCandidate::where('event_id',$id)->where('status','Board of Director')->get();
    
        return view('user.events.vote',compact('ev','event','ec','opcandidates','vpcandidates','gstcandidates','bodcandidates','evop','evvp','evgst','evbod'));
    }

    public function post_event_voting(Request $request)
    {

        $opcandidates = EventCandidate::where('event_id',$request->event_id)->where('member_id',$request->selectedop)->where('status','Officers President')->first();
        $vpcandidates = EventCandidate::where('event_id',$request->event_id)->where('member_id',$request->selectedvp)->where('status','Vice President')->first();
        $gstcandidates = EventCandidate::where('event_id',$request->event_id)->where('member_id',$request->selectedgst)->where('status','General Secretary Treasurer')->first();
        $bodcandidates = EventCandidate::where('event_id',$request->event_id)->where('member_id',$request->selectedbod)->where('status','Board of Director')->first();

        if($opcandidates){
            $opcandidates->total_votes = $opcandidates->total_votes + 1;
                    $opcandidates->save();            
        }

        if($vpcandidates){
            $vpcandidates->total_votes = $vpcandidates->total_votes + 1;
                    $vpcandidates->save();            
        }

        if($gstcandidates){
            $gstcandidates->total_votes = $gstcandidates->total_votes + 1;
                    $gstcandidates->save();            
        }

        if($bodcandidates){
            $bodcandidates->total_votes = $bodcandidates->total_votes + 1;
                    $bodcandidates->save();            
        }

        if($request->selectedop!=0){
            $vote = new EventVote();
            $vote->user_id = auth()->user()->id;
            $vote->ec_id = $request->selectedop;
            $vote->vote_for = 'Officers President';
            $vote->event_id = $request->event_id;
            $vote->save();
        }

    if($request->selectedvp!=0){
        $vote = new EventVote();
        $vote->user_id = auth()->user()->id;
        $vote->ec_id = $request->selectedvp;
        $vote->vote_for = 'Vice President';
        $vote->event_id = $request->event_id;
        $vote->save();
    }
    
    if($request->selectedgst!=0){
        $vote = new EventVote();
        $vote->user_id = auth()->user()->id;
        $vote->ec_id = $request->selectedgst;
        $vote->vote_for = 'General Secretary Treasurer';
        $vote->event_id = $request->event_id;
        $vote->save();
    }
    if($request->selectedbod!=0){
        $vote = new EventVote();
        $vote->user_id = auth()->user()->id;
        $vote->ec_id = $request->selectedbod;
        $vote->vote_for = 'Board of Director';
        $vote->event_id = $request->event_id;
        $vote->save();
    }
    	return redirect()->back()->with('success_message','Success');
    }

}
