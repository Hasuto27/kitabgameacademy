<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckAccessPart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$accesspart)
    {
        $dbcheck = DB::table('progress')->where([
            ['user_id',$request->user()->id],
            ['programme_id',$request->idprogramme],
            ['part',$request->idpart]
            ])->value('access');
        if(in_array($dbcheck,$accesspart)){
            return $next($request);
        }
        return redirect('/')->with('alert','You Dont have the access to it');
    }
}
