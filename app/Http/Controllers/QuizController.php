<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\survey;
use Auth;
class QuizController extends Controller
{
    public function viewquiz(Request $request,$idprogramme,$idpart){
        $quiz = DB::table('quiz')->where([
            ['course_id','=',$idprogramme],
            ['part','=',$idpart],
        ])->get();
        return view ('learning.quiz',['quiz'=>$quiz,'idprogramme'=>$idprogramme,'idpart'=>$idpart]);
    }

    public function checkquiz(Request $request,$idprogramme,$idpart){

        $score=0;   //variable untuk score
        $index=0;   //variable untuk index pencocokan jawaban
        $exp =500;  //variable exp
        $poin =200; //variable poin
        $topic="Learning";  //judul notification

        $quiz = DB::table('quiz')->where([  //mengambil data quiz part tersebut dari DB
            ['course_id','=',$idprogramme],
            ['part','=',$idpart],
        ])->get();

        $soalquiz = $quiz;  //menyimpan data quiz tadi untuk ditampilkan di halaman berikutnya (halaman quiz result)

        $arrayjawaban= array($request->jawaban1,$request->jawaban2,$request->jawaban3); //menyusun jawaban dari user menjadil array

        foreach($quiz as $quiz){    //fungsi untuk mencocokan jawaban dari DB dan jawaban dari user dan pengalian score dengan jawaban yang benar
            if($quiz->correctanswer==$arrayjawaban{$index}){$score+=1;}
           $index++;
           }
           $score *=10;

        $updatescore = db::table('progress')->where([   //update score dan bool telah menyelesaikan part ini
            ['user_id','=',Auth::user()->id],
            ['programme_id','=',$idprogramme],
            ['part','=',$idpart],
        ])->update(['quiz_score'=>$score,'done'=>1]);

        $updateaccess = db::table('progress')->where([  //update access part berikutnya
            ['user_id','=',Auth::user()->id],
            ['programme_id','=',$idprogramme],
            ['part','=',$idpart+1],
        ])->update(['access'=>1]);

        app('App\Http\Controllers\UserController')->plusexp(); //memanggil fungsi penambahan exp dari usercontroller
        app('App\Http\Controllers\UserController')->pluspoin(); //memanggil fungsi penambahan poin dari usercontroller

        $content="You just finished part ".$idpart." of ".DB::table('programmes')->where('id',$idprogramme)->value('title')." with score : ".$score." !";   //mencetak tulisan untuk dikirim ke notification
        app('App\Http\Controllers\NotificationController')->sentNotification($topic,$content);  //memanggil fungsi notification dengan argument text yang sudah kita cetak
        $freshdata=Auth::user()->fresh();   //mengambil data fresh untuk ditampilkan di view berikutnya
        return view ('learning.quizresult',['soalquiz'=>$soalquiz,'score'=>$score,'arrayjawaban'=>$arrayjawaban,'idprogramme'=>$idprogramme,'idpart'=>$idpart,'exp'=>$exp,'poin'=>$poin,'freshdata'=>$freshdata]);
    }

    public function survey(Request $request,$idprogramme,$idpart){
        return view('learning.survey',['idprogramme'=>$idprogramme,'idpart'=>$idpart]);
    }

    public function submitSurvey(Request $request,$idprogramme,$idpart){
        $exp =500;  //variable exp
        $poin =200; //variable poin
        $topic="Survey";  //judul notification

        $dbprogramme = survey::firstOrCreate(
        ['user_id' => Auth::user()->id,'programme_id' => $idprogramme,'part' => $idpart],
        ['kesanpesan'=>$request->kesanpesan]);

        $updatescore = db::table('progress')->where([   //update bool telah menyelesaikan part ini
        ['user_id','=',Auth::user()->id],
        ['programme_id','=',$idprogramme],
        ['part','=',$idpart],
          ])->update(['done'=>1]);

        $updateaccess = db::table('progress')->where([  //update access part berikutnya
            ['user_id','=',Auth::user()->id],
            ['programme_id','=',$idprogramme],
            ['part','=',$idpart+1],
        ])->update(['access'=>1]);


        app('App\Http\Controllers\UserController')->plusexp(); //memanggil fungsi penambahan exp dari usercontroller
        app('App\Http\Controllers\UserController')->pluspoin(); //memanggil fungsi penambahan poin dari usercontroller

        $content="You just finished part ".$idpart." of ".DB::table('programmes')->where('id',$idprogramme)->value('title').".";   //mencetak tulisan untuk dikirim ke notification

        app('App\Http\Controllers\NotificationController')->sentNotification($topic,$content);  //memanggil fungsi notification dengan argument text yang sudah kita cetak
        $freshdata=Auth::user()->fresh();   //mengambil data fresh untuk ditampilkan di view berikutnya
        return view('learning.surveyresult',['idprogramme'=>$idprogramme,'idpart'=>$idpart,'exp'=>$exp,'poin'=>$poin,'freshdata'=>$freshdata]);
    }
}
