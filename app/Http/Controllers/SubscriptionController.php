<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Plan;
class SubscriptionController extends Controller
{
   public function buySubscription(Request $request)
   {
      $validatedData = $request->validate([
            'plan' => 'required',
            'bank' => 'required',
            'file' => 'required',
        ]);

        $plan = Plan::where('id',$request->plan)->first();

        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d',strtotime("+".$plan->duration." month"));
        $subscription = new Subscription();
        $subscription->user_id = auth()->user()->id;
        $subscription->plan_id = $request->plan;
        $subscription->price = $plan->price;
        $subscription->bank = $request->bank;
        $subscription->start_date = $start_date;
        $subscription->end_date = $end_date;


        if ($request->hasFile('file')) {
              $image =  $request->file('file')->getClientOriginalName();
                      $request->file('file')->storeAs(
                          'subscriptions',
                          $image,
                          'public' );
            
            $subscription->receipt = $image;
        }
            $subscription->save();
        return view('thankyou');
        
   }
}
