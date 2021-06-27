<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\material;
use App\Models\programme;
use App\Models\myprogramme;
use App\Models\progress;
use Auth;
use Illuminate\Database\Eloquent\Collection;

class LearnPageController extends Controller
{
    //Bagian untuk menampilkan halaman Learn pada tiap programme, dan menampilkan seluruh bagian materi nya dari programme tersebut.
    //dan juga mengirimkan data progress user terhadap programme tersebut
    public function viewLearn(Request $request,$idprogramme,$idpart){
        $programme = material::all()->where('programme_id',$idprogramme);
        $progress = db::table('progress')->where([
            ['user_id','=',Auth::user()->id],
            ['programme_id','=',$idprogramme],
        ])->get();
        $material = $programme->where('part',$idpart)->first();
        $rowmaterial = $progress->where('part',$idpart)->first();
        return view('learning.learn',['material'=>$material,'programme'=>$programme,'progress'=>$progress,'rowmaterial'=>$rowmaterial,'idpart'=>$idpart,'idprogramme'=>$idprogramme]);
    }

    //Menampilkan halaman utama dari myprogramme yang menampilkan keseluruhan programme yang telah di ambil
    public function viewHome(){
        $dbmyprogramme = myprogramme::all()->where('user_id',Auth::id());
        return view('learning.home',['myprogramme'=>$dbmyprogramme,]);
    }
}
