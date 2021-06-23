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
            $dbmyprogramme = myprogramme::all()->where('user_id',Auth::user()->id)->count();
            $programme = DB::table('programmes')->where('id',1)->first();
            $jumlahpart = DB::table('progress')->where([
                ['user_id',Auth::user()->id],
                ['programme_id',1],
                ])->count();
            $progress = DB::table('progress')->where([
                ['user_id',Auth::user()->id],
                ['programme_id',1],
                ['done',1]
                ])->count();

           return view ('user.dashboard.studentdashboard',['dbmyprogramme'=>$dbmyprogramme,'progress'=>$progress,'jumlahpart'=>$jumlahpart,'programme'=>$programme]);
        }
    }
}
