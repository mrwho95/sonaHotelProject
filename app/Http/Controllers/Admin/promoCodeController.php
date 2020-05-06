<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\promocode;

class promoCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('admin.promo');
    }

    public function store(Request $request, promocode $promocode){
    	$this->validate($request, [
            'name' => 'required',
            'code' => 'required', 
            'discount' => 'required',
            'availability' => 'required',
            'expired' => 'required',
        ]);

        $promocode->name = $request->name;
        $promocode->code = $request->code;
        $promocode->discount = $request->discount;
        $promocode->expired = $request->expired;
        $promocode->availability = $request->availability;
        $promocode->save();
        return redirect()->route('promotion')->with('success', 'Promotion Added');
    }
}
