<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
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
use Illuminate\Support\Facades\Validator;


class UserController extends Controller

{

    public function index(){
        if (auth()->user()) {
            $get_user = User::where('email', auth()->user()->email)->first();
        
            if($get_user->is_activated == 1){
                return view('home');
            }
            else{
                return redirect('/verify-account');
            }
        }
        else{
            return view('home');
        }
       
    }
    public function ShowLogin(){
        return view('auth.login');
    }

    public function ShowRegister(){
        return view('auth.register');
    }
    public function username()
    {
        $field = filter_var(request()->input('email_or_username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => request()->input('email_or_username')]);
        return $field;
    }
    public function Authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            $this->username() => ['required', 'string'],
            'password' => ['required'],
        ]);

       
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $deactivatedRoleId = 1;
            if ($user->role === $deactivatedRoleId) {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email_or_username' => 'Your account is deactivated.']);
            }
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
       
 
        return back()->withErrors([
            'email_or_username' => 'The provided credentials do not match our records.',
        ])->onlyInput('email_or_username');
    }

 
    public function CreateAccount(Request $request){
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'businessName' => 'required',
            'ownerName' => 'required',
            'address' => 'required',
            'contact' => 'required|min:11',
            'email' => 'required|email|unique:users,email',
            'wfp_permit' => 'nullable',
            'wcp_permit' => 'nullable',
        ]);
    
    
        
    
        $wfpPermit = $request->input('wfp_permit');
        $wcpPermit = $request->input('wcp_permit');
    
        if (empty($wfpPermit) && empty($wcpPermit)) {
            return back()->withErrors([
                'permits' => 'At least one permit is required.',
            ])->withInput();
        }
    
        if (!empty($wfpPermit)) {
            $permit = Permit::where('permit_type', 'wfp')
                ->where('permit_no', $wfpPermit)
                ->where('expiration_date', '>=', now())
                ->first();
    
            if (!$permit) {
                return back()->withErrors([
                    'wfp_permit' => 'Invalid or expired WFP permit.',
                ])->withInput();
            }
        }
    
        if (!empty($wcpPermit)) {
            $permit = Permit::where('permit_type', 'wcp')
                ->where('permit_no', $wcpPermit)
                ->where('owner_name', $request->input('ownerName'))
                ->where('expiration_date', '>=', now())
                ->first();
    
            if (!$permit) {
                return back()->withErrors([
                    'wcp_permit' => 'Invalid or expired WCP permit.',
                ])->withInput();
            }
        }
        $password = Str::random(11);
    
        $user = User::create([
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'username' => substr($request->input('firstName'), 0, 1) . $request->input('lastName'),
            'wfp_permit' => $wfpPermit,
            'wcp_permit' => $wcpPermit,
            'business_name' => $request->input('businessName'),
            'owner_name' => $request->input('ownerName'),
            'address' => $request->input('address'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
        ]);
    
        $validateToken = rand(10, 100) . '2022';
    
        $verifyToken = new Verifytoken();
        $verifyToken->token = $validateToken;
        $verifyToken->email = $request->input('email');
        $verifyToken->save();
    
        $userEmail = $request->input('email');
        $userName = "ltpmdq_" . substr($request->input('firstName'), 0, 1) . $request->input('lastName');
        Mail::to($userEmail)->send(new WelcomeMail($userEmail, $validateToken, $userName, $password));
    
        return redirect('/verify-account')->with('email', $request->email);
     
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

   public function ShowProfile(){
        return view('user.profile');
   }

   public function UpdateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
      
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required',            
            'businessName' => 'required',
            'ownerName' => 'required',
            'address' => 'required',
            'contact' => 'required|min:11',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'status' => 'required|in:0,1',
            'wfp_permit' => 'nullable',
            'wcp_permit' => 'nullable',
            
        ]);
        
        
        $user->role = $request->status;
        $user->update($data);

        return redirect('admin/dashboard')->with('success', 'User updated successfully');
    }
    

}
