<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    //
    public function viewcheckout(Request $request){
        $programme = DB::table('programme')->where('id','1')->first();
        return view ('payment.checkout', ['programme' => $programme]);//kembalikan view checkout, dengan memberikan data $programme sebagai variable programme
    }

    public function hitungdiskon(Request $request, User $user){
            $programme = DB::table('programme')->where('id','1')->first();
    switch ($request->pilihandiskon) {
	case '1':
        $totalprice=$programme->price;
        return view('payment.payment', ['totalprice' => $totalprice]);
		break;

    case '2':
        $diskon= $programme->price * 10 /100;
        $totalprice=$programme->price - $diskon;
        return view('payment.payment', ['totalprice' => $totalprice]);
		break;

    case '3':
        $diskon= $programme->price * 24 /100;
        $totalprice=$programme->price - $diskon;
        return view('payment.payment', ['totalprice' => $totalprice]);
		break;

    case '4':
        $diskon= $programme->price * 37 /100;
        $totalprice=$programme->price - $diskon;
        return view('payment.payment', ['totalprice' => $totalprice]);
		break;

    case '5':
        $diskon= $programme->price * 41 /100;
        $totalprice=$programme->price - $diskon;
        return view('payment.payment', ['totalprice' => $totalprice]);
		break;

    case '6':
        $diskon= $programme->price * 50 /100;
        $totalprice=$programme->price - $diskon;
        return view('payment.payment', ['totalprice' => $totalprice]);
		break;

	default:
		# code...
		break;
}

    }
}
