<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $score=0;
        $index=0;
        $exp =500;
        $poin =200;
        $topic="Learning";


        $quiz = DB::table('quiz')->where([
            ['course_id','=',$idprogramme],
            ['part','=',$idpart],
        ])->get();
        $soalquiz = $quiz;
        $arrayjawaban= array($request->jawaban1,$request->jawaban2,$request->jawaban3);
        foreach($quiz as $quiz){
            if($quiz->correctanswer==$arrayjawaban{$index}){$score+=1;}
           $index++;
           }
           $score *=10;

        $updatescore = db::table('progress')->where([
            ['user_id','=',Auth::user()->id],
            ['programme_id','=',$idprogramme],
            ['part','=',$idpart],
        ])->update(['quiz_score'=>$score,'done'=>1]);

        $updateaccess = db::table('progress')->where([
            ['user_id','=',Auth::user()->id],
            ['programme_id','=',$idprogramme],
            ['part','=',$idpart+1],
        ])->update(['access'=>1]);
        app('App\Http\Controllers\UserController')->plusexp();
        app('App\Http\Controllers\UserController')->pluspoin();
        $content="You just finished part ".$idpart." of ".DB::table('programmes')->where('id',$idprogramme)->value('title')." with score : ".$score." !";
        app('App\Http\Controllers\NotificationController')->sentNotification($topic,$content);
        $freshdata=Auth::user()->fresh();
        return view ('learning.quizresult',['soalquiz'=>$soalquiz,'score'=>$score,'arrayjawaban'=>$arrayjawaban,'idprogramme'=>$idprogramme,'idpart'=>$idpart,'exp'=>$exp,'poin'=>$poin,'freshdata'=>$freshdata]);
    }
}
