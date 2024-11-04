<?php

namespace App\Http\Controllers;
use App\Models\Approval;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Storage;
use App\Models\Countries;
use App\Models\Working;
use App\Models\Clicks;
use App\Models\General;
use App\Models\Settings;
use App\Models\Contacts;
use App\Models\Reports;
use App\Models\ReplyUser;
use App\Models\Facebook;
use DB;
use Carbon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome','aboutus','privacy','toc');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        $user = User::all()->count();
        $count = DB::table('users')->count();     
        $countclicks = DB::table('all_clicks')->count();     
        $countusers = DB::table('users')->count();     
        $countworkers = DB::table('working')->count();     
        $countcountry = DB::table('countries')->count();     

        return view('welcome', compact('countclicks','countusers','countworkers','countcountry'));
    }
    
    public function aboutus()
    {
        $user = User::all()->count();
        $count = DB::table('users')->count();     
        $countclicks = DB::table('all_clicks')->count();     
        $countusers = DB::table('users')->count();     
        $countworkers = DB::table('working')->count();     
        $countcountry = DB::table('countries')->count();     

        return view('pages.about', compact('countclicks','countusers','countworkers','countcountry'));
    }
    
     public function privacy()
    {
        $user = User::all()->count();
        $count = DB::table('users')->count();     
        $countclicks = DB::table('all_clicks')->count();     
        $countusers = DB::table('users')->count();     
        $countworkers = DB::table('working')->count();     
        $countcountry = DB::table('countries')->count();     

        return view('pages.privacy', compact('countclicks','countusers','countworkers','countcountry'));
    }
    
      public function toc()
    {
        $user = User::all()->count();
        $count = DB::table('users')->count();     
        $countclicks = DB::table('all_clicks')->count();     
        $countusers = DB::table('users')->count();     
        $countworkers = DB::table('working')->count();     
        $countcountry = DB::table('countries')->count();     

        return view('pages.terms', compact('countclicks','countusers','countworkers','countcountry'));
    }

    public function allvisits()
    {
        $user = Auth()->user()->email;
        $id = Auth::id();

        $data = Clicks::where('ClickerId', $id)->paginate(25);
        $count = Clicks::where('ClickerId', $id)->count();

        return view('myvisits')->with('data', $data)->with('count', $count);
    }

      

    public function myreply(){

        $id = Auth::id();
        $data = ReplyUser::where('UserId', $id)->where('Status', false)->paginate(10);
        
        return view('myreply')->with('data',$data);

    }

    public function updatesite($id){
        $ids = Crypt::decrypt($id);

        $data = Working::where('id', $ids)->get();
        $country = Countries::all();
        
        return view('updatesite')->with('data',$data)->with('country',$country);

    }

    public function updatesiteform(Request $request){

        $this->validate($request,[
            'views' => 'required',
            'ads' => 'required',           
            'url' => 'required',           
            'rules' => 'required',           
        ]);

        $workingid =$request->input('workid');


        $post = Working::find($workingid);
        $post->PageViews =$request->input('views');
        $PageViews =$request->input('views');
        $post->Adclicks = $request->input('ads');
        $post->Website = $request->input('url');
        $post->Rules = $request->input('rules');

        
        
        $post->save();
        return redirect()->back()->with('success', 'Updated successfully!');


    }

    public function markmessage($id){

        
        DB::table('reply_users')->where('id', $id)->update(['Status' => true]);
         
        return redirect()->back()->with('success', 'Marked successfully!');
    }
    public function helppage(){

        
         return view('help');

    }


    public function index()
    {
        $id = Auth::id();
       $work11 = Working::where('UserId', '!=', auth()->id())->orderBy('id', 'DESC')->paginate(15);
        // $works = Clicks::where('ClickerId', $id)->get();
        $myclicks = Clicks::where('ClickerId', $id)->where('created_at', '>=', now()->subDays(7)->toDateTimeString())->pluck('WorkingId');
       
        $myclickscount = Working::whereNotIn('id', $myclicks)->select('*')->where('UserId', '!=', auth()->id())->orderBy('id', 'DESC')->count();    
        $work = Working::whereNotIn('id', $myclicks)->select('*')->where('UserId', '!=', auth()->id())->orderBy('id', 'DESC')->paginate(15);    
        // dd($myclickscount);     
        
        $countmee = DB::table('working')->where('UserId', $id)->count();  

        $countmessage = DB::table('reply_users')->where('UserId', $id)->where('Status', false)->count();  

        $getmessage = DB::table('reply_users')->where('UserId', $id)->where('Status', false)->get();  

        
       
                 
        $date = Carbon\Carbon::now();
        $str2 = date('Y-m-d', strtotime('-7 days', strtotime($date)));  
        
          
        if(auth()->user()->Approved == false)   {

            return view('/clickadmin')->with('countmessage', $countmessage); // return approval page.
    
            }

            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting')->with('countmessage', $countmessage); // return approval page.
        
                }
                
                if(auth()->user()->Approved == true)   {
    
                    // return view('/home')->with('work', $work); // return approval page.
                    return view('home',compact('work', 'myclicks','myclickscount', 'countmee', 'countmessage', 'getmessage'));

                }


            else{
                
                return view('/welcome');
            }
        
    }

    public function checkifclicked($id){
        $id = Crypt::decrypt($id);
        $iduser = Auth::id();      
        $date = Carbon\Carbon::now();

        $clickme = Clicks::where('ClickerId', $iduser)->where('WorkingId', $id)->orderBy('id', 'DESC')->get();
        if($clickme != Null){
                foreach($clickme as $data){

                    if ($data->Next_visit && now()->lessThan($data->Next_visit)) {
                        $blocked_days = now()->diffInDays($data->Next_visit); 

                        dd($blocked_days);
                        
                    }else{
                        return 'Hi IShi';
                    }
                    
            

                }
        }else{
            return 'Not clicked';
        }
        
        
         // Output: 1

        
        


    }

    public function clickadmin()
    {
        $id = Auth::id();
        $data = Settings::all();
        $adminrules = Settings::pluck('Admin_Rules');
        // $countmessage = DB::table('reply_users')->where('UserId', $id)->where('Status', false)->count();  
        $countmessage = DB::table('reply_users')->where('UserId', $id)->where('Status', false)->count();  

        // $getmessage = DB::table('reply_users')->where('UserId', $id)->where('Status', false)->get();  

       
            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting')->with('countmessage', $countmessage); // return approval page.
        
            }

            if(auth()->user()->Approved == 1)   {
    
                return redirect()->route('home');
        
                }

            if(auth()->user()->Approved == false)   {
    
             return view('/application')->with('countmessage', $countmessage)->with('data', $data)->with('adminrules', $adminrules); // return approval page.
            
            }

            else{
                return view('clickadmin')->with('countmessage', $countmessage)->with('data', $data)->with('adminrules', $adminrules);
            }

        
    }

    public function reportuser($id)
    {
        $id = Crypt::decrypt($id);
     
        $work = DB::table('working')->where('UserId', $id)->get();
        $ids = Auth::id();
        $clicks = DB::table('all_clicks')->where('OwnerId', $ids)->where('ClickerId', $id)->orderBy('id', 'DESC')->paginate(1);


        $countclicks = DB::table('all_clicks')->where('OwnerId', $ids)->where('ClickerId', $id)->count();
     
        $status = DB::table('all_clicks')->where('OwnerId', $ids)->where('ClickerId', $id)->value('Status');


        return view('reportuser')->with('work', $work)->with('clicks', $clicks)->with('status', $status)->with('countclicks', $countclicks);
    }

    public function reportuserform1(Request $request)
    {
      
        $this->validate($request,[
            'optiontype' => 'required',
            'image1' => 'required|max:1999',
            'image2' => 'required|max:1999',

        ]);

        
        
        if($request->hasFile('image1')){
            //get file name with ext
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename .'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image1')->storeAs('public/image', $filenameToStore);

        }
        if($request->hasFile('image2')){
            //get file name with ext
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            //filename to store
            $filenameToStore2 = $filename .'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image2')->storeAs('public/image', $filenameToStore2);

        }

     
        
        $rp = new Reports;    
        $id = Auth::id();

        $rp->ReportedUserId = $request->input('reporteduser');
        $rp->Notes = $request->input('optiontype');
        $rp->ReportingUserId = $id;
        $rp->Image1 = $filenameToStore;
        $rp->Image2 = $filenameToStore2;
        
        $rp->save();
        return back()->with('success', 'Report sent !');


    }

    public function reportuserform(Request $request){

        $this->validate($request,[
            'optiontype' => 'required',
            'image1' => 'required|image|max:1999',
            'image2' => 'required|image|max:1999',

        ]);
        
     
        if($request->hasFile('image1')){
           
            $path = 'public/image/';
            $file = $request->file('image1');
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename .'_'.time().'.'.$extension;
            
            $file->move($path, $filenameToStore);  
            $data = $filenameToStore;  

        }
        if($request->hasFile('image2')){
            
            $path = 'public/image/';
            $file = $request->file('image2');
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            //filename to store
            $filenameToStore2 = $filename .'_'.time().'.'.$extension;
            
            $file->move($path, $filenameToStore2);  
            $data = $filenameToStore2;  

        }
       
        // /save the data now
            $repo = new Reports;
            $id = Auth::user()->id;
            $repo->Notes = $request->input('optiontype');
            $repo->ReportingUserId = $id;
            $repo->ReportedUserId = $request->input('reporteduser');
            $repo->Image1 = $filenameToStore;
            $repo->Image2 = $filenameToStore2;
            
            $repo->save();
    
          
              return redirect()->back()->with('success', 'Submitted successfully!');
    

    }

    public function application()
    {
                $id = Auth::id();

        $countmessage = DB::table('reply_users')->where('UserId', $id)->where('Status', false)->count();  

        if(auth()->user()->Approved == 1)   {
    
            return redirect()->route('home');
    
            }

        if(auth()->user()->Approved == false)   {

            return view('/clickadmin')->with('countmessage', $countmessage); // return approval page.
    
            }
            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting')->with('countmessage', $countmessage); // return approval page.
        
                }
            else{
                return view('application')->with('countmessage', $countmessage);
            }
        
    }


    public function waiting()
    {
        $countmessage = DB::table('reply_users')->where('UserId', $id)->where('Status', false)->count();  

        if(auth()->user()->Approved == 1)   {
    
            return redirect()->route('home');
    
            }

        if(auth()->user()->Approved == false)   {

            return view('/clickadmin')->with('countmessage', $countmessage); // return approval page.
    
            }
            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting')->with('countmessage', $countmessage); // return approval page.
        
                }
            // else{
            //     return view('application');
            // }

        // return view('waiting');
    }

    public function submitapp(Request $request)
    {

        
        $this->validate($request,[
            'views' => 'required',
            'ads' => 'required',
            'image1' => 'required|image|max:1999',
            'image2' => 'required|image|max:1999',
            'image3' => 'image|nullable|max:1999',



        ]);

        if($request->hasFile('image1')){
            
             $path = 'public/image/';
            $file = $request->file('image1');
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename .'_'.time().'.'.$extension;
            
            $file->move($path, $filenameToStore);  
            $data = $filenameToStore;  

            
        }
        if($request->hasFile('image2')){
            
            $path = 'public/image/';
            $file = $request->file('image2');
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            //filename to store
            $filenameToStore2 = $filename .'_'.time().'.'.$extension;
            
            $file->move($path, $filenameToStore2);  
            $data = $filenameToStore2;  


        }

        if($request->hasFile('image3')){
            
             $path = 'public/image/';
            $file = $request->file('image3');
            $filenameWithExt = $request->file('image3')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image3')->getClientOriginalExtension();
            //filename to store
            $filenameToStore3 = $filename .'_'.time().'.'.$extension;
            
            $file->move($path, $filenameToStore3);  
            $data = $filenameToStore3;  


        }

       
        
        $approval = new Approval;    
        $id = Auth::id();

        $approval->UserId = Auth::id();
        $approval->Views = $request->input('views');
        $approval->Ads = $request->input('ads');
        $approval->Image1 = $filenameToStore;
        $approval->Image2 = $filenameToStore2;

        $approval->save();
        DB::table('users')->where('id', $id)->update(['Approved' => '2']);
        


        return view('/waiting')->with('success', 'Submitted successfully!');

        
    }

    public function view($id){



       $id = Crypt::decrypt($id);

      

        $work = DB::table('working')->where('UserId', $id)->get();
        $ids = Auth::id();
        $clicks = DB::table('all_clicks')->where('OwnerId', $ids)->where('ClickerId', $id)->orderBy('id', 'DESC')->paginate(1);


        $countclicks = DB::table('all_clicks')->where('OwnerId', $ids)->where('ClickerId', $id)->count();
        // $remaining_articles = DB::table('an_pages')->where('status',1)->limit(30)->offset(30)->orderBy('id', 'DESC')->get();

        $remainingtime1 = DB::table('all_clicks')->where('OwnerId', $ids)->where('ClickerId', $id)->value('Expiry_date');

        $date = Carbon\Carbon::now();
       
        $remainingtime = round((strtotime($remainingtime1) - strtotime($date))/3600, 1);

        // $remainingtime = ($remainingtime1 - $date)/60/60/24;


        // check if status is approved
        $status = DB::table('all_clicks')->where('OwnerId', $ids)->where('ClickerId', $id)->value('Status');
        $myid = Auth::id();
        $countmee2 = DB::table('working')->where('UserId', $myid)->count();  



        return view('view')->with('work', $work)->with('clicks', $clicks)->with('remainingtime', $remainingtime)->with('status', $status)->with('countclicks', $countclicks)->with('countmee2', $countmee2);
    }


    public function addmysite(){ 
        
        
        
        $country = Countries::all();

        $id = Auth::id();
        $work = DB::table('working')->where('UserId', $id)->get();   

        // $count = DB::table('category_issue')->count();
        $count = DB::table('working')->where('UserId', $id)->count();  

        // return view('addmysite',compact('country', 'count', 'work'));

        // return view('addmysite')->with('country', $country)->with('count', $count);


        if(auth()->user()->Approved == false)   {

            return view('/clickadmin'); // return approval page.
    
            }

            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting'); // return approval page.
        
                }
                
                if(auth()->user()->Approved == true)   {
    
                    return view('addmysite',compact('country', 'count', 'work'));
                    // return redirect()->route('home');

                }


            else{
                
                return view('/welcome');
            }
    }

    public function submitmysite(Request $request){        
          
        $this->validate($request,[

            'views' => 'required',
            'ads' => 'required',
            'url' => 'required',
            'country' => 'required',
            'days' => 'required',
            'rules' => 'required',
            


        ]);

           
        $site = new Working;    
        $id = Auth::id();

        $owneridname = DB::table('users')->where('id', $id)->value('name');     


        $site->UserId = Auth::id();
        $site->Membername = $owneridname;
        $site->Website = $request->input('url');
        $site->Rules = $request->input('rules');
        $site->PageViews = $request->input('views');
        $site->Adclicks = $request->input('ads');
        // $site->OwnerId = $request->input('ownerid');
       
        
        $site->save();

        return redirect()->back()->with('success', 'Submitted successfully!');

    }

    public function feedbacks()
    {
        $user = Auth()->user()->email;
        $username = Auth()->user()->name;

        return view('feedback')->with('user', $user)->with('username', $username);
    }

    public function contact()
    {
        $user = Auth()->user()->email;
        $username = Auth()->user()->name;

        return view('contact')->with('user', $user)->with('username', $username);
    }

    public function userfeedbackpost(Request $request)
    {
        $this->validate($request,[

            'subject' => 'required',
            'message' => 'required',
            
        ]);
        $id = Auth()->user()->id;
        $user = Auth()->user()->email;
        $username = Auth()->user()->name;

        $feedb = new Feedback;
        $feedb->UserId =   $id ;
        $feedb->Name =   $username ;
        $feedb->Email =   $user ;  
        $feedb->Subject =   $request->input('subject') ;
        $feedb->Message =  $request->input('message') ;

        $feedb->save();      



        return redirect()->back()->with('success', 'Submitted successfully!');
    }

    public function facebook()
    {
        $user = Auth()->user()->email;
        $username = Auth()->user()->name;

        return view('facebook')->with('user', $user)->with('username', $username);
    }

    public function contactuspost(Request $request)
    {
        $this->validate($request,[

            'subject' => 'required',
            'message' => 'required',
            
        ]);
        $id = Auth()->user()->id;
        $user = Auth()->user()->email;
        $username = Auth()->user()->name;

        $feedb = new Contacts;
        $feedb->UserId =   $id ;
        $feedb->Name =   $username ;
        $feedb->Email =   $user ;  
        $feedb->Subject =   $request->input('subject') ;
        $feedb->Message =  $request->input('message') ;

        $feedb->save();      



        return redirect()->back()->with('success', 'Submitted successfully!');
    }

    public function facebookpost(Request $request)
    {
        $this->validate($request,[

            'budget' => 'required',
            'details' => 'required',
            
        ]);
        $id = Auth()->user()->id;
        $user = Auth()->user()->email;
        $username = Auth()->user()->name;

        $feedb = new Facebook;
        $feedb->UserId =   $id ;
        $feedb->Name =   $username ;
        $feedb->Email =   $user ;  
        $feedb->Budget =   $request->input('budget') ;
        $feedb->Details =  $request->input('details') ;

        $feedb->save();      



        return redirect()->back()->with('success', 'Submitted successfully!');
    }



