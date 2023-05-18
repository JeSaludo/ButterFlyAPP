<?php

namespace App\Http\Controllers\auth;


use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Admin;
use App\Models\Permit;
use App\Models\User;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function ShowLogin(){
        return view('admin.auth.login');
    }

    public function ShowRegister(){
        return view('admin.auth.register');
    }

    public function ShowDashboardUsers(){
        $users = User::paginate(10);
        return view('admin.dashboard-users', compact('users'));
    }

    //public function ShowDashboardApp(){
    //    $users = User::all();
    //return view("admin.dashboard-app-form",compact('users') );
    //}
    //public function index()
    //  {
    //     $users = User::all();
    //     return view('admin.users.index', compact('users'));
    // }

    
    public function Authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

       
        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }      
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function CreateAccount(Request $request){
        $data = $request->validate([
            'username' => 'required|unique:admins,username',             
            'email' => 'required|email|unique:admins,email',  
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'

        ]);
       
        $admin = Admin::Create([
            
            'username' => $request->username,
            'email' => $request->email,
            'role' => 1,
            'password' => Hash::make($request->password),
        ]);

        
        Auth::guard('admin')->login($admin);
        return redirect('/admin/dashboard');
     
        
        
    }

    public function logout(Request $request){

        Auth::guard('admin')->logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        
        return redirect('/admin/login');
    }

   
}
