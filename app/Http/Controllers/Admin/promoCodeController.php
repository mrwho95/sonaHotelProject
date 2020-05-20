<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\promocode;
use Carbon\Carbon;
use DataTables;

class promoCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if($request->ajax())
        {
            $data = promocode::all();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-warning btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
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
        $promocode->expired = Carbon::parse($request->input('expired'));
        $promocode->availability = $request->availability;
        $promocode->save();
        return redirect()->route('promotion')->with('success', 'Promotion Added');
    }
}
