<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\room;

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
    public function store(Request $request, room $room)
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
        return redirect()->route('adminEditRoom.index');
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
        return redirect()->route('adminEditRoom.index');
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
