<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class CheckQuizFinalize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$accessquiz)
    {
        $dbcheck = DB::table('progress')->where([
            ['user_id',auth::user()->id],
            ['programme_id',$request->idprogramme],
            ['part',$request->idpart]
            ])->value('done');
        if(in_array($dbcheck,$accessquiz)){
            return $next($request);
        }
        return redirect('/')->with('alert','You Already Done the Quiz !');

    }
}
