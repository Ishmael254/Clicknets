<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use Carbon;

use Illuminate\Http\Request;

class CronController extends Controller
{

    public function checkuserlastlogin(){

    // $nowdate = Carbon\Carbon::now();
    // $maxdays = 

    // $allusers = User::where('last_login');

    // $date = Carbon::createFromFormat('Y.m.d', $user->premiumDate);
    // $daysToAdd = 30;
    // $date = $date->addDays($daysToAdd);
    // dd($date);

    // DB::DELETE FROM 'users' WHERE 'lastlogin' < CURDATE() - INTERVAL 31 DAY
    DB::delete("DELETE FROM 'users' WHERE 'last_login' < CURDATE() - INTERVAL 30 DAY");




    }


}
