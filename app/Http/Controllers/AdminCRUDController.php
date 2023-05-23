<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NotifyApprove;
use App\Mail\WelcomeMail;
use App\Models\Permit;
use App\Models\User;
use App\Models\Butterfly;
use App\Models\Verifytoken;
use App\Models\ApplicationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class AdminCRUDController extends Controller
{
  
    public function ShowUserAccount(){
        date_default_timezone_set('Asia/Manila'); 
        $hour = date('H');
        $greeting = '';
    
        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Good morning';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'Good afternoon';
        } else {
            $greeting = 'Good evening';
        }
        $users = User::paginate(10);
        return view('admin.dashboard.admin-dashboard-user', compact('greeting', 'users'));
    }

    public function ShowApplication(){
        date_default_timezone_set('Asia/Manila'); 
        $hour = date('H');
        $greeting = '';
    
        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Good morning';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'Good afternoon';
        } else {
            $greeting = 'Good evening';
        }
        $pendingApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'On Process')
        ->paginate(10);

        $acceptedApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'Accepted')
        ->paginate(10);

        $returnedApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'Returned')
        ->paginate(10);

        $expiredApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'Expired')
        ->paginate(10);

        $releasedApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'Released')
        ->paginate(10);

        $usedApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'Released')
        ->paginate(10);
        
        return view('admin.dashboard.admin-dashboard-app', compact('greeting', 'pendingApplicationForm', 'acceptedApplicationForm', 'returnedApplicationForm','expiredApplicationForm','releasedApplicationForm', 'usedApplicationForm'));
    
    }
    public function ShowDashboard(){
        date_default_timezone_set('Asia/Manila'); 
        $hour = date('H');
        $greeting = '';
    
        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Good morning';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'Good afternoon';
        } else {
            $greeting = 'Good evening';
        }
        $users = User::all();
        $userCount = $users->count();
       
        $verifiedUserCount = User::whereNotNull('email_verified_at')->count();
        $nonverifiedUserCount = User::whereNull('email_verified_at')->count();
      
        $applications = ApplicationForm::latest()->take(10)->get();

        $acceptedApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'Accepted')
        ->count();

        $returnedApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'Returned')
        ->count();

        $pendingApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'On Process')
        ->count();

        $releasedApplicationForm = ApplicationForm::with('butterflies')
        ->where('is_draft', false)
        ->where('status', 'Released')
        ->count();

        return view('admin.dashboard.admin-dashboard',compact('greeting','userCount','verifiedUserCount','nonverifiedUserCount',
        'pendingApplicationForm', 'releasedApplicationForm', 'returnedApplicationForm', 'acceptedApplicationForm','applications' ));
    }


    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){
       
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
           
            'businessName' => 'required',
            'ownerName' => 'required',
            'address' => 'required',
            'contact' => 'required|min:11',            
            'email' => 'required|email|unique:users,email',  
            'wfpPermit' => 'nullable',
            'wcpPermit' => 'nullable',
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

        $user = User::Create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'username' => substr($request->firstName,0,1) . $request->lastName ,
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
        
        

        return redirect('/admin/dashboard/users');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
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

        
        $user->first_name = $data['firstName'];
        $user->last_name = $data['lastName'];
        $user->username = $data['username'];
        $user->business_name = $data['businessName'];
        $user->owner_name = $data['ownerName'];
        $user->address = $data['address'];
        $user->contact = $data['contact'];
        $user->email = $data['email'];
        $user->role = $request->status;
        $user->save();

        return redirect('/admin/dashboard/users')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
    
        if ($user) {
            $user->delete();
            return redirect('/admin/dashboard/users')->with('success', 'User deleted successfully.');
        } else {
            return redirect('/admin/dashboard/users')->with('error', 'User not found.');
        }
    }


    public function deleteApplication(ApplicationForm $form)
    {
        $form->delete();    
        return redirect('/admin/dashboard/applications')->with('success', 'Application deleted successfully.');
    }
    
    public function approveApplication(ApplicationForm $form)
    {
        $form->status = 'Accepted';
        $form->save();
        
        $user = User::findOrFail($form->user_id);     
        Mail::to($user->email)->send(new NotifyApprove());

        return redirect('/admin/dashboard/applications')->with('success', 'Application approved successfully.');
    }
    
    public function denyApplication(ApplicationForm $form)
    {
        $form->status = 'Returned';
        $form->save();
    
        return redirect('/admin/dashboard/applications')->with('success', 'Application denied successfully.');
    }

    public function viewApplication($id){

        $form = ApplicationForm::with('butterflies')->findOrFail($id);
      
        return view('admin.users.view-application', compact('form'));
    
    }

    public function editApplication($id)
    {
        $form = ApplicationForm::findOrFail($id);
        $butterflies = Butterfly::all();
    
        return view('admin.users.edit-application', compact('form', 'butterflies'));
    }
    
    public function updateApplication(Request $request, $id){
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'transportAddress' => 'required',
            'transportDate' => 'required',            
            'modeOfTransport' => 'required',
            'purpose' => 'required',
            'status' => 'required'
        ]);
      
        $form = ApplicationForm::findOrFail($id);
        
        $form->name = $request->name;
        $form->address = $request->address;
        $form->transport_address = $request->transportAddress;
        $form->purpose = $request->purpose;
        $form->transport_date = $request->transportDate;
        $form->mode_of_transport = $request->modeOfTransport;
        $form->status = $request->status;
        $form->save();

        $butterflies = [];
        $names = $request->input('butterfly_name');
        $quantities = $request->input('butterfly_quantity');
        foreach ($names as $index => $name) {
            $quantity = $quantities[$index];
            $butterflies[] = [
                'name' => $name,
                'quantity' => $quantity,
            ];
        }
      
        $butterflyDB = Butterfly::where('application_forms_id', $id)->get();
        foreach ($butterflyDB as $index => $butterfly) {
            $butterfly->name = $butterflies[$index]['name'];
            $butterfly->quantity = $butterflies[$index]['quantity'];
            $butterfly->save();
        }

        return redirect('/admin/dashboard/applications');
        
    }
    //Order of Payment
    public function showOrderOfPayment(){
        return view('admin.dashboard.admin-dashboard-order-payment');
    }

    //BUtterfly 

    public function addButterflySpecies(){
        return view('admin.add-butterfly');
    }

    public function storeButterflySpecies(){

    }

    public function editButterflySpecies(){

    }

    public function updateButterflySpecies(){

    }

    public function viewButterflySpecies(){

    }

    public function deleteButterflySpecies()
    {

    }

    //

}
