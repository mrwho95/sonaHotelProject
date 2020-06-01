<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\customerorder;
use App\room;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\hotelinfo;

class bookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(customerorder $customerOrder, room $room, User $user){
    	$customerOrder = customerorder::paginate(5);
        // $customerOrder = customerorder::where('status', 'pending')->paginate(5);
    	$arr['customerOrder'] = $customerOrder;
    	$customerOrder = json_decode(json_encode($customerOrder), true);

    	$hotelInfo = hotelinfo::all();
    	$hotelInfo = json_decode(json_encode($hotelInfo), true);
    	foreach ($hotelInfo as $key => $hotelData) {
    		$hotelName = $hotelData['name'];
    		$hotelEmail = $hotelData['email'];
    		$hotelHp = $hotelData['phonenumber'];
    		$hotelAddress = $hotelData['address'];
    	}

    	$orderDataset = array();
    	foreach ($customerOrder['data'] as $key => $orderValue) {

    		$room = room::find($orderValue['room_id']);
    		$room = json_decode(json_encode($room), true);
            $order['Id'] = $orderValue['id'];
    		$order['roomPhoto_1'] = $room['photo_1'];
            $order['roomPhoto_2'] = $room['photo_2'];
            $order['roomPhoto_3'] = $room['photo_3'];
            $order['roomId'] = $orderValue['room_id'];
    		$order['roomName'] = $room['name'];

    		$user = User::find($orderValue['user_id']);
    		$user = json_decode(json_encode($user), true);
    		$order['userName'] = $user['name'];

    		$order['checkIn'] = Carbon::parse($orderValue['check_in'])->format('d/m/Y');
    		$order['checkOut'] = Carbon::parse($orderValue['check_out'])->format('d/m/Y');
            $order['range'] = $orderValue['range'];
    		$order['totalAmount'] = $orderValue['total_amount'];
    		$order['bookingCode'] = $orderValue['booking_code'];
            $order['status'] = $orderValue['status'];

    		$order['hotelName'] = $hotelName;
    		$order['hotelEmail'] = $hotelEmail;
    		$order['hotelHp'] = $hotelHp;
    		$order['hotelAddress'] = $hotelAddress;

            if ($orderValue['status'] == "Pending") {
                $pendingOrderDataset[] = $order;
            }elseif($orderValue['status'] == "Reject"){
                $rejectOrderDataset[] = $order;
            }elseif($orderValue['status'] == "Approve"){
                $confirmOrderDataset[] = $order;
            }
    	}

        if (!empty($pendingOrderDataset)) {
            $arr['pendingOrderDataset'] = $pendingOrderDataset;
        }else{
            $arr['pendingOrderDataset'] = '';
        }

        if (!empty($rejectOrderDataset)) {
            $arr['rejectOrderDataset'] = $rejectOrderDataset;
        }else{
            $arr['rejectOrderDataset'] = '';
        }

        if (!empty($confirmOrderDataset)) {
            $arr['comfirmOrderDataset'] = $confirmOrderDataset;
        }else{
            $arr['comfirmOrderDataset'] = '';
        }
    	
    
    	return view('admin.customerBooking', $arr);
    }

    public function bookingApprove($id){

        $Approve = customerorder::where('id', $id)->update(['status' => "Approve"]);

    	return redirect()->route('adminCustomerBooking')->with('success', 'Booking order is approved.');
    }

    public function bookingReject($id){

        $Reject = customerorder::where('id', $id)->update(['status' => "Reject"]);

    	return redirect()->route('adminCustomerBooking')->with('warning', 'Booking order is rejected.');
    }
}
