<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Event;
use App\Models\Subscription;
use App\Models\ContactUs;
class AdminController extends Controller
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


    public function index()
    {

        $members = User::whereHas('roles', function ($query) {
            $query->where('name', 'Member');
        })->count();

        $events = Event::count();

        $active_voting = Event::where('voting_status','1')->count();
        $todays_event = Event::whereDate('start_date',date('Y-m-d'))->count();
        return view('admin.home',compact('members','events','active_voting','todays_event'));
    }

}
