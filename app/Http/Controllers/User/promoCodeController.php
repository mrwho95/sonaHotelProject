<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\promocode;
use Illuminate\Support\Facades\DB;

class promoCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(promocode $promocode, Request $request){
		// $promoData = promocode::all();

		$promoCodes = promocode::pluck('code');
		$promoCodes = json_decode(json_encode($promoCodes), true);

    	if (in_array($request->input('promo_code'), $promoCodes)) {
    		

    		return redirect()->route('promo.index')->with('success', 'Enjoy our promo discount');
    	}else{

    		return redirect()->route('promo.index')->with('error', 'Unknown promo code');
    	}

    	
    }

}
