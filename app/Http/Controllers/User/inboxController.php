<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\customerorder;
use App\room;
use Auth;

class inboxController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
		$arr['orderData'] = customerorder::where('user_id', Auth::id())->get();
		$arr['roomData'] = room::all();
		return view('user.inbox', $arr);
	}
}
