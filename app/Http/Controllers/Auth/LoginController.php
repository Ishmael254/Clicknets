<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if(auth()->user()->Approved == false)   {

        return '/approval'; // return approval page.

        }
        if(auth()->user()->Approved == 2)   {

            return '/waiting'; // return approval page.
    
        }

        if(auth()->user()->Approved == true)   {

            if (auth()->check() && auth()->user()->login_expiry && now()->greaterThan(auth()->user()->login_expiry)) {
                $blocked_days = now()->diffInDays(auth()->user()->login_expiry); 
                $message = 'Hey, Its been '.$blocked_days.' '.Str::plural('day', $blocked_days).'. days !, Kindly Reward the admin with your visits since he is providing these services free of charge.';
                
                $userid = Auth::id();
                DB::table('users')->where('id', $userid)->update(['Approved' => false]);

                $id = Auth::id();
                 $date  = now();               
                 DB::table('users')->where('id', $id)->update(['last_login' => $date]);

                $this->redirectTo = 'application';
                return $this->redirectTo;
                
                
                // auth()->logout();   
                //  return $this->redirectTo;
                // return redirect()->route('home');

            }else{

                

                 // update last login
                 $id = Auth::id();
                 $checkadmin = DB::table('users')->where('id', $id)->pluck('Admin');

                 if($checkadmin == true){
                    $date  = now();                  
                
                    DB::table('users')->where('id', $id)->update(['last_login' => $date]);
    
                    return 'admin';

                 }else
                 {
                    $date  = now();                  
                
                    DB::table('users')->where('id', $id)->update(['last_login' => $date]);
    
                    return 'home';
                 }
               

            }

                  
                     
        }
        else
        {
            return '/approval';
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
