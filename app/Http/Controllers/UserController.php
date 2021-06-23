<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    //fungsi untuk menampilkan data user yg dimana merupakan student
    public function index()
    {
        $users = user::all()->where('authorization','student');
        return view('user.index', ['users' => $users]);
    }


     //penjumlahan exp user
    public function plusexp()
    {
        $exp=500;
        $sum = Auth::user()->currentexp + $exp;
        user::where('id', Auth::user()->id)
        ->update([
            'currentexp' =>$sum,
        ]);
        $freshdata = Auth::user()->fresh();
        if($freshdata->currentexp >= 1000){
            return $this->levelup();
        }
    }

    //fungsi untuk level up
    public function levelup(){
        $freshdata = Auth::user()->fresh();
        $sisaexp = $freshdata->currentexp - 1000;
        $newlevel= $freshdata->level +1;
        user::where('id', $freshdata->id)
            ->update([
                'level' =>$newlevel,
                'currentexp' => $sisaexp,
            ]);

    }

    //fungsi penambahan poin ration user
        public function pluspoin()
    {
        $poin=200;
        $sum = Auth::user()->militaryration + $poin;
        user::where('id', Auth::user()->id)
        ->update([
            'militaryration' =>$sum,
        ]);

        return redirect ('/test');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
