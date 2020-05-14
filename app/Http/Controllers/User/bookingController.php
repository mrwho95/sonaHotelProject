<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\customerorder;
use Illuminate\Support\Facades\DB;
use App\room;
use App\customersearch;
use App\customerPromoCode;
use App\customerRoomPrice;
use App\User;
use Auth;
use Carbon\Carbon;

class bookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bookingProcess($id, Request $request, customerorder $customerorder, room $room, customersearch $customersearch, customerPromoCode $customerPromoCode, customerRoomPrice $customerRoomPrice){

    	$roomData = room::find($id);
    	$roomData = json_decode(json_encode($roomData), true);

        $customersearchData = DB::table('customersearches')->where('user_id', Auth::id())->first();
    	$customersearchData = json_decode(json_encode($customersearchData), true);

        $customerRoomPriceData = DB::table('customer_room_prices')->where('user_id', Auth::id())->first();
    	$customerRoomPriceData = json_decode(json_encode($customerRoomPriceData), true);

    	$bookingCode = "#".uniqid();

        $promoCodeData = DB::table('customer_promo_codes')->where('user_id', Auth::id())->first();
        $promoCodeData = json_decode(json_encode($promoCodeData), true);

        if (!empty($promoCodeData)) {
            $customerorder->promocode = $promoCodeData['code'];
        }

    	$customerorder->user_id = Auth::id();
    	$customerorder->room_id = $id;
    	$customerorder->booking_code = $bookingCode;
    	$customerorder->room_bed = $roomData['bed'];
    	$customerorder->personal_request = $request->message;
    	$customerorder->bed_preference = $request->largeortwin;
    	$customerorder->smoke_preference = $request->smokeornot;
    	$customerorder->check_in = $customersearchData['dateIn'];
    	$customerorder->check_in_time = $request->checkInTime;
        $customerorder->range = $customersearchData['range'];
    	$customerorder->check_out = $customersearchData['dateOut'];
        $customerorder->price_amount = $customerRoomPriceData['price_amount'];
        $customerorder->service_charge_amount = $customerRoomPriceData['service_charge_amount'];
        $customerorder->service_tax_amount = $customerRoomPriceData['service_tax_amount'];
        $customerorder->promo_amount = $customerRoomPriceData['promo_amount'];
    	$customerorder->total_amount = $customerRoomPriceData['total_amount'];
        $customerorder->status = "Pending";
    	$customerorder->save();


    	return redirect()->route('myBooking')->with('success', 'Successful to make a room booking. We receive your booking order and wait for confirm.');
    }

     public function index(customerorder $customerOrder, room $room, User $user){
        // $customerOrder = customerorder::paginate(5);
        // $customerOrder = customerorder::where([['user_id', Auth::id()], ['status', 'Pending']])->paginate(5);
        $customerOrder = customerorder::where([['user_id', Auth::id()]])->paginate(5);
        $arr['customerOrder'] = $customerOrder;
        $customerOrder = json_decode(json_encode($customerOrder), true);

        $hotelInfo = DB::table('hotelinfos')->get();
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
            $order['roomPhoto_1'] = $room['photo_1'];
            $order['roomPhoto_2'] = $room['photo_2'];
            $order['roomPhoto_3'] = $room['photo_3'];
            $order['roomId'] = $orderValue['room_id'];
            $order['roomName'] = $room['name'];

            $order['booking_Id'] = $orderValue['id'];

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

        return view('user.bookingHistory', $arr);
    }
}
