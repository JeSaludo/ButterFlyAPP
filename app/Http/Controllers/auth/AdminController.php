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
    
        $user = Admin::where('email', $credentials['email'])->first();
    
        if ($user && $user->role === 0 && auth()->guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }
        if ($user && $user->role !== 0) {
            return back()->withErrors([
                'email' => 'You do not have permission to access the admin dashboard.',
            ])->onlyInput('email');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    

    public function CreateAccount(Request $request){
        $data = $request->validate([
            'username' => 'required|unique:admins,username',             
            'email' => 'required|email|unique:admins,email',  
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'

        ]);
       
        $admin = Admin::Create([
            
            'username' => $request->username,
            'email' => $request->email,
            'role' => 0,
            'password' => Hash::make($request->password),
            'name' => $request->name
        ]);

        
        
        return redirect('admin/dashboard/admins');
     
        
        
    }

    public function CreateAccountDev(Request $request){
        $data = $request->validate([
            'username' => 'required|unique:admins,username',             
            'email' => 'required|email|unique:admins,email',  
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'access_code' => 'required',
        ]);
       
        if($request->input('access_code') === "butterflyadmin"){
            $admin = Admin::Create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => 0,
                'password' => Hash::make($request->password),
                'name' => $request->name
            ]);
    
        }
     
        
        
        return redirect('admin/login');
     
        
        
    }

    public function ShowRegisterDev(){
        return view('admin.auth.register-dev');
    }
    public function logout(Request $request){

        Auth::guard('admin')->logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        
        return redirect('/admin/login');
    }

   
}
