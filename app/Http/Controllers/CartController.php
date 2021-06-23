<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Cart;
use App\Models\myprogramme;
use App\Models\checkprogpermi;
use App\Models\progress;
use App\Models\material;

class CartController extends Controller
{
    public function addtocart(Request $request){
        $dbprogramme = DB::table('programmes')->where('id',$request->idprogramme)->first();
        $idprogramme = $request->idprogramme;
        $cart = Cart::firstOrCreate(
        ['user_id' => Auth::id(),'programme_id' => $idprogramme],
        ['programme_name'=>$dbprogramme->title,'programme_price'=>$dbprogramme->price,'link_gambar'=>$dbprogramme->link_gambar],
         );
        return redirect('/user/cart/mycart')->with('alert','Successful Added to Cart !');

    }

    public function viewmycart(){
         $item = Cart::all()->where('user_id',Auth::id());
        return view('user.cart.mycart', ['item' => $item]);
    }

    public function destroy(Request $request,Cart $cart){
        $item = Cart::all()->where('user_id',Auth::id());
        cart::destroy($request->idcart);
        return redirect ('/user/cart/mycart')->with('alert','Successful Delete Programme !');
    }

    public function checkout(Request $request,Cart $cart){

        $item = Cart::all()->where('user_id',Auth::id());

        if(Cart::all()->where('user_id',Auth::id())->count() > 0){

            foreach ($item as $item) {
                $idprogramme = $item->programme_id;
                $programmepart = material::all()->where('programme_id',$idprogramme);

                $dbprogramme = myprogramme::firstOrCreate(
                ['user_id' => $item->user_id,'programme_id' => $item->programme_id],
                ['programme_name'=>$item->programme_name,'link_gambar'=>$item->link_gambar]);

                $dbcheck = checkprogpermi::firstOrCreate(
                ['user_id' => $item->user_id],
                ['game_technology_beginner'=>1]);

                foreach($programmepart as $key=>$value){
                    $dbprogress = progress::firstOrCreate(
                    ['user_id' => $item->user_id,'programme_id'=>$item->programme_id,'part'=>$key+=1]);
                }
                $progressfreshdata = DB::table('progress');
                $updateaccess = $progressfreshdata->where([
                    ['user_id',$item->user_id],
                    ['programme_id',$item->programme_id],
                    ['part',1]
                    ])->update(['access'=>1]);
                Cart::destroy($item->id);
             }


            return redirect('/')->with('alert','Successful Added to My Programme !');
        }
        else{

            return redirect ('/user/cart/mycart')->with('alert','Nothing to Check Out !');
        }
    }
}
