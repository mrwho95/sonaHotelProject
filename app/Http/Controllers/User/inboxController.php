<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class inboxController extends Controller
{
	public function index(){
		return view('user.inbox');
	}
}
