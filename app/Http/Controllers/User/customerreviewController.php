<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\customerReview;
use App\User;
use Auth;

class customerreviewController extends Controller
{
    //

    public function index(customerReview $customerReview, User $user)
    {
    	$array['userData'] = User::find(Auth::id()); 

        $array['reviewData'] = DB::table('customer_reviews')->orderBy('created_at', 'desc')->paginate(3);
        $user = User::all();
        $array['user'] = json_decode(json_encode($user), true);
        // print_r($user);
        $room = DB::table('rooms')->get();
        $array['room'] = $room;
        return view('user.review', $array);
    }

    public function store(Request $request, customerReview $customerReview){
    	$customerReview->name = $request->user_name;
    	$customerReview->user_id = Auth::id();
    	$customerReview->email = $request->user_email;
    	$customerReview->room_name = $request->room_name;
    	$customerReview->rating = $request->rating;
    	$customerReview->message = $request->reviewMessage;
    	$customerReview->save();

    	return redirect()->route('review')->with('success', "Thank you for your review and time. We will review it and satisfy our precious customer's requirement.");

    }
}
