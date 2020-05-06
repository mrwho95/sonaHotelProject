<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
use App\User;
use Auth;
use App\customersearch;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $room = DB::table('rooms')->get();
        $array['room'] = $room;
        return view('user.home', $array);
    }

    public function about()
    {
        return view('user.about');
    }

    public function pages()
    {
        return view('user.pages');
    }

    public function rooms()
    {
        $room = DB::table('rooms')->get();
        $array['room'] = $room;

        $array['data'] = room::paginate(3);
        return view('user.rooms', $array);
    }

    public function blogs()
    {
        return view('user.blogs');
    }

    public function review()
    {
        $room = DB::table('rooms')->get();
        $array['room'] = $room;
        return view('user.review', $array);
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
        
        if ($request->input('dateIn') && $request->input('dateOut')) {
            $date1 = date_create($request->input('dateIn'));
            $date2 = date_create($request->input('dateOut'));
            $dateIn = date_format($date1, "m-d-Y");
            $dateOut = date_format($date2, "m-d-Y");
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
                  DB::table('customersearches')->updateOrInsert(
                ['user_id' => Auth::id()],
                ['dateIn' => $request->dateIn, 'dateOut'=> $request->dateOut, 'duration'=> $night, 'guest'=>$request->guest, 'user_id' => Auth::user()->id, 'range'=>$durationOfDate, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

                $searchData = DB::table('customersearches')->where('user_id', Auth::id())->first();
                $searchData = json_decode(json_encode($searchData), true);
                $array['arr'] = $searchData;
            }
        }else{
            $ip=$_SERVER['REMOTE_ADDR'];

            DB::table('device_users')->updateOrInsert(
                ['remoteAddress' => $ip],
                ['name' => 'anonymous', 'dateIn' => $request->dateIn, 'dateOut'=> $request->dateOut, 'duration'=> $night,'range'=>$durationOfDate, 'guest'=>$request->guest,'remoteAddress' => $ip, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
                );

            $searchData = DB::table('device_users')->where('remoteAddress', $ip)->first();
            $searchData = json_decode(json_encode($searchData), true);
            $array['arr'] = $searchData;
            
        }
        $array['data'] = room::paginate(5);
        return view('user.searchRooms', $array);
    }
}
