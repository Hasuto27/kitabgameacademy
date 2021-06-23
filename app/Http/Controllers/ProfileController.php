<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\myprogramme;
use Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //

    public function viewmyprofile(){
        return view('/user/profile/myprofile');
    }

    public function viewmyprogramme(Request $request){
    $dbmyprogramme = myprogramme::all()->where('user_id',Auth::id());
        return view('/user/profile/myprogramme',['myprogramme'=>$dbmyprogramme,]);
    }
}
