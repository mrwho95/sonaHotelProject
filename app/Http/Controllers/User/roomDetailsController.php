<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\room;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class roomDetailsController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index($id, room $room)
    {

        if (Auth::check()) {
            $searchData = DB::table('customersearches')->where('user_id', Auth::id())->first();
            $arr['searchData'] = $searchData;
            $arr['user'] = User::find(Auth::id());
            $arr['room'] = room::find($id);
            return view('user.roomDetails', $arr);
        }
    	else{
            $ip=$_SERVER['REMOTE_ADDR'];
            $searchData = DB::table('device_users')->where('remoteAddress', $ip)->first();
            $arr['searchData'] = $searchData;
            $arr['room'] = room::find($id);
    	   return view('user.roomDetails', $arr);
        }

        
    }

    public function roomReserve($id, room $room)
    {

        if (!Auth::check()) {
            return view('auth.login');
        }else{

            $searchData = DB::table('customersearches')->where('user_id', Auth::id())->first();
            $arr['searchData'] = $searchData;

            $arr['room'] = room::find($id);
            return view('user.roomReserve', $arr);
        }
        
    }
}