// submit your clicks
    public function submitwork(Request $request){
            
        $this->validate($request,[
            'views' => 'required',
            'ads' => 'required',
            'image1' => 'required|image|max:1999',
            'image2' => 'required|image|max:1999',
            'image3' => 'image|nullable|max:1999',

        ]);
        

        if($request->hasFile('image1')){
            
            //get file name with ext
              $path = 'public/image/';
            $file = $request->file('image1');
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            //filename to store
            $name = $filename .'_'.time().'.'.$extension;
            
            $file->move($path, $name);  
            $data = $name;  

        }
        if($request->hasFile('image2')){
            //get file name with ext
            
            $path = 'public/image/';
            $file = $request->file('image2');
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            //filename to store
            $name2 = $filename .'_'.time().'.'.$extension;
            
            $file->move($path, $name2);  
            $data = $name2;  

        }

        
      

      
            // if not returning work

            $id = Auth::id();

            $owneridy = $request->input('ownerid');
            $owneridname = DB::table('users')->where('id', $owneridy)->value('name');     
    
            $clickername = DB::table('users')->where('id', $id)->value('name');      
    
            $date = Carbon\Carbon::now();
            $str2 = date('Y-m-d', strtotime('+2 days', strtotime($date))); 
            $nxtvisit = date('Y-m-d', strtotime('+7 days', strtotime($date))); 
            
            $approval = new Clicks;    
    
            $approval->ClickerId = Auth::id();
            $approval->ClickerName = $clickername;
            $approval->Views = $request->input('views');
    
            $date = Carbon\Carbon::now();
            $str2 = date('Y-m-d', strtotime('+3 days', strtotime($date))); 
           
            $approval->Expiry_date = $str2;
    
            $approval->Ads = $request->input('ads');
            $approval->OwnerId = $request->input('ownerid');
            $approval->WorkingId = $request->input('workingid');
            $approval->Return_to = Null;
            $approval->Returned = false;
            $approval->Next_visit = $nxtvisit;
            $approval->OwnerName = $owneridname;
            $approval->Image1 = $name;
            $approval->Image2 = $name2;
            $approval->Image3 = $name2;
            
            $approval->save();
    
            $gv = new General;    
            $date = Carbon\Carbon::now();
            $str2 = date('Y-m-d', strtotime('+7 days', strtotime($date))); 
            $gv->ClickerId = Auth::id();
            $gv->NextClickDate = $nxtvisit;  
            $gv->OwnerId = $request->input('ownerid');
            $gv->WorkingId = $request->input('workingid');
            $gv->save();    
     
        
        return redirect()->back()->with('success', 'Submitted successfully!');
    }


    public function newsletter(Request $request){
            
        $this->validate($request,[
            'email' => 'required',           

        ]);
        
         
            $nl = new Newsletter;    
           
            $nl->Email = $request->input('email');
            $nl->save();    
     
        
        return redirect()->back()->with('success', 'Submitted successfully!');
    }

    public function contactform(Request $request){
            
        $this->validate($request,[
            'name' => 'required',           
            'email' => 'required',           
            'subject' => 'required',           
            'message' => 'required',           

        ]);
        
         
            $cu = new ContactForm;    
           
            $cu->Name = $request->input('email');
            $cu->Email = $request->input('email');
            $cu->Subject = $request->input('email');
            $cu->Message = $request->input('email');
            $cu->save();    
     
        
        return redirect()->back()->with('success', 'Submitted successfully!');
    }

