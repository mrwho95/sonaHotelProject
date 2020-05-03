<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class profileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$arr['data'] = DB::table('users')->where('email', Auth::user()->email)->first();
        return view('user.profile', $arr);
    }

    public function update(Request $request, User $user)
    {
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->gender = $request->gender;
        $user->save();
        return redirect()->route('profile');
    }
}
