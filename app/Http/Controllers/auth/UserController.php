<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller

{
    public function ShowLogin(){
        return view('auth.login');
    }

    public function ShowRegister(){
        return view('auth.register');
    }

    public function Authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function CreateAccount(Request $request){
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'wildlifePermit' => 'required',
            'businessName' => 'required',
            'ownerName' => 'required',
            'address' => 'required',
            'contact' => 'required|min:11',            
            'email' => 'required|email|unique:users,email',  

        ]);

        $password = Str::random(11);

        $user = User::Create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'username' => substr($request->username,0,1) . $request->lastName ,
            'wildlife_permit' => $request->wildlifePermit,
            'business_name' => $request->businessName,
            'owner_name' => $request->ownerName,
            'address' => $request->address,
            'contact' => $request->contact,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        $validateToken = rand(10,100..'2022');

        $get_token = new Verifytoken();
        $get_token->token =  $validateToken;
        $get_token->email = $request->email;
        $get_token->save();
        $get_user_email  = $request->email;
        $get_user_name = substr($request->firstName,0,1) . $request->lastName;
        Mail::to($request->email)->send(new WelcomeMail($get_user_email, $validateToken, $get_user_name, $password));
        
        //event(new Registered($user));      
        return redirect('/verify-account');

        
        
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    

        return redirect('/');
    }

    public function VerifyAccount(){
        return view('auth.verify-account');
    }
    
    public function UserActivation(Request $request){
        $get_token = $request->token;
        $get_token = Verifytoken::where('token', $get_token)->first();

        if($get_token){
            $get_token->is_activated = 1;
            $get_token->save();
            $user = User::where('email', $get_token->email)->first();
            $user->is_activated = 1;
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            $getting_token = Verifytoken::where('token', $get_token->token)->first();
            $getting_token->delete();
         
            Auth::login($user);
            return redirect('/')->with('activated', 'Your account has been activated sucessfully');

        }
        else{
            return redirect('/verify-account')->with('incorrect', 'Your OTP is invalid please check your email once');
        }
    }
}
