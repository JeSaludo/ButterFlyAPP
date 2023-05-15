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
        
        
        $user->role = $request->status;
        $user->update($data);

        return redirect('admin/dashboard/users')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
    
        if ($user) {
            $user->delete();
            return redirect('admin/dashboard/users')->with('success', 'User deleted successfully.');
        } else {
            return redirect('admin/dashboard/users')->with('error', 'User not found.');
        }
    }
    public function showApplicationForm()
    {
        $usersWithPermit = User::whereHas('applicationForms', function ($query) {
            $query->where('is_draft', false);
        })
        ->with(['applicationForms' => function ($query) {
            $query->where('is_draft', false);
        }, 'applicationForms.butterflies'])
        ->paginate(10); // Specify the number of items per page
        
       return view('admin.dashboard-app-form', compact('usersWithPermit'));
    
    }
    //

    public function deleteApplication(ApplicationForm $form)
    {
        $form->delete();    
        return redirect()->route('application-form')->with('success', 'Application deleted successfully.');
    }
    
    public function approveApplication(ApplicationForm $form)
    {
        $form->status = 'approved';
        $form->save();

        
        $user = User::findOrFail($form->user_id);
        
        
        
        Mail::to($user->email)->send(new NotifyApprove());

        return redirect()->route('application-form')->with('success', 'Application approved successfully.');
    }
    
    public function denyApplication(ApplicationForm $form)
    {
        $form->status = 'denied';
        $form->save();
    
        return redirect()->route('application-form')->with('success', 'Application denied successfully.');
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
    
    public function updateApplication(Request $request,$id){
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

        return redirect()->route('application-form');
        
    }

}
