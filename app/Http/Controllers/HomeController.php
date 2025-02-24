<?php
namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\User;
use App\Models\Event;
use App\Models\Blog;
use App\Models\UserExpertise;
use App\Models\UserInterest;
use Illuminate\Http\Request;
use Validator;
class HomeController extends Controller
{

    protected function register(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);

        //3 for member
        $user->assignRole(3);       
        return redirect()->route('login');
    }


    // public function home()
    // {   
    //         $total_events = Event::count();
    //         $total_members = User::count();    
    //         $latest_events = Event::orderBy('id','desc')->limit(5)->get();
    //         $blogs = Blog::orderBy('id','desc')->limit(5)->get();
    //         return view('home',compact('total_events','total_members','latest_events','blogs'));            
    // }

    public function home()
    {   
        $total_events = Event::count();
        $total_members = User::count();    
    
        $latest_events = Event::orderBy('id','desc')->limit(5)->get();
        $blogs = Blog::where('type', 'Blog')->orderBy('id', 'desc')->limit(5)->get(); // Apply where condition
    
        return view('home', compact('total_events', 'total_members', 'latest_events', 'blogs'));            
    }
    
    // public function blog()
    // {
    //     return view('blog');
    // }


public function blog()
{
    $blogs = Blog::latest()->get(); // Fetch all blogs in descending order
    return view('blog', compact('blogs')); // Pass the $blogs variable to the view
}

    
    // public function bylaws()
    // {
    //     return view('bylaws');
    // }

    public function bylaws()
{
    $blogs = Blog::latest()->get(); // Fetch blogs from the database
    return view('bylaws', compact('blogs')); // Pass to view
}
    


    public function index()
    {
         $event = Event::whereDate('start_date','>',date('Y-m-d'))->get();
        return view('user.home',compact('event'));
    }

    public function profile()
    {

        $expertise = [
                  "Technical - Community network manager",
                  "Technical - Encryption specialist",
                  "Technical - IXP manager or operator",
                  "Technical - Network analyst",
                  "Technical - Network engineer",
                  "Technical - Network security specialist",
                  "Technical - Peering and Interconnection specialist",
                  "Technical - Small local network operator",
                  "Technical - Telecom engineer",
                  "Law and Economics - Business analyst",
                  "Law and Economics - Economist",
                  "Law and Economics - Internet/Communications/Telecom lawyer",
                  "Law and Economics - Law enforcement professional",
                  "Policy and Advocacy - Internet/Communications/Telecom Policy expert",
                  "Policy and Advocacy - Policy advocacy expert",
                  "Research - Scientist/Researcher",
                  "Communications - Blogger - Writer - Journalist",
                  "Communications - Digital marketing specialist",
                  "Communications - Social media specialist",
                  "Other - Partnership/Community expert",
                  "Other - Presenter/Speaker",
                  "Other - Project Manager",
                  "Other - Trainer/Educator",
        ];


        $interest = [
              "Connecting the Unconnected",
              "Securing Global Routing",
              "Measuring the Internet",
              "Protecting the Internet from Fragmentation",
              "Extending Encryption",
              "Sharing Cutting Edge Knowledge at the NDSS Symposium",
              "Enabling Sustainable Technical Communities",
              "Fostering Sustainable Peering Infrastructure",
              "Helping Shape Legal Precedent in Alignment with Our Mission",
              "Empowering Internet Champions to Defend the Internet",
              "Securing Resources for Growth and Greater Impact",
              "Recognizing Internet Champions"
        ];

        $user_expertise = UserExpertise::where('user_id',auth()->user()->id)->get();
        $user_interest = UserInterest::where('user_id',auth()->user()->id)->get();
        return view('profile',compact('expertise','user_expertise','interest','user_interest'));
    }



    public function event_single($slug)
    {
         $event = Event::where('slug',$slug)->first();
         if(!$event){
            abort(404);
         }        
        return view('event_single',compact('event'));
    }
    
    
     public function blog_single($slug)
    {
         $blog = Blog::where('slug',$slug)->first();
         if(!$blog){
            abort(404);
         }        
        return view('blog_single',compact('blog'));
    }
    
    public function what_we_do()
    {
        return view('what_we_do');
    }
    public function by_laws()
    {
        return view('by_laws');
    }

    public function bod()
    {   
        $bod = User::where('role_status','Board of Director')->get();
        return view('bod',compact('bod'));
    }
    public function leadership()
    {
        $leaders = User::where('role_status','!=','Board of Director')->whereNotNull('role_status')->get();
        return view('leadership',compact('leaders'));
    }

    public function events(Request $request)
    {
        if($request->has('q')){
            if($request->q=='upcoming'){
                $type = 'upcoming';           
                $events = Event::whereDate('start_date','>=',date('Y-m-d'))->get();     
            }else{
                $type = 'past';                
                $events = Event::whereDate('start_date','<',date('Y-m-d'))->get();
            }
        }else{
            $events = Event::get();
            $type = 'All';
        }
            $latest_events = Event::orderBy('id','desc')->whereDate('start_date','<=',date('Y-m-d'))->limit(5)->get();
            return view('events',compact('type','events','latest_events'));            
    }

    public function search(Request $request)
    {
            $events = Blog::where('title', 'like', '%' . $request->s . '%')->get();
            $search = $request->s;
            return view('search',compact('events','search'));                    
    }

    public function contact_us()
    {
        return view('contact_us');
    }

    public function profile_update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'dateofbirth' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->user()->id],
        ]);
   
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error_message',$validator->errors());
        }


        $user = User::where('id',auth()->user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->dateofbirth = $request->dateofbirth;
        $user->global_id = $request->global_id;
        $user->phone = $request->phone;


         if ($request->hasFile('image')) {
              $image =  $request->file('image')->getClientOriginalName();
                      $request->file('image')->storeAs(
                          'users',
                          $image,
                          'public' );
            
            $user->image = $image;

        }

        $user->save();

        return redirect()->back()->with('success_message','Saved');

    }

    public function profile_password_update(Request $request)
    {

        if (!\Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->with('error_message','Old password is incorrect');
        }

        $user = User::where('id',auth()->user()->id)->first();    
        if($request->has('password') && $request->password!=NULL && $request->password!=''){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success_message','Saved');

    }

    public function profile_expertise_update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $expertiseTitles = $request->input('checkboxes');
        $existingExpertise = UserExpertise::where('user_id', auth()->user()->id)->get();

        foreach ($existingExpertise as $ue) {
            if (!in_array($ue->title, $expertiseTitles)) {
                $ue->delete();
            }
        }
        foreach($expertiseTitles as $e){
            $ue = UserExpertise::where('user_id',auth()->user()->id)->where('title',$e)->first();
            if(!$ue){
                $ue = new UserExpertise();
                $ue->user_id = auth()->user()->id;
                $ue->title = $e;
                $ue->save();
            }
        }

        return redirect()->back()->with('success_message','Saved');
    }

    public function profile_interest_update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $expertiseTitles = $request->input('checkboxes');

        $existingInterest = UserInterest::where('user_id', auth()->user()->id)->get();

        foreach ($existingInterest as $ue) {
            if (!in_array($ue->title, $expertiseTitles)) {
                $ue->delete();
            }
        }

        foreach($expertiseTitles as $e){
            $ue = UserInterest::where('user_id',auth()->user()->id)->where('title',$e)->first();
            if(!$ue){
                $ue = new UserInterest();
                $ue->user_id = auth()->user()->id;
                $ue->title = $e;
                $ue->save();
            }
        }

        return redirect()->back()->with('success_message','Saved');
    }

//     protected function sendError($message, $errors = [], $code = 400)
// {
//     return response()->json([
//         'success' => false,
//         'message' => $message,
//         'errors' => $errors
//     ], $code);
// }



}
    