///code below not working use next code
    public function submitworkreturn(Request $request){

        $this->validate($request,[
            'views' => 'required',
            'ads' => 'required',
            'image1' => 'required|image|max:1999',
            'image2' => 'required|image|max:1999',
            'image3' => 'image|nullable|max:1999',



        ]);
        
     
        if($request->hasFile('image1')){
            //get file name with ext
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename .'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image1')->storeAs('public/image', $filenameToStore);

        }
        if($request->hasFile('image2')){
            //get file name with ext
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            //filename to store
            $filenameToStore2 = $filename .'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image2')->storeAs('public/image', $filenameToStore2);

        }

       

            $valuid =  $request->input('valueid');    

            DB::table('all_clicks')->where('id', $valueid)->update(['Returned' => true]);
            
            $id = Auth::id();

            $owneridy = $request->input('ownerid');
            $owneridname = DB::table('users')->where('id', $owneridy)->value('name');     
    
            $clickername = DB::table('users')->where('id', $id)->value('name');        
           
            $approval = new Clicks;        
            $approval->ClickerId = Auth::id();
            $approval->ClickerName = $clickername;
            $approval->Views = $request->input('views');    
            $date = Carbon\Carbon::now();
            $str2 = date('Y-m-d', strtotime('+2 days', strtotime($date))); 
           
            $approval->Expiry_date = $str2;
    
            $approval->Ads = $request->input('ads');
            $approval->OwnerId = $request->input('ownerid');
            $approval->Return_to = $request->input('valueid');
            $approval->WorkingId = $request->input('workingid');

            $approval->Returned = '2';
            $approval->OwnerName = $owneridname;
            $approval->Image1 = $filenameToStore;
            $approval->Image2 = $filenameToStore2;
            $approval->Image3 = $fileNameToStore2;
            
            $approval->save();
    
            $gv = new General;    
            $date = Carbon\Carbon::now();
            $str2 = date('Y-m-d', strtotime('+7 days', strtotime($date))); 
            $gv->ClickerId = Auth::id();
            $gv->NextClickDate = $str2;
            $gv->OwnerId = $request->input('ownerid');
            $gv->WorkingId = $request->input('workingid');
            $gv->save();

            // $valueid =  $request->input('valueid');    
            //   DB::table('all_clicks')->where('id', $valueid)->update(['Returned' => true]);

              return redirect()->back()->with('success', 'Submitted successfully!');
    

    }

    public function submitworkreturnagain(Request $request)
    {

        $this->validate($request,[
            'views' => 'required',
            'ads' => 'required',
            'image1' => 'required|image|max:1999',
            'image2' => 'required|image|max:1999',
            'image3' => 'image|nullable|max:1999',

        ]);
        

        if($request->hasFile('image1')){
            
             //get file name with ext
            $path = 'public/image/';
            $file = $request->file('image1');
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            //filename to store
            $name = $filename .'_'.time().'.'.$extension;
            
            $file->move($path, $name);  
            $data = $name;  

        }
        if($request->hasFile('image2')){
            
             //get file name with ext
            $path = 'public/image/';
            $file = $request->file('image2');
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            //filename to store
            $name2 = $filename .'_'.time().'.'.$extension;
            
            $file->move($path, $name2);  
            $data = $name2;  

        }

        

        $valuid = $request->input('valueid');

        if($request->optiontype == '1'){
            $id = Auth::id();

            $owneridy = $request->input('ownerid');
            $owneridname = DB::table('users')->where('id', $owneridy)->value('name');     
    
            $clickername = DB::table('users')->where('id', $id)->value('name');      
    
           
            
            $approval = new Clicks;    
    
            $approval->ClickerId = Auth::id();
            $approval->ClickerName = $clickername;
            $approval->Views = $request->input('views');
    
            $date = Carbon\Carbon::now();
            $str2 = date('Y-m-d', strtotime('+3 days', strtotime($date))); 
            $nxtvisit = date('Y-m-d', strtotime('+7 days', strtotime($date))); 
            
            
            $approval->Expiry_date = $str2;
    
            $approval->Ads = $request->input('ads');
            $approval->OwnerId = $request->input('ownerid');

            $approval->Return_to = Null;
            $approval->WorkingId = false;
            $approval->Returned = false;
            $approval->Next_visit = $nxtvisit;
            $approval->OwnerName = $owneridname;
            $approval->Image1 = $name;
            $approval->Image2 = $name2;
            $approval->Image3 = $name2;
            
            $approval->save();
    
            $gv = new General;    
            $date = Carbon\Carbon::now();
            $str2 = date('Y-m-d', strtotime('+7 days', strtotime($date))); 
            $gv->ClickerId = Auth::id();
            $gv->NextClickDate = $str2;
            $gv->OwnerId = $request->input('ownerid');
            $gv->WorkingId = false;

            $gv->save();    

            return redirect()->back()->with('success', 'Submitted successfully!');

     
        }elseif($request->optiontype == '2'){

            $valueid =  $request->input('valueid');    

            $checkifreturned = DB::table('all_clicks')->where('id', $valueid)->value('Returned');   
            if($checkifreturned == 0)  {

                
            $valueid =  $request->input('valueid');    

            DB::table('all_clicks')->where('id', $valueid)->update(['Returned' => true]);
            
            $id = Auth::id();

            $owneridy = $request->input('ownerid');
            $owneridname = DB::table('users')->where('id', $owneridy)->value('name');     
    
            $clickername = DB::table('users')->where('id', $id)->value('name');        
           
            $approval = new Clicks;        
            $approval->ClickerId = Auth::id();
            $approval->ClickerName = $clickername;
            $approval->Views = $request->input('views');    
            $date = Carbon\Carbon::now();
            $str2 = date('Y-m-d', strtotime('+2 days', strtotime($date))); 

            $nxtvisit = date('Y-m-d', strtotime('+7 days', strtotime($date))); 

          
            $approval->Expiry_date = $str2;
    
            $approval->Ads = $request->input('ads');
            $approval->OwnerId = $request->input('ownerid');
            $approval->Return_to = $request->input('valueid');
            $approval-> WorkingId = $request->input('workingid');
            $approval->Returned = '2';
            $approval->Next_visit = $nxtvisit;
            $approval->OwnerName = $owneridname;
            $approval->Image1 = $name;
            $approval->Image2 = $name2;
            $approval->Image3 = $name2;
            
            $approval->save();
    
            $gv = new General;    
            $date = Carbon\Carbon::now();
            $str2 = date('Y-m-d', strtotime('+7 days', strtotime($date))); 
            $gv->ClickerId = Auth::id();
            $gv->NextClickDate = $str2;
            $gv->OwnerId = $request->input('ownerid');
            $gv->WorkingId = $request->input('workingid');
            $gv->save();

            $valueid =  $request->input('valueid');    
              DB::table('all_clicks')->where('id', $valueid)->update(['Returned' => true]);

              return redirect()->back()->with('success', 'Submitted successfully!');
            }else{
                return redirect()->back()->with('error', 'Work already done before!');

            }

        }else{
            return 'Error';
        }

        

    }


    public function userapprove($id)
    {


        $ids = Auth::id();
        $int = $id;
        
        // $order = Orders::all();
        DB::table('all_clicks')->where('id', $id)->update(['Status' => true]);
        // DB::table('orders')->where('Batch', $id)->update(['Status' => 'Paid']);

        // return view('admin.pending')->with('order', $order);
        return redirect()->back()->with('success', 'Work marked as complete');

    }

    public function checkifworkisavailable()
    {
        $id = Auth::id();
        // $count = DB::table('category_issue')->count();
        $count = DB::table('working')->where('UserId', $id)->count();            


        
        return redirect()->back()->with('success', 'Work marked as complete');

    }


    public function rules()
    {
        if(auth()->user()->Approved == 1)   {
    
            return view('rules');
    
            }

        if(auth()->user()->Approved == false)   {

            return view('/clickadmin'); // return approval page.
    
            }
            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting'); // return approval page.
        
            }

    }
    public function mywork()
    {
        $id = Auth::id();

        $work = DB::table('all_clicks')->where('OwnerId', $id)->orderBy('id', 'DESC')->paginate(15);

        $count = DB::table('all_clicks')->where('OwnerId', $id)->count();  
        
        if(auth()->user()->Approved == 1)   {
    
            return view('mine')->with('work', $work)->with('count', $count);
    
            }

        if(auth()->user()->Approved == false)   {

            return view('/clickadmin'); // return approval page.
    
            }
            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting'); // return approval page.
        
            }
  
       

    }

    public function myworkcount()
    {
        $id = Auth::id();

        $work = DB::table('all_clicks')->where('OwnerId', $id)->get();    

        $count = DB::table('all_clicks')->where('OwnerId', $id)->count();            
  
        return view('layouts.myapp')->with('count', $count);

    }

    public function completework()
    {
        $id = Auth::id();

        $work = DB::table('all_clicks')->where('ClickerId', $id)->where('Status', true)->orderBy('id', 'DESC')->paginate(15);    

        $count = DB::table('all_clicks')->where('ClickerId', $id)->where('Status', true)->count();            
  

        if(auth()->user()->Approved == 1)   {
    
            return view('completework')->with('work', $work)->with('count', $count);
    
            }

        if(auth()->user()->Approved == false)   {

            return view('/clickadmin'); // return approval page.
    
            }
            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting'); // return approval page.
        
            }

    }
  
    public function pendingwork()
    {
        $id = Auth::id();

        $work = DB::table('all_clicks')->where('OwnerId', $id)->where('Returned', 0)->orderBy('id', 'DESC')->paginate(15);    
        // $work = Clicks::all();
        $count = DB::table('all_clicks')->where('OwnerId', $id)->where('Returned', 0)->count();            
  
        if(auth()->user()->Approved == 1)   {
    
            return view('pendingwork')->with('work', $work)->with('count', $count);
    
            }

        if(auth()->user()->Approved == false)   {

            return view('/clickadmin'); // return approval page.
    
            }
            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting'); // return approval page.
        
            }

    }

    public function reports()
    {
        // $id = Auth::id();        

       $report = Settings::all(); 

 
        if(auth()->user()->Approved == 1)   {
    
            return view('report')->with('report', $report);
    
            }

        if(auth()->user()->Approved == false)   {

            return view('/clickadmin'); // return approval page.
    
            }
            if(auth()->user()->Approved == 2)   {
    
                return view('/waiting'); // return approval page.
        
            }

    }

    public function viewmywork($id){

        $clicks = Clicks::find($id);    
        // $ids = Auth::id();
        // $clicks = DB::table('all_clicks')->where('OwnerId', $ids)->get();   
      

        return view('viework')->with('clicks', $clicks);
    }

    public function usersearch(Request $request)
    {

        $this->validate($request,[

            'email' => 'required',
        ]);

        $email = $request->input('email');
        $searching = DB::table('users')->where('name', $email)->count();      
        if($searching >= 1){
            $searchingnow = DB::table('users')->where('name', $email)->pluck('id');
            
            $search = DB::table('working')->where('UserId', $searchingnow)->get();
            $searchcount = DB::table('working')->where('UserId', $searchingnow)->count();



             return view('usersearchbar')->with('search',$search)->with('searchcount',$searchcount);

        }  else{

            return back()->with('error', 'Nothing matches your search,try another name !');

        }    
        
        
    }


}
