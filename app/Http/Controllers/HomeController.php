<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
use App\User;
use Auth;
use App\customersearch;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {   for email verfication
    //     $this->middleware(['auth', 'verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $room = room::all();
        $array['room'] = $room;
        return view('user.home', $array);
    }

    public function about()
    {
        if (Auth::check()) {
            $arr['userData'] = user::find(Auth::id());
            // $userData = json_decode(json_encode($userData), true);
            // print_r($userData);
            return view('user.about', $arr);
        }else{
            return view('user.about');
        }
    }

    public function pages()
    {
        return view('user.pages');
    }

    public function rooms()
    {
        $room = room::all();
        $array['room'] = $room;

        $array['data'] = room::paginate(3);
        return view('user.rooms', $array);
    }

    public function blogs()
    {
        return view('user.blogs');
    }

    public function roomDetails()
    {
        return view('user.roomDetails');
    }

    public function blogDetails()
    {
        return view('user.blogDetails');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function searchRooms(Request $request, room $room, customersearch $customersearch)
    {
        // $this->validate($request, [
        //     'dateOut' => ['required', 'string', 'date_format:d/m/Y'],
        //     'dateIn' => ['required', 'string', 'date_format:d/m/Y'],
        //     'guest' => 'required'
        // ]);

        // $validatedData = $request->validate([
        //     'dataIn' => 'required|unique:posts|max:255',
        //     'guest' => 'required',
        //     'dateOut' => 'required'
        // ]);
        //return Carbon::parse($request->input('dateIn'))->month;
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
        }

        if (Auth::check()) {
            if ($request->input('dateIn')) {
                customersearch::updateOrCreate(
                ['user_id' => Auth::id()],
                ['dateIn' => $dateIn, 'dateOut'=> $dateOut, 'duration'=> $night, 'guest'=>$request->guest, 'user_id' => Auth::user()->id, 'range'=>$durationOfDate, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

                $searchData = customersearch::where('user_id', Auth::id())->first();
                $searchData = json_decode(json_encode($searchData), true);
                $array['arr'] = $searchData;
                $array['arr']['dateIn']=Carbon::parse($request->input('dateIn'))->format('d-m-Y');
                $array['arr']['dateOut']=Carbon::parse($request->input('dateOut'))->format('d-m-Y');
            }
        }else{
            $ip=$_SERVER['REMOTE_ADDR'];

            DB::table('device_users')->updateOrInsert(
                ['remoteAddress' => $ip],
                ['name' => 'anonymous', 'dateIn' => $dateIn, 'dateOut'=> $dateOut, 'duration'=> $night,'range'=>$durationOfDate, 'guest'=>$request->guest,'remoteAddress' => $ip, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

            $searchData = DB::table('device_users')->where('remoteAddress', $ip)->first();
            $searchData = json_decode(json_encode($searchData), true);
            $array['arr'] = $searchData;
            $array['arr']['dateIn']=Carbon::parse($request->input('dateIn'))->format('d-m-Y');
            $array['arr']['dateOut']=Carbon::parse($request->input('dateOut'))->format('d-m-Y');
        }
        $array['data'] = room::paginate(5);
        
        return view('user.searchRooms', $array);
    }
}
