<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\room;
use App\User;
use App\customerReview;
use App\customersearch;
use Auth;
use Illuminate\Support\Facades\DB;
use App\promocode;
use App\customerPromoCode;
use Carbon\Carbon;
use App\device_user;
use App\roomcharge;
use App\customerRoomPrice;

class roomDetailsController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request, $id, room $room)
    {

        if (Auth::check()) {
             if ($request->input('dateIn') && $request->input('dateOut')) {
                $dateIn = Carbon::parse($request->input('dateIn'));
                $dateOut = Carbon::parse($request->input('dateOut'));
                $dateDiff = strtotime($dateOut) - strtotime($dateIn);
                $night = abs(round($dateDiff / 86400));
                if ($night > 1) {
                    $durationOfDate = ($night+1)." days ".$night." nights";
                }else{
                    $durationOfDate = ($night+1)." days ".$night." night";
                }

                customersearch::updateOrCreate(
                ['user_id' => Auth::id()],
                ['dateIn' => $dateIn, 'dateOut'=> $dateOut, 'duration'=> $night, 'guest'=>$request->guest, 'user_id' => Auth::user()->id, 'range'=>$durationOfDate, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );
            }

            $room_name = room::where('id', $id)->value('name');
            $rating = customerReview::where('room_name', $room_name)->pluck('rating');
            $rating = json_decode(json_encode($rating), true);
            if (empty($rating)) {
                $averageRating = 0;
            }else{
                $averageRating = bcdiv(array_sum($rating), count($rating), 2);
            }

            $arr['reviewData'] = customerReview::where('room_name', $room_name)->orderBy('created_at', 'desc')->paginate(3);
            $arr['userDataset'] = User::all();

            $searchData = customersearch::where('user_id', Auth::id())->first();
            $searchData = json_decode(json_encode($searchData), true);
            $arr['searchData'] = $searchData;
            $arr['searchData']['dateIn'] = Carbon::parse($searchData['dateIn'])->format('d-m-Y');
            $arr['searchData']['dateOut'] = Carbon::parse($searchData['dateOut'])->format('d-m-Y');
            $arr['user'] = User::find(Auth::id());
            $arr['room'] = room::find($id);
            $arr['averageRating'] = $averageRating;
            return view('user.roomDetails', $arr);
        }
    	else{

            if ($request->input('dateIn') && $request->input('dateOut')) {
                $dateIn = Carbon::parse($request->input('dateIn'));
                $dateOut = Carbon::parse($request->input('dateOut'));
                $dateDiff = strtotime($dateOut) - strtotime($dateIn);
                $night = abs(round($dateDiff / 86400));
                if ($night > 1) {
                    $durationOfDate = ($night+1)." days ".$night." nights";
                }else{
                    $durationOfDate = ($night+1)." days ".$night." night";
                }
                $ip=$_SERVER['REMOTE_ADDR'];
                device_user::updateOrCreate(
                ['remoteAddress' => $ip],
                ['name' => 'anonymous', 'dateIn' => $dateIn, 'dateOut'=> $dateOut, 'duration'=> $night,'range'=>$durationOfDate, 'guest'=>$request->guest,'remoteAddress' => $ip, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );
            }

            $room_name = room::where('id', $id)->value('name');
            $rating = customerReview::where('room_name', $room_name)->pluck('rating');
            $rating = json_decode(json_encode($rating), true);
            if (empty($rating)) {
                $averageRating = 0;
            }else{
                $averageRating = bcdiv(array_sum($rating), count($rating), 2);
            }

            $ip=$_SERVER['REMOTE_ADDR'];
            $searchData = device_user::where('remoteAddress', $ip)->first();
            $searchData = json_decode(json_encode($searchData), true);
            $arr['searchData'] = $searchData;
            $arr['searchData']['dateIn'] = Carbon::parse($searchData['dateIn'])->format('d-m-Y');
            $arr['searchData']['dateOut'] = Carbon::parse($searchData['dateOut'])->format('d-m-Y');
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

            $searchData = customersearch::where('user_id', Auth::id())->first();
            $searchData = json_decode(json_encode($searchData), true);
            $dayDuration = customersearch::where('user_id', Auth::id())->value('duration');
            $roomcharges = roomcharge::where('room_id', $id)->first();
            $roomcharges = json_decode(json_encode($roomcharges), true);
            $roomPriceBeforeTaxAndService = bcmul($roomcharges['price'], $dayDuration, 2);
            $serviceChargeAmount = bcmul($roomPriceBeforeTaxAndService, $roomcharges['service_charge_rate'], 2);
            $roomPriceBeforeTax = bcadd($roomPriceBeforeTaxAndService, $serviceChargeAmount, 2);
            $serviceTaxAmount = bcmul($roomPriceBeforeTax, $roomcharges['service_tax_rate'], 2);
            $totalAmount = bcadd($roomPriceBeforeTax, $serviceTaxAmount, 2);

            $userInputPromoCode = customerPromoCode::where('user_id', Auth::id())->value('code');

            $promoCodesColumnData = promocode::pluck('code');
            $promoCodesColumnData = json_decode(json_encode($promoCodesColumnData), true);

            if (empty($userInputPromoCode) || in_array($userInputPromoCode, $promoCodesColumnData) == false) 
            {
               $arr['totalAmount'] = $totalAmount;

               customerRoomPrice::updateOrCreate(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::user()->id, 'room_id'=> $id, 'price_amount'=>$roomPriceBeforeTaxAndService, 'service_charge_amount'=> $serviceChargeAmount, 'service_tax_amount' => $serviceTaxAmount, 'promo_amount'=> '0', 'total_amount'=> $totalAmount]
                );
            }else{
                $promoCodeData = promocode::where('code', $userInputPromoCode)->first();
                $promoCodeData = json_decode(json_encode($promoCodeData), true);
                $arr['userInputPromoCode'] = $userInputPromoCode;
                $discountRate = $promoCodeData['discount'];
                $discountAmount = bcmul($totalAmount, $discountRate, 2);
                $totalAmount = bcsub($totalAmount, $discountAmount, 2);
                $arr['discountAmount'] = $discountAmount;
                $arr['afterDiscount'] = $totalAmount;

                customerRoomPrice::updateOrCreate(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'room_id'=> $id, 'price_amount'=>$roomPriceBeforeTaxAndService, 'service_charge_amount'=> $serviceChargeAmount, 'service_tax_amount' => $serviceTaxAmount, 'promo_amount'=> $discountAmount, 'total_amount'=> $totalAmount]
                );
            }
            $arr['roomPrice'] = $roomPriceBeforeTaxAndService;
            $arr['serviceChargeAmount'] = $serviceChargeAmount;
            $arr['serviceTaxAmount'] = $serviceTaxAmount;
            $arr['searchData'] = $searchData;
            $arr['searchData']['dateIn'] = Carbon::parse($searchData['dateIn'])->format('d/m/Y');
            $arr['searchData']['dateOut'] = Carbon::parse($searchData['dateOut'])->format('d/m/Y');
            $arr['promoCode'] = $userInputPromoCode;
            $arr['room'] = room::find($id);
            return view('user.roomReserve', $arr);
        }
        
    }

    public function promo($id, Request $request, customerPromoCode $customerPromoCode)
    {
        $promoCodesColumnData = promocode::pluck('code');
        $promoCodesColumnData = json_decode(json_encode($promoCodesColumnData), true);

        $promoCodeRowData = promocode::where('code', $request->input('promo_code'))->first();
        $promoCodeRowData = json_decode(json_encode($promoCodeRowData), true);
        $expiredDate = Carbon::parse($promoCodeRowData['expired'])->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');

        if (in_array($request->input('promo_code'), $promoCodesColumnData)){
            if ($promoCodeRowData['availability'] > 0 && $today <= $expiredDate) {
                customerPromoCode::updateOrCreate(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'code'=>$request->promo_code, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

                return redirect()->route('roomReserve', $id)->with('success', 'Enjoy our promo discount.');
            }elseif($promoCodeRowData['availability'] <= 0){

                customerPromoCode::updateOrCreate(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );
                return redirect()->route('roomReserve', $id)->with('warning', 'Sorry, this promo code is reached out.');
            }elseif($today > $expiredDate){
                customerPromoCode::updateOrCreate(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );
                return redirect()->route('roomReserve', $id)->with('warning', 'Sorry, this promo code is expired already.');
            }
        }elseif (empty($request->input('promo_code'))) {
            customerPromoCode::updateOrCreate(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

            return redirect()->route('roomReserve', $id)->with('warning', 'No promo code is inserted.');

        }else{
            customerPromoCode::updateOrCreate(
                ['user_id' => Auth::id()],
                ['user_id' => Auth::id(), 'code'=>$request->promo_code, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

            return redirect()->route('roomReserve', $id)->with('warning', 'Invalid Promo code.');

        }
    }
}
