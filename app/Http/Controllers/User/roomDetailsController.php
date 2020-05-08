<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\room;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use App\promocode;
use App\customerPromoCode;

class roomDetailsController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index($id, room $room)
    {

        if (Auth::check()) {
            $room_name = DB::table('rooms')->where('id', $id)->value('name');
            $rating = DB::table('customer_reviews')->where('room_name', $room_name)->pluck('rating');
            $rating = json_decode(json_encode($rating), true);
            if (empty($rating)) {
                $averageRating = 0;
            }else{
                $averageRating = bcdiv(array_sum($rating), count($rating), 2);
            }

            $arr['reviewData'] = DB::table('customer_reviews')->where('room_name', $room_name)->orderBy('created_at', 'desc')->paginate(3);

            $searchData = DB::table('customersearches')->where('user_id', Auth::id())->first();
            $arr['searchData'] = $searchData;
            $arr['user'] = User::find(Auth::id());
            $arr['room'] = room::find($id);
            $arr['averageRating'] = $averageRating;
            return view('user.roomDetails', $arr);
        }
    	else{
            $room_name = DB::table('rooms')->where('id', $id)->value('name');
            $rating = DB::table('customer_reviews')->where('room_name', $room_name)->pluck('rating');
            $rating = json_decode(json_encode($rating), true);
            if (empty($rating)) {
                $averageRating = 0;
            }else{
                $averageRating = bcdiv(array_sum($rating), count($rating), 2);
            }

            $ip=$_SERVER['REMOTE_ADDR'];
            $searchData = DB::table('device_users')->where('remoteAddress', $ip)->first();
            $arr['searchData'] = $searchData;
            $arr['room'] = room::find($id);
            $arr['averageRating'] = $averageRating;
    	   return view('user.roomDetails', $arr);
        }

        
    }

    public function roomReserve($id, room $room)
    {

        if (!Auth::check()) {
            return view('auth.login');
        }else{

            $searchData = DB::table('customersearches')->where('user_id', Auth::id())->first();
            $dayDuration = DB::table('customersearches')->where('user_id', Auth::id())->value('duration');
            $roomcharges = DB::table('roomcharges')->where('room_id', $id)->first();
            $roomcharges = json_decode(json_encode($roomcharges), true);
            $roomPriceBeforeTaxAndService = bcmul($roomcharges['price'], $dayDuration, 2);
            $serviceChargeAmount = bcmul($roomPriceBeforeTaxAndService, $roomcharges['service_charge_rate'], 2);
            $roomPriceBeforeTax = bcadd($roomPriceBeforeTaxAndService, $serviceChargeAmount, 2);
            $serviceTaxAmount = bcmul($roomPriceBeforeTax, $roomcharges['service_tax_rate'], 2);
            $totalAmount = bcadd($roomPriceBeforeTax, $serviceTaxAmount, 2);

            $userInputPromoCode = DB::table('customer_promo_codes')->where('user_id', Auth::id())->value('code');

            $promoCodesColumnData = DB::table('promocodes')->pluck('code');
            $promoCodesColumnData = json_decode(json_encode($promoCodesColumnData), true);

            if (empty($userInputPromoCode) || in_array($userInputPromoCode, $promoCodesColumnData) == false) 
            {
               $arr['totalAmount'] = $totalAmount;

               DB::table('customer_room_prices')->updateOrInsert(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'price_amount'=>$roomPriceBeforeTaxAndService, 'service_charge_amount'=> $serviceChargeAmount, 'service_tax_amount' => $serviceTaxAmount, 'promo_amount'=> '0', 'total_amount'=> $totalAmount, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );
            }else{
                $promoCodeData = DB::table('promocodes')->where('code', $userInputPromoCode)->first();
                $promoCodeData = json_decode(json_encode($promoCodeData), true);

                $discountRate = $promoCodeData['discount'];
                $discountAmount = bcmul($totalAmount, $discountRate, 2);
                $totalAmount = bcsub($totalAmount, $discountAmount, 2);
                $arr['discountAmount'] = $discountAmount;
                $arr['afterDiscount'] = $totalAmount;

                DB::table('customer_room_prices')->updateOrInsert(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'price_amount'=>$roomPriceBeforeTaxAndService, 'service_charge_amount'=> $serviceChargeAmount, 'service_tax_amount' => $serviceTaxAmount, 'promo_amount'=> $discountAmount, 'total_amount'=> $totalAmount, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );
            }
            $arr['roomPrice'] = $roomPriceBeforeTaxAndService;
            $arr['serviceChargeAmount'] = $serviceChargeAmount;
            $arr['serviceTaxAmount'] = $serviceTaxAmount;
            $arr['searchData'] = $searchData;
            $arr['promoCode'] = $userInputPromoCode;
            $arr['room'] = room::find($id);
            return view('user.roomReserve', $arr);
        }
        
    }

    public function promo($id, Request $request, customerPromoCode $customerPromoCode)
    {
        $promoCodesColumnData = DB::table('promocodes')->pluck('code');
        $promoCodesColumnData = json_decode(json_encode($promoCodesColumnData), true);

        $promoCodeRowData = DB::table('promocodes')->where('code', $request->input('promo_code'))->first();
        $promoCodeRowData = json_decode(json_encode($promoCodeRowData), true);
        if (in_array($request->input('promo_code'), $promoCodesColumnData)){
            if ($promoCodeRowData['availability'] > 0) {
                DB::table('customer_promo_codes')->updateOrInsert(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'code'=>$request->promo_code, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

                return redirect()->route('roomReserve', $id)->with('success', 'Enjoy our promo discount.');
            }else{
                DB::table('customer_promo_codes')->updateOrInsert(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );
                return redirect()->route('roomReserve', $id)->with('error', 'Sorry, this promo code is reached out.');
            }
        }elseif (empty($request->input('promo_code'))) {
            DB::table('customer_promo_codes')->updateOrInsert(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

            return redirect()->route('roomReserve', $id)->with('error', 'No promo code is inserted.');

        }else{
            DB::table('customer_promo_codes')->updateOrInsert(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'code'=>$request->promo_code, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

            return redirect()->route('roomReserve', $id)->with('error', 'Invalid Promo code.');

        }
    }
}
