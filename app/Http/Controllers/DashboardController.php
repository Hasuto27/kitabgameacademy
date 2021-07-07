<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\myprogramme;

class DashboardController extends Controller
{
    public function viewdashboard(){
        if(Auth::guest()){
            return view('home');
        }
        else{
            $dbmyprogramme = DB::table('myprogrammes')->where('user_id',Auth::user()->id)->get();
            $countmyprogramme = myprogramme::all()->where('user_id',Auth::user()->id)->count();
            $programme = DB::table('programmes')->get();
            $dbprogress=DB::table('progress')->where('user_id',Auth::user()->id)->get();
            $dbprogramme = DB::table('programmes')->get();
            $dbschedule = DB::table('schedules')->where('user_id',Auth::user()->id)->get();
            $countschedule = $dbschedule->count();
            return view ('user.dashboard.studentdashboard',['dbmyprogramme'=>$dbmyprogramme,'dbprogress'=>$dbprogress,'countmyprogramme'=>$countmyprogramme,'programme'=>$programme,'dbprogramme'=>$dbprogramme,'dbschedule'=>$dbschedule,'countschedule'=>$countschedule]);
        }
    }
}
