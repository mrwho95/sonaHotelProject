<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\contactcustomer; //model name

class contactCustomerController extends Controller
{   
/**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['message'] = contactcustomer::all(); //model name
        return view('user.test', $arr);
    }

    // public function details($id)
    // {
    //     $abc = User::find($id);
    //     echo $abc->name; //db parameter
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {   
        //redirect or view create data page {view file location}
        //example prepare an add button to redirect add page / blade.
        //At that moment, the page/blade will perform store function in order to save data into db.
        // return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, contactcustomer $contactcustomer)
    {
        // echo $request->message;
        //$request is from frontend <input name="email">
        //$contactcustomer is a model, so behind of it will be the db table parameter name. Save it and redirect to specific pages
        $contactcustomer->name = $request->name;
        $contactcustomer->email = $request->email;
        $contactcustomer->message = $request->message;
        $contactcustomer->save();
        return redirect()->route('contactcustomer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(contactcustomer $contactcustomer)
    {
        // echo $contactcustomer->id;
        $arr['data'] = $contactcustomer;
        return view('user.testEdit', $arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactcustomer $contactcustomer)
    {
        $contactcustomer->name = $request->editName;
        $contactcustomer->email = $request->editEmail;
        $contactcustomer->message = $request->editMessage;
        $contactcustomer->save();
        return redirect()->route('contactcustomer.index');
        // echo "string";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        contactcustomer::destroy($id);
        return redirect()->route('contactcustomer.index');
    }
}
