<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Plan;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.plans.subscription', compact('subscriptions'));
    }

    public function approve($id)
    {
        $subscription = Subscription::where('id',$id)->first();
        $plan = Plan::where('id',$subscription->plan_id)->first();
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d',strtotime("+".$plan->duration." month"));

        $subscription->update(['status' => '1','start_date'=>$start_date,'end_date'=>$end_date]);

        return redirect()->back()
            ->with('success', 'Subscription approved successfully.');
    }

    public function reject($id)
    {

        $subscription = Subscription::where('id',$id)->first();

        $subscription->update(['status' => '-1']);

        return redirect()->back()
            ->with('success', 'Subscription rejected successfully.');
    }
}
