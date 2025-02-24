<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Bank;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\ContactUs;
use App\Models\EventInvitation;
class FrontendController extends Controller
{
    public function contact_us(Request $request)
    {
        return view('user.contact_us');
    }

    public function sendContactUs(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required'
        ]);


         $co = new ContactUs();
            $co->name = $request->name;    
            $co->email  = $request->email;  
            $co->subject    = $request->subject;
            $co->message  = $request->message;
            $co->save();

            $data = [
                'subject' => 'Thanks for connecting with us',                
                'title' => 'Reply from My Company',
                'body' => 'Dear '.$request->name.' <br>Thanks for contacting My Company. Our team will reply soon. <br> If you doesnot get a reply from us. Please call on the following number +923205038329.<br>Thanks',
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'subject' => $request->subject,
            ];
        
        $mail = Mail::to($request->email)->send(new ContactMail($data));

        return back()->with('success', 'Thanks for contacting us!');
    }

    public function confirm_event ($token)
    {
        $check = EventInvitation::where('token',$token)->first();
        if($check){
            $check->status = '1';
            $check->save();

            return view('event_thanks');
        }else{
            abort(404);
        }
    }

}
