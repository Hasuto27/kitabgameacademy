<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\cart;
use App\Models\myprogramme;
use App\Models\checkprogpermi;
use App\Models\progress;
use App\Models\material;

class CartController extends Controller
{
    public function addtocart(Request $request){
        $dbprogramme = DB::table('programmes')->where('id',$request->idprogramme)->first();
        $idprogramme = $request->idprogramme;
        $cart = cart::firstOrCreate(
        ['user_id' => Auth::id(),'programme_id' => $idprogramme],
        ['programme_name'=>$dbprogramme->title,'programme_price'=>$dbprogramme->price,'link_gambar'=>$dbprogramme->link_gambar],
         );
        return redirect('/user/cart/mycart')->with('alert','Successful Added to Cart !');

    }

    public function viewmycart(){
         $item = cart::all()->where('user_id',Auth::id());
        return view('user.cart.mycart', ['item' => $item]);
    }

    public function destroy(Request $request,Cart $cart){
        $item = cart::all()->where('user_id',Auth::id());
        cart::destroy($request->idcart);
        return redirect ('/user/cart/mycart')->with('alert','Successful Delete Programme !');
    }

    public function checkout(Request $request,cart $cart){

        $item = cart::all()->where('user_id',Auth::id());

        if(cart::all()->where('user_id',Auth::id())->count() > 0){

            foreach ($item as $item) {
                $idprogramme = $item->programme_id;
                $programmeparts = material::all()->where('programme_id',$idprogramme);
                $index=1;

                $dbprogramme = myprogramme::firstOrCreate(
                ['user_id' => $item->user_id,'programme_id' => $item->programme_id],
                ['programme_name'=>$item->programme_name,'link_gambar'=>$item->link_gambar]);


                    $dbcheck = checkprogpermi::firstOrCreate(
                    ['user_id' => $item->user_id,$item->programme_id=>1]);

                    foreach($programmeparts as $programmepart){
                    $dbprogress = progress::firstOrCreate(
                    ['user_id' => $item->user_id,'programme_id'=>$item->programme_id,'part'=>$index]);
                    $index++;
                    }
                $progressfreshdata = DB::table('progress');
                $updateaccess = $progressfreshdata->where([
                    ['user_id',$item->user_id],
                    ['programme_id',$item->programme_id],
                    ['part',1]
                    ])->update(['access'=>1]);
                cart::destroy($item->id);
             }


            return redirect('/')->with('alert','Successful Added to My Programme !');
        }
        else{

            return redirect ('/user/cart/mycart')->with('alert','Nothing to Check Out !');
        }
    }
}
