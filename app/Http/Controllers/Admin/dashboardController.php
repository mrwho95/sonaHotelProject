<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\room;
use App\Charts\RoomChart;
use App\customerorder;
use App\customerReview;


class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$customerOrder = customerorder::all();
        $customerOrder = json_decode(json_encode($customerOrder), true);

        $orderData = DB::table('customerorders')->pluck('room_id')->all();
        $orderData = array_count_values($orderData);

        $reviewData = customerReview::all();
        $reviewData = json_decode(json_encode($reviewData), true);

    	$roomDataset = room::all();
    	$roomDataset = json_decode(json_encode($roomDataset), true);

        $array = array(
            'roomName' => '',
            'data' => 0,
            'satisfaction' => 0
        );
    	foreach ($roomDataset as $key => $value) {

    		$array['roomName'] = $value['name'];
            $dataset[$value['id']] = $array;

            foreach ($orderData as $key2 => $value2) {
                if ($value['id'] == $key2) {
                    $dataset[$value['id']]['data'] = $value2;
                }
                continue;
            }

            foreach ($reviewData as $key3 => $value3) {
                if ($value['name'] == $value3['room_name']) {
                    $dataset[$value['id']]['satisfaction'] = $value3['rating']; 
                }
                continue;
            }
    	}

        foreach ($dataset as $key => $value) {
            $xAxis[] = $value['roomName'];
            $yAxis_1[] = $value['data'];
            $yAxis_2[] = $value['satisfaction'];
        }
        
    	$barchart_1 = new RoomChart;
    	$barchart_1->labels($xAxis);
    	$barchart_1->dataset('Room Booking', 'bar', $yAxis_1)->backgroundColor('#ffb3ff');
    	// $chart->dataset('My dataset 2', 'bar', );

        $barchart_2 = new RoomChart;
        $barchart_2->labels($xAxis);
        $barchart_2->dataset('Customer Satisfaction', 'bar', $yAxis_2)->backgroundColor('#42f5d1');

    	return view('admin.dashboard', compact('barchart_1', 'barchart_2'));

    }
}
