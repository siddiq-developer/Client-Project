<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Mail;
use App\Mail\ContactMail;
class ContactUsController extends Controller
{
     public function contact_us(Request $request)
    {   
        $contact_us = ContactUs::orderBy('id','desc');

         if($request->has('type')){

            if($request->type=='unread'){
                $contact_us = $contact_us->where('is_read', '0')->orWhereNull('is_read');            
            }
            if($request->type=='read'){
                $contact_us = $contact_us->where('is_read', '1');                              
            }

        }        

        if($request->has('search') && $request->has('search')!='' && $request->has('search')!=true){
            $contact_us = $contact_us->where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('phone', 'like', '%' . $request->search . '%');            
        }   

       

        $contact_us = $contact_us->paginate(30);
        return view('admin.contact.index',compact('contact_us'));    
    }

    public function contact_us_delete(Request $request)
    {
        $list = explode(',', $request->delete_list);
        foreach($list as $l){
            $lt = ContactUs::where('id',$l)->delete();
        }

        return redirect()->back();

    }


    public function contacts_reply($id)
    {
         $contact = ContactUs::where('id',$id)->first();
         return view('admin.contact.contact_reply',compact('contact'));    
    }

    public function contacts_reply_save(Request $request)
    {
        //dd($request->reply);
         $contact = ContactUs::where('id',$request->id)->first();
         $contact->admin_reply = $request->reply;
         $contact->is_read = 1;
         $contact->save();
         $data = [
            'title' => 'Reply from My Company',
            'subject' => 'Reply',
            'body' => $request->reply
        ];
        $mail = Mail::to($contact->email)->send(new ContactMail($data));
        return redirect()->back();
    }

    public function contacts_block($id)
    {
         $contact = ContactUs::where('id',$id)->first();
         $new = new ContactBlockList();
         $new->name = $contact->name;
         $new->email = $contact->email;
         $new->phone = $contact->phone;
         $new->save();
         return redirect()->back();   
    }

    public function contact_us_readALL(Request $request)
    {
        $list = explode(',', $request->read_list);
        foreach($list as $l){
            $lt = ContactUs::where('id',$l)->first();
            $lt->is_read = 1;
            $lt->save();
        }

        return redirect()->back();

    }

    public function contact_us_mark_all()
    {
        $list = ContactUs::where('is_read', '0')->orWhereNull('is_read')->get();
        foreach($list as $lt){
            $lt = ContactUs::where('id',$lt->id)->first();
            $lt->is_read = 1;
            $lt->save();
        }

        return redirect()->back();

    }
   
}
