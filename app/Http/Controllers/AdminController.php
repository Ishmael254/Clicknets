<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approval;
use App\Models\User;
use App\Models\Clicks;
use App\Models\Reports;
use App\Models\Feedback;
use App\Models\Contacts;
use App\Models\ReplyUser;
use App\Models\Working;
use App\Models\Facebook;
use DB;
use Carbon;
use App\Mail\SendMail;
use Mail;

class AdminController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $approval =Approval::where('Status', false);
        $approval = DB::table('approvals')->where('Status', false)->paginate(15);     

        return view('admin.index')->with('approval', $approval);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function alertreportedusers($id, $ReportedUserId)
    {
        $reportingname = DB::table('users')->where('id', $id)->pluck('name');
        foreach($reportingname as $reportingname){
        $reportingname = $reportingname;
        
        }
         $reportedname = DB::table('users')->where('id', $ReportedUserId)->pluck('name');
         foreach($reportedname as $reportedname){
            $reportedname = $reportedname;
            
            }
        // $msg = Contacts::where('Status', false)->where('UserId', $userid)->get();
        return view('admin.alertreportedusers',compact('id','ReportedUserId','reportingname','reportedname'));
    }

    public function alertreportedusersform(Request $request)
    {
        $this->validate($request,[
            'message' => 'required',
            'subject' => 'required',           

        ]);
        $rpid =  $request->input('reportingid');
        $rptid =  $request->input('reporteduserid');
        $rpgname =  $request->input('reportingname');
        $repotedname =  $request->input('reportedname');
        $data1 = 'Rule Violation Reported by ' .$rpgname;


        $mail = User::where('id', $rptid)->get();

        $data = array(
                
            'name'      =>  'ClickNet Member',
            'subject'   =>  'Clicknet Violation',
            // 'email'  =>  $request->email,
            'message'   =>   'You have been reported by a ClickNet Member for violating
                                their rules.After reviewing the report, we found that you have
                                violated their rules, You have 36 hours to redo the work or 
                                your account will be suspended for 7 days.
                                Regards ClickNet Team.
            '
        );

        // $mail = $request->input('email');
        
            Mail::to($mail)->send(new SendMail($data));       

            

        $sendm = new ReplyUser;

        $sendm->Subject = $request->input('subject');
        $sendm->In_reply_to = $data1;
        $sendm->Message = $request->input('message');
        $sendm->UserId = $rptid;

        $sendm->save();

        // send message to reporting user about alerting user

        $sendm = new ReplyUser;        

        $sendm->Subject = 'Rule violation you reported ' .$repotedname;
        $sendm->In_reply_to = 'Rule violation';
        $sendm->Message = 'Hello, we have notified the user about your reported work. We have given them 32 hours to redo the work
        or they will face a suspension !' ;
        $sendm->UserId = $rpid;

        $sendm->save();

        return back()->with('success', 'message sent !');

// send reported user email
        
        
    }

    public function replyuser($id, $userid)
    {
        $name = DB::table('users')->where('id', $userid)->get();
        // $userdata = DB::table('users')->where('id', $id)->get();
        $msg = Contacts::where('Status', false)->where('UserId', $userid)->get();


        return view('admin.replyuser')->with('name', $name)->with('msg', $msg);
    }


    public function replyfeedback($id, $userid)
    {
        $name = DB::table('users')->where('id', $userid)->get();
        // $userdata = DB::table('users')->where('id', $id)->get();
        $msg = Feedback::where('Status', false)->where('UserId', $userid)->get();


        return view('admin.replyfeedback')->with('name', $name)->with('msg', $msg);
    }

    public function replyuserform(Request $request)
    {
        $this->validate($request,[
            'message' => 'required',
            'subject' => 'required',           

        ]);
        $idx =  $request->input('msgid');
        $data1 = Contacts::where('id', $idx)->value('Subject');

        $sendm = new ReplyUser;

        $sendm->Subject = $request->input('subject');
        $sendm->In_reply_to = $data1;
        $sendm->Message = $request->input('message');
        $sendm->UserId = $request->input('userid');

        $sendm->save();

        return back()->with('success', 'message sent !');

        
        
    }
    
     public function readfeedback($id)
    {
         DB::table('feedback')->where('id', $id)->update(['Status' => true]);
         
         return redirect()->back()->with('success', 'Submitted successfully!');


    }

    public function allusers()
    {
        //

        $allusers = User::orderBy('id', 'DESC')->paginate(20);
        $countusers = User::count();
        $countusersa = User::where('Approved', true)->count();
        $countusersi = User::where('Approved', false)->count();

        return view('admin.allusers')->with('allusers', $allusers)->with('countusers', $countusers)->with('countusersa', $countusersa)->with('countusersi', $countusersi);
    }

    public function inactiveusers()
    {
        //

        $allusers = User::where('Approved', false)->where('email_verified_at',  '!=', Null)->orderBy('id', 'DESC')->paginate(20);
        $countusers = User::where('Approved', false)->where('email_verified_at',  '!=', Null)->count();
        return view('admin.inactiveusers')->with('allusers', $allusers)->with('countusers', $countusers);
    }

    public function notaddedsite()
    {
         $allusers = Working::all()->pluck('UserId');

         $theusers = User::whereNotIn('id', $allusers)->select('*')->where('Approved', true)->orderBy('id', 'DESC')->paginate(20);    
         $countusers = User::whereNotIn('id', $allusers)->select('*')->where('Approved', true)->count();    

        return view('admin.notaddedsite')->with('countusers', $countusers)->with('theusers', $theusers);
    }

    public function activeusers()
    {
        //

        $allusers = User::where('Approved', true)->orderBy('id', 'DESC')->paginate(20);
        $countusers = User::where('Approved', true)->count();
        return view('admin.activeusers')->with('allusers', $allusers)->with('countusers', $countusers);
    }

    public function reportedusers()
    {
        //

        $allreports = Reports::where('Status', false)->orderBy('id', 'DESC')->paginate(20);


        $countreports = Reports::count();
       
        return view('admin.reportedusers')
        ->with('allreports', $allreports)
        ->with('countreports', $countreports);
        
    }

    public function approvalrequests()
    {
        //

        $allreports = Approval::where('Status', false)->orderBy('id', 'ASC')->paginate(20);


        $countreports = Approval::where('Status', false)->count();
       
        return view('admin.approvalrequests')
        ->with('allreports', $allreports)
        ->with('countreports', $countreports);
        
    }
    public function suspendreportedusers($id,$reportedid)
    {
        $date = Carbon\Carbon::now();
        $block = date('Y-m-d', strtotime('+7 days', strtotime($date))); 


        DB::table('users')->where('id', $reportedid);  (['banned' => true]);
        DB::table('users')->where('id', $reportedid)->update(['blocked_until' => $block]);
        DB::table('reports')->where('id', $id)->update(['Status' => true]);

        $mail = User::where('id', $reportedid)->get();

        $data = array(
                
            'name'      =>  'ClickNet Member',
            'subject'   =>  'Clicknet Report',
            // 'email'  =>  $request->email,
            'message'   =>   'You have been reported by a ClickNet Member for violating
                                their rules.After reviewing the report, we found that you have
                                violated their rules, your account will be suspended for 7 days.
                                Regards ClickNet Team.
            '
        );

        // $mail = $request->input('email');
        
            Mail::to($mail)->send(new SendMail($data));

        return back()->with('error', 'User suspended !');



    }

    public function banreportedusers($id,$reportedid)
    {
        $date = Carbon\Carbon::now();
        $block = date('Y-m-d', strtotime('+14 days', strtotime($date))); 



        DB::table('users')->where('id', $reportedid);  (['banned' => true]);
        DB::table('users')->where('id', $reportedid)->update(['blocked_until' => $block]);
        DB::table('reports')->where('id', $id)->update(['Status' => true]);

        $mail = User::where('id', $reportedid)->get();

        $data = array(
                
            'name'      =>  'ClickNet Member',
            'subject'   =>  'Clicknet Report',
            // 'email'  =>  $request->email,
            'message'   =>   'You have been reported by a ClickNet Member for violating
                                their rules.After reviewing the report, we found that you have
                                violated their rules, your account will be suspended for 14 days.
                                Regards ClickNet Team.
            '
        );

        // $mail = $request->input('email');
        
            Mail::to($mail)->send(new SendMail($data));

        

        return back()->with('error', 'User banned !');



    }

    public function ignorereportedusers($id,$reportedid)
    {
        DB::table('reports')->where('id', $id)->update(['Status' => 2]);

        return back()->with('success', 'User saved !');
    }

    public function feedbacks()
    {
        $feed = Feedback::where('Status', false)->orderBy('id', 'DESC')->paginate(20);
        return view('admin.feedbacks')->with('feed', $feed);
    }

    public function usermessages()
    {
        $feed = Contacts::where('Status', false)->orderBy('id', 'DESC')->paginate(20);
        return view('admin.messages')->with('feed', $feed);
    }
     public function readusermessages($id)
    {
       DB::table('contacts')->where('id', $id)->update(['Status' => true]);

        return back()->with('success', 'Complete !!');
    }

    public function facebookreqs()
    {
        $fb = Facebook::paginate('15');
        return view('admin.facebookreqs')->with('fb', $fb);
    }


    public function approveuser($id, $userid)
    {
        DB::table('users')->where('id', $userid)->update(['Approved' => true]);

        DB::table('approvals')->where('id', $id)->update(['Status' => true]);

        $date = Carbon\Carbon::now();
        $str2 = date('Y-m-d', strtotime('+7 days', strtotime($date))); 
      
        DB::table('users')->where('id', $userid)->update(['login_expiry' => $str2]);

        
        $names = User::all();
        $username = User::where('id', $userid)->value('name');
        $mail = User::where('id', $userid)->get();

        $data = array(
                
            'name'      =>  'ClickNet Member',
            'subject'   =>  'Clicknet Application Status',
            // 'email'  =>  $request->email,
            'message'   =>   'Congratulations, your request to join Clicknet has been approved.
           Proceed to add your site to Clicknet and make sure to read our Rules.
            Happy Time at Clicknet.
            '
        );

        // $mail = $request->input('email');
        
            Mail::to($mail)->send(new SendMail($data));

        return redirect()->back()->with('success', 'Approved successfully!, Email sent success');

        ///send user email approval

      
        
         


    }

    public function denyapproveuser($id, $userid)
    {

        DB::table('approvals')->where('id', $id)->update(['Status' => 3]);
        
                DB::table('users')->where('id', $userid)->update(['Approved' => false]);        

        $names = User::all();
        $username = User::where('id', $id)->value('name');
        $mail = User::where('id', $id)->get();

        $sendm = new ReplyUser;

        $sendm->Subject = 'Clicknet Application Status';
        $sendm->In_reply_to = 'Application Status';
        $sendm->Message = 'We are sorry to inform you that your request to join Clicknet has been declined.
        Major reasons why access is denied is because you did not follow the rules set by the admin.
        You can try again later.
        Regards Clicknet Team';
        $sendm->UserId = $userid;
        $sendm->save();

        $data = array(
                
            'name'      =>  'ClickNet Member',
            'subject'   =>  'Clicknet Application Status',
            // 'email'  =>  $request->email,
            'message'   =>   'We are sorry to inform you that your request to join Clicknet has been declined.
                            Major reasons why access is denied is not following admin rules.
                            You can try again later.
                            Regards Clicknet Team
            '
        );

        // $mail = $request->input('email');
        
            Mail::to($mail)->send(new SendMail($data));

        return redirect()->back()->with('error', 'Denied approval!');

    }

    public function adminsite()
    {

        $adminid = User::where('admin', 1)->value('id');
        $adminclick = Clicks::where('OwnerId', $adminid)->orderBy('id', 'DESC')->paginate(20);

        $adminclickcount = Clicks::where('OwnerId', $adminid)->count();
        
       
        return view('admin.adminsite')->with('adminclick', $adminclick)->with('adminclickcount', $adminclickcount);

    }


    public function sendmail()
    {
            return view('admin.sendemails');

    }

    

    public function sendmailform(Request $request)
    {
     $this->validate($request, [
        // 'name'     =>  'required',
        'subject'     =>  'required',
        // 'email'  =>  'required|email',
      'message' =>  'required'
     ]);

     $data = array(
                
        'name'      =>  'ClickNet Member',
        'subject'   =>  $request->subject,
        // 'email'  =>  $request->email,
        'message'   =>   $request->message
    );


     $option = $request->input('sendto');
     if($option == 0){
        $users = User::where('Approved', false)->where('email_verified_at', '!=', Null)->where('created_at', '>=', now()->subDays(7)->toDateTimeString())->get();
        foreach($users as $users) {
            
            Mail::to($users)->queue(new SendMail($data));         

        
         }   
        //  dd($users);
     }
     if($option == 1){
        $users = User::where('Approved', true)->get();
        foreach($users as $users) {
            Mail::to($users)->queue(new SendMail($data));
        
         }   
     }
     if($option == 2){
        $users = User::where('email_verified_at', '!=', Null)->get();
        foreach($users as $users) {
            Mail::to($users)->queue(new SendMail($data));
        
         }   
    }     
    
    // send add site emails to users who were approved in the last 7 days only
    if($option == 3){
        $mysite = Working::all()->pluck('UserId');    
        $work = User::whereNotIn('id', $mysite)->where('Approved', true)->where('created_at', '>=', now()->subDays(7)->toDateTimeString())->get(); 
        foreach($work as $data){
            $name = $data->name;
        } 
        // dd($work);  

        $data3 = array(
                        
            'name'      =>  'Clicknet Member',
            'subject'   =>  'Your website on Clicknet',
            // 'email'  =>  $request->email,
            'message'   =>   'We are happy to inform you that your request to join
            Clicknet was approved. We are waiting for you to add yur site so that you can start receiving visits and ad clicks on
            your site. Login to your accouny by clicking the button below , then click on add my site on your dashboard.
            Wishing you all the best!.',
        );

        // dd($myclickscount);   
        // $users = User::all();
        foreach($work as $users) {
            Mail::to($users)->queue(new SendMail($data3));
        
         }   
    }     

        //  $name = User::find($users->name);          
    
            // $mail = $request->input('email');                 
     
     return back()->with('success', 'Email sent completed !');

    }

    public function sendmailtouseraddsite($id)
    {
        $username = User::where('id', $id)->pluck('name');
        foreach ($username as $key => $datar) {
            # code...
            $name = $datar;
        }

            $data = array(
                        
                'name'      =>  $name,
                'subject'   =>  'Your website on Clicknet',
                // 'email'  =>  $request->email,
                'message'   =>   'We are happy to inform you that your request to join
                Clicknet was approved. We are waiting for you to add yur site so that you can start receiving visits and ad clicks on
                your site. Login to your accouny by clicking the button below , then click on add my site on your dashboard.
                Wishing you all the best!.',
            );
    

                $users = User::where('id', $id)->get();
                foreach($users as $users) {
                    Mail::to($users)->send(new SendMail($data));
                
                }   
            
       

         return back()->with('success', 'Email sent completed to ' .$name);

    }
    public function searching()
    {
        
    }

    public function adminsearchusers(Request $request)
    {

        $this->validate($request,[

            'email' => 'required',
        ]);

        $email = $request->input('email');

        $search = DB::table('users')->where('email', $email)->paginate(10);
        $searchcount = DB::table('users')->where('email', $email)->count();
        if(! $search){
            return abort(404);

        }  else{

            return view('admin.searchbar')->with('search',$search)->with('searchcount',$searchcount);

        }    
        
          

        
    }

    public function adminsearchworking(Request $request) {


        $this->validate($request,[

            'email' => 'required',
        ]);

        $email = $request->input('email');
        
        $useriuid = DB::table('users')->where('email', $email)->pluck('id');

        $search = DB::table('working')->where('UserId', $useriuid)->paginate(10);
        $searchcount = DB::table('working')->where('UserId', $useriuid)->count();
        if(! $search){
            return abort(404);

        }  else{

            return view('admin.searchworkingtable')->with('search',$search)->with('searchcount',$searchcount);

        }    
    
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
