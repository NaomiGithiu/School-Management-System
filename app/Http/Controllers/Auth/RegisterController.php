<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\welcomeMail;
use App\Models\verifytoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;



class RegisterController extends Controller
{
    public function __construct(){
       $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    
    public function register(Request $request){
        
        //user validation
        $validateData = $request -> validate([
            'name' => 'required|max:255',
            'mobile_no' => 'required|numeric',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed'
        ]);

        //creating a user
        $user = User::create([
            'name' => $request -> name,
            'mobile_no' => $request -> mobile_no,
            'email' => $request -> email,
            'password' => Hash::make($request -> password)
        ]);

        $validToken = random_int(1000, 9999); 
        $get_token = new verifytoken();
        $get_token->token = $validToken;
        $get_token->email = $request['email'];
        $get_token->save();
        $get_user_name = $request['name'];
        $get_user_email = $request['email'];


        Mail::to($request['email'])->send(new welcomeMail($get_user_email, $validToken, $get_user_name));

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('verifyaccount')->with('message', 'Please verify your account');
        } else {
            return redirect()->route('login')->with('error', 'Something went wrong!');
        }
        

    }
}
 