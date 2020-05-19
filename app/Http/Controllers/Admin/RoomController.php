<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\room;
use App\roomcharge;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addDataIndex(){
        return view('admin.addRoom');
    }

    public function index()
    {
        $arr['data'] = room::all();
        return view('admin.home', $arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, room $room, roomCharge $roomcharge)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required', 
            'size' => 'required',
            'bed' => 'required',
            'capacity' => 'required',
            'service' => 'required', 
            'description' => 'required',
            'photo_1' => 'required',
            'photo_2' => 'required',
            'photo_3' => 'required'
        ]);

        $room->name = $request->name;
        $room->price = $request->price;
        $room->size = $request->size;
        $room->bed = $request->bed;
        $room->capacity = $request->capacity;
        // $room->photo = $request->photo;
        $room->service = $request->service;
        $room->description = $request->description;
        if ($request->hasfile('photo_1')) {
            $file = $request->file('photo_1');
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/roomPhoto/', $filename);
            $room->photo_1 = $filename;
        }
        if($request->hasfile('photo_2')){
            $file = $request->file('photo_2');
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/roomPhoto/', $filename);
            $room->photo_2 = $filename;
        }
        if($request->hasfile('photo_3')){
            $file = $request->file('photo_3');
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/roomPhoto/', $filename);
            $room->photo_3 = $filename;
        }
        $room->save();

        $serviceTaxRate = 0.06;
        $serviceChargeRate = 0.10;
        $price = floatval($request->price);

        $serviceChargeAmount = bcmul($price, $serviceChargeRate, 2);
        $temp_1 = bcadd($price, $serviceChargeAmount, 2);

        $serviceTaxAmount = bcmul($temp_1, $serviceTaxRate, 2);
        $totalAmount = bcadd($temp_1, $serviceTaxAmount, 2);

        $roomId = DB::table('rooms')->where('name', $request->name)->value('id');

        DB::table('roomcharges')->insert(
            ['room_id' => $roomId, 'price' => $price, 'service_charge_rate' => $serviceChargeRate, 'service_charge' => $serviceChargeAmount, 'service_tax_rate' => $serviceTaxRate, 'service_tax' => $serviceTaxAmount, 'total_amount'=> $totalAmount, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
        );
        return redirect()->route('adminEditRoom.index')->with('success', "New ".$room->name." data is added");
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
    public function edit($id, room $room)
    {
        //
        $arr['data'] = room::find($id);
        return view('admin.roomEdit', $arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, room $room, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required', 
            'size' => 'required',
            'bed' => 'required',
            'capacity' => 'required',
            'service' => 'required', 
            'description' => 'required',
            // 'photo' => 'required'
        ]);

        $room = room::find($id);

        $room->name = $request->name;
        $room->price = $request->price;
        $room->size = $request->size;
        $room->bed = $request->bed;
        $room->capacity = $request->capacity;
        $room->service = $request->service;
        $room->description = $request->description;
        if ($request->hasfile('photo_1')) {
            $file = $request->file('photo_1');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/roomPhoto/', $filename);
            $room->photo_1 = $filename;
        }
        if($request->hasfile('photo_2')){
            $file = $request->file('photo_2');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/roomPhoto/', $filename);
            $room->photo_2 = $filename;
        }
        if($request->hasfile('photo_3')){
            $file = $request->file('photo_3');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/roomPhoto/', $filename);
            $room->photo_3 = $filename;
        }

        $room->save();

        $serviceTaxRate = 0.06;
        $serviceChargeRate = 0.10;
        $price = floatval($request->price);
        $serviceChargeAmount = bcmul($price, $serviceChargeRate, 2);
        $temp_1 = bcadd($price, $serviceChargeAmount, 2);

        $serviceTaxAmount = bcmul($temp_1, $serviceTaxRate, 2);
        $totalAmount = bcadd($temp_1, $serviceTaxAmount, 2);

        DB::table('roomcharges')->updateOrInsert(
            ['room_id' => $id],
            ['price' => $price, 'service_charge_rate' => $serviceChargeRate, 'service_charge' => $serviceChargeAmount, 'service_tax_rate' => $serviceTaxRate, 'service_tax' => $serviceTaxAmount, 'room_id'=> $id, 'total_amount'=> $totalAmount, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
        );

        return redirect()->route('adminEditRoom.index')->with('success',"Edit ".$room->name." data successful");
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
        room::destroy($id);
        return redirect()->route('adminEditRoom.index');
    }
}
