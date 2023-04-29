<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

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
 
            return redirect()->intended('home');
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

        $password = 'admin'; //Str::random(11);

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

        //event(new Registered($user));
        //Auth::login($user);
        

        
        return redirect('/verify-otp');
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function ShowOTP(){
        return view('auth.very-otp');
    }
    
}
