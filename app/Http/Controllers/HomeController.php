<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\verifytoken;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $get_user = User::where('email', auth()->user()->email)->first();
        if($get_user->is_activated == 1){
            return view('index');
        }else{
            return redirect()->route('verifyaccount');

        }
    }

    public function verifyaccount(){
        return view('otp-verification');
    }

    public function useractivation(Request $request){
        $get_token = $request->token;
        $get_token = verifytoken::where('token', $get_token)->first();
    
        if($get_token){
            $user = User::where('email', $get_token->email)->first();
            $user->is_activated = 1; // Activate user
            $user->save();
    
            // Delete Token after activation
            $get_token->delete();
            
            // Log the user in
            //auth()->login($user);
            //dd(auth()->check(), auth()->user());


            //dd($user->getRoleNames());
            // $user = User::with('roles')->where('id', $user->id)->first();
            //     dd($user->roles);

            auth()->login($user);
            session()->regenerate();


            $role = $user->getRoleNames()->first();

            if ($role == 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($role == 'teacher') {
                return redirect()->route('dashboard.teacher');
            } elseif ($role == 'parent') {
                return redirect()->route('dashboard.parent');
            } elseif ($role == 'student') {
                return redirect()->route('dashboard.student');
            }
            
            }else{
                return redirect('/verifyaccount')->with('status', 'Invalid OTP');
            }
    }
    
}
