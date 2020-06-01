<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\customerRoomPrice;
use App\customersearch;
use Illuminate\Support\Facades\DB;

class paymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function creditCard($id){

    	$arr['roomPrice'] = customerRoomPrice::where([['user_id', Auth::id()], ['room_id', $id]])->first();
    	$arr['searchData'] = customersearch::where('user_id', Auth::id())->first();

    	return view('user.creditCard', $arr);
    }

    // public function onlineBanking(){

    // }

    // public function cash(){

    // }
}
