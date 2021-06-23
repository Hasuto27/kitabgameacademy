<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function viewnotification(Request $request){
        $notification = DB::table('notifications')->where('user_id',Auth::id())->get();
        return view('/user/notification',['notification'=>$notification]);
    }

    public function sentNotification($topic, $content){
        $createnotif = Notification::create([
            'user_id'=>Auth::user()->id,
            'topic'=>$topic,
            'content'=>$content,
            ]);
    }

    public function deleteNotification(Request $request,Notification $notification){
        Notification::destroy($request->idnotif);
        return redirect ('/notification')->with('alert','Successful Delete Notification !');
    }
}
