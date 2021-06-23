<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckAccessProgramme
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$accessprogramme)
    {
        $dbcheck = DB::table('checkprogpermis')->where('user_id',$request->user()->id)->value('game_technology_beginner');
        if(in_array($dbcheck,$accessprogramme)){
            return $next($request);
        }
        return redirect('/')->with('alert','You dont have this programme yet !');

    }
}
