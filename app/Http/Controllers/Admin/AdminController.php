<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Event;
use App\Models\Subscription;
use App\Models\ContactUs;

use App\Models\Member;  // Assuming you have a 'Member' model
use Carbon\Carbon;


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
         $active_voting = Event::where('voting_status', '1')->count();
         $todays_event = Event::whereDate('start_date', date('Y-m-d'))->count();
     
         $userData = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
             ->where('created_at', '>=', Carbon::now()->subMonths(6))
             ->groupBy('month')
             ->pluck('count', 'month');
     
         $months = [];
         $counts = [];
     
         for ($i = 5; $i >= 0; $i--) {
             $month = Carbon::now()->subMonths($i)->format('F');
             $months[] = $month;
             $monthNumber = Carbon::now()->subMonths($i)->month;
             $counts[] = $userData[$monthNumber] ?? 0;
         }
     
       
     
         return view('admin.home', compact('members', 'events', 'active_voting', 'todays_event', 'months', 'counts'));
     }
     

}
