<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NotifyApprove;
use App\Mail\NotifyReturned;
use App\Mail\WelcomeMail;
use App\Models\Permit;
use App\Models\User;
use App\Models\Butterfly;
use App\Models\Verifytoken;
use App\Models\ApplicationForm;
use App\Models\ButterflySpecies;
use App\Models\OrderOfPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\View\Components\Alert;
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

        $acceptedApplicationForm = ApplicationForm::with(['butterflies', 'orderOfPayment'])
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
        ->where('status', 'Used')
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
    public function ShowReports()
    {
        $butterflies = ButterflySpecies::paginate(10);
    
        $releasedApplicationForms = ApplicationForm::where('status', 'Released')->get();
    
        $permitData = [];
    
        foreach ($releasedApplicationForms as $applicationForm) {
            $permitData[] = [
                'month' => date('F', strtotime($applicationForm->updated_at)),
                'year' => date('Y', strtotime($applicationForm->updated_at)),
                'permits' => $releasedApplicationForms->count(),
            ];
        }
    
        return view('admin.dashboard.admin-dashboard-reports', compact('butterflies', 'permitData'));
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
    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id){
    
        
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

    public function destroy($id) {
   
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
    
    public function showApproveApplication(ApplicationForm $form){

    }
    public function approveApplication(ApplicationForm $form, Request $request)
    {
        $form->status = 'Accepted';
        $form->save();
        
        $order_no = Str::random(10);
        $orderOfPayments = new OrderOfPayment();
     
        $orderOfPayments->order_number = $order_no;
        $orderOfPayments->application_form_id = $form->id;
        $orderOfPayments->payment_amount = $request->payment_amount;
        $orderOfPayments->save();

        $user = User::findOrFail($form->user_id);     
        Mail::to($user->email)->send(new NotifyApprove());

        return redirect('/admin/dashboard/order-of-payment')->with('success', 'Application approved successfully.');
    }
    
    public function denyApplication(ApplicationForm $form)
    {
        $form->status = 'Returned';
        
        $user = User::findOrFail($form->user_id);     
        Mail::to($user->email)->send(new NotifyReturned());
        $form->save();
    
        return redirect('/admin/dashboard/applications')->with('success', 'Application denied successfully.');
    }

    public function viewApplication($id){

        $form = ApplicationForm::with('butterflies')->findOrFail($id);
      
        return view('admin.users.view-application', compact('form'));
    
    }

    public function reviewApplication($id){

        $form = ApplicationForm::with('butterflies')->findOrFail($id);
      
        return view('admin.CRUD.review-application', compact('form'));
    
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
        $orderOfPayments = OrderOfPayment::paginate(10);
        return view('admin.dashboard.admin-dashboard-order-payment', compact('orderOfPayments'));
    }

 

    public function editOrderOfPayment($id){

        $orderOfPayment = OrderOfPayment::findOrFail($id);
        $application = ApplicationForm::findOrFail($orderOfPayment->application_form_id);
        return view('admin.CRUD.edit-order-of-payment',compact('orderOfPayment','application'));
    }

    public function updateOrderOfPayment(Request $request,$id){
        $data = $request->validate([
            'paymentAmount' => 'required',
            'orNumber' => 'required',
        ]);

        $orderOfPayment = OrderOfPayment::findOrFail($id);
        $orderOfPayment->payment_amount = $request->paymentAmount;
        $orderOfPayment->or_number = $request->orNumber;
        $orderOfPayment->save();
        return redirect('admin/dashboard/order-of-payment');
    }

    //BUtterfly 

    public function showWilfLifePermit(){
        $wildlifePermits = Permit::paginate(10);
        return view('admin.dashboard.admin-dashboard-wildlife-permit', compact('wildlifePermits'));
    }

    
    
    public function editWildLifePermit($id){

        $permit = Permit::findOrFail($id);
        return view('admin.CRUD.edit-wildlife-permit', compact('permit'));
    
    }

    public function updateWildLifePermit(Request $request, $id){
        
        $permit = Permit::findOrFail($id);
        $permitId = $permit->id;
        $data = $request->validate([
            'permitType' => 'required|in:wfp,wcp',
            'permitNo' => 'required|unique:permits,permit_no,' . $permitId,
            'businessName' => 'required',
            'ownerName' =>'required',
            'address' => 'required',
            'issueDate' => 'required|date',
            'expirationDate' => 'required|date',
        ]);
        
      
        $permit->permit_type = $request->permitType;
        $permit->permit_no = $request->permitNo;
        $permit->business_name = $request->businessName;
        $permit->owner_name = $request->ownerName;
        $permit->address = $request->address;
        $permit->issue_date = $request->issueDate;
        $permit->expiration_date = $request->expirationDate;
        $permit->save();

       return redirect('admin/dashboard/wildlife-permits');
    }
    public function addButterflySpecies(){
        return view('admin.add-butterfly');
    }


    public function editButterflySpecies($id){
        $butterflies = ButterflySpecies::findOrFail($id);
        return view('admin.CRUD.edit-butterfly', compact('butterflies'));
    }

    public function viewButterflySpecies($id){
        $butterflies = ButterflySpecies::findOrFail($id);
        return view('admin.users.view-butterfly', compact('butterflies'));
    }

    public function storeButterflySpecies(Request $request){
        $data = $request->validate([
            'speciesType' => 'required',
            'className' => 'required',
            'familyName' => 'required',
            'commonName' => 'required',
            'scientificName' => 'required',
            'description' => 'required',

        ]);


        $butterflySp = ButterflySpecies::create([
            'species_type' => $request->speciesType,
            'class_name' => $request->className,
            'family_name' => $request->familyName,
            'common_name' => $request->commonName,
            'scientific_name' => $request->scientificName,
            'description' => $request->description,
        ]);
       return redirect('/admin/dashboard/butterfly-sp');
    }
    public function updateButterflySpecies(Request $request, $id){
        $data = $request->validate([
            'speciesType' => 'required',
            'className' => 'required',
            'familyName' => 'required',
            'commonName' => 'required',
            'scientificName' => 'required',
            'description' => 'required',
        ]);

        $butterflySp = ButterflySpecies::findOrFail($id);
        $butterflySp->species_type = $request->speciesType;
        $butterflySp->class_name = $request->className;
        $butterflySp->family_name = $request->familyName;
        $butterflySp->common_name = $request->commonName;
        $butterflySp->scientific_name = $request->scientificName;
        $butterflySp->description = $request->description;
        $butterflySp->save();
        return redirect('admin/dashboard/reports');

    }
   
    public function deleteButterflySpecies($id)
    {
       $butterfly = ButterflySpecies::findOrFail($id);
       $butterfly->delete();
        return redirect('/admin/dashboard/reports')->with('success', 'Application deleted successfully.');
    
    }

  


    public function releasePermitShow($id){
         $applicationForm = ApplicationForm::findOrFail($id);
         return view('admin.CRUD.release-permit', compact('applicationForm'));
    }

}
