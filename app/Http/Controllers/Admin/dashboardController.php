<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\room;
use App\Charts\RoomChart;
use App\customerorder;


class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$customerOrder = customerorder::all();
        $customerOrder = json_decode(json_encode($customerOrder), true);

        $data = DB::table('customerorders')->pluck('room_id')->all();
        $data = array_count_values($data);

    	$roomDataset = room::all();
    	$roomDataset = json_decode(json_encode($roomDataset), true);

        $array = array(
            'roomName' => '',
            'data' => 0
        );
    	foreach ($roomDataset as $key => $value) {

    		$array['roomName'] = $value['name'];
            $dataset[$value['id']] = $array;

            foreach ($data as $key2 => $value2) {
                if ($value['id'] == $key2) {
                    $dataset[$value['id']]['data'] = $value2;
                }
                continue;
            }
    	}

        foreach ($dataset as $key => $value) {
            $xAxis[] = $value['roomName'];
            $yAxis[] = $value['data'];
        }
        
    	$chart = new RoomChart;
    	$chart->labels($xAxis);
    	$chart->dataset('Room Booking', 'bar', $yAxis)->backgroundColor('#ffb3ff');
    	// $chart->dataset('My dataset 2', 'bar', );

    	return view('admin.dashboard', compact('chart'));

    }
}
