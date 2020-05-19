<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request, $user){
        if ($user->is_admin) {
            return redirect('adminDashboard');
        }
        return redirect('home');
    }

    // protected function redirectTo(){
    //     if(Auth::user()->hasAdmin('0')){
    //         $this->redirectTo = url('/adminEditRoom');
    //         return $this->redirectTo;
    //     }

    //     $this->redirectTo = route('home');
    //     return $this->redirectTo;
            
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session(['url.intended' => url()->previous()]);
        $this->redirectTo = session()->get('url.intended');
        $this->middleware('guest')->except('logout');
    }
        
}
