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
    	$arr['data'] = User::find(Auth::id());
        return view('user.profile', $arr);
    }

    public function update(Request $request, User $user)
    {   
        $user = User::find(Auth::id());
    	$user->name = $request->name;
        $user->phonenumber = $request->phonenumber;
        $user->gender = $request->gender;
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/userPhoto/', $filename);
            $user->userphoto = $filename;
        }
        $user->save();
        return redirect()->route('profile')->with('success', "Customer's Profile edited successful.");
    }
}
