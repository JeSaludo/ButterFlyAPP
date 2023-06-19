<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permit;
use App\Models\User;
use App\Models\Butterfly;
use App\Models\Verifytoken;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyApprove;
use App\Mail\WelcomeMail;
class UserCRUDController extends Controller
{ 
    public function edit($id)
    {
        $user = User::find($id);       
        return view('user.profile', compact('user'));
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
            if ($user->role === 1 && $user->wfp_permit !== $permit) {
                $user->role = 0;
                $user->save();
            }
        }
    
        if (!empty($wcpPermit)) {
            $permit = Permit::where('permit_type', 'wcp')
            ->where('permit_no', $wcpPermit)
            ->where('expiration_date', '>=', now())
            ->first();

            if (!$permit) {
                return back()->withErrors([
                    'wcp_permit' => 'Invalid or expired WCP permit.',
                ])->withInput();
            }
            if ($user->role === 1 && $user->wcp_permit !== $permit) {
                $user->role = 0;
                $user->save();
            }
        }
        $user->first_name = $data['firstName'];
        $user->last_name = $data['lastName'];
        $user->username = $data['username'];
        $user->business_name = $data['businessName'];
        $user->owner_name = $data['ownerName'];
        $user->address = $data['address'];
        $user->contact = $data['contact'];
        $user->email = $data['email'];
        $user->wcp_permit = $wcpPermit;
        $user->wfp_permit = $wfpPermit;
        $user->save();
        
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }   
      
        return redirect('/')->with('success', 'User updated successfully');
    }

    public function ShowSubmitApplicationForm(Request $request){
        $currentUserId = auth()->user()->id;
        $searchTerm = $request->input('search');
        $sort = $request->input('sort', 'latest');
        $forms = ApplicationForm::with(['butterflies', 'orderOfPayment'])
            ->where('is_draft', false)
            ->where('user_id', $currentUserId);
           
        if ($searchTerm) {
            $forms->where(function ($query) use ($searchTerm) {
                $query->where('id', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('status', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        if ($sort === 'oldest') {
            $forms->orderBy('id', 'asc');
        } else {
            $forms->orderBy('id', 'desc');
        }

        $usersWithPermit = $forms->paginate(10)->appends(['sort' => $sort, 'search' => $searchTerm]);

        return view('user.dashboard-view-submitted-form', compact('usersWithPermit','sort', 'searchTerm'));
    }

    public function ShowDraftApplicationForm(Request $request){
        $currentUserId = auth()->user()->id;
        $sort = $request->input('sort', 'latest');
        $forms = ApplicationForm::with(['butterflies', 'orderOfPayment'])
            ->where('is_draft', true)
            ->where('user_id', $currentUserId);
           

        if ($sort === 'oldest') {
            $forms->orderBy('created_at', 'asc');
        } else {
            $forms->orderBy('created_at', 'desc');
        }

        $usersWithPermit = $forms->paginate(10)->appends(['sort' => $sort]);

        return view('user.dashboard-view-draft-form', compact('usersWithPermit','sort'));
    }

    public function deleteApplication(ApplicationForm $form)
    {
        $form->delete();    
        return redirect()->route('myapplications.draft.show')->with('success', 'Application deleted successfully.');
    }

    public function viewApplication($id){

        $form = ApplicationForm::with('butterflies')->findOrFail($id);
        return view('user.view-application', compact('form'));
    
    }

    public function editApplication($id)
    {
        $form = ApplicationForm::with('butterflies')->findOrFail($id);
        $butterflies = Butterfly::all();
    
        return view('user.edit-application', compact('form', 'butterflies'));
    }
    
    public function updateApplication(Request $request,$id){
       
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'transportAddress' => 'required',
            'transportDate' => 'required',            
            'modeOfTransport' => 'required',
            'purpose' => 'required',
          
        ]);
      
        $form = ApplicationForm::findOrFail($id);
        
        $form->name = $request->name;
        $form->address = $request->address;
        $form->transport_address = $request->transportAddress;
        $form->purpose = $request->purpose;
        $form->transport_date = $request->transportDate;
        $form->mode_of_transport = $request->modeOfTransport;
        $form->is_draft = false;
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

        return redirect()->route('myapplications.draft.show');
        
    }

    public function editReturnedApplication($id)
    {
        $form = ApplicationForm::with('butterflies')->findOrFail($id);
        $butterflies = Butterfly::all();

        $form->file_name = null;
        $form->file_path = null;
        $form->ltp_name = null;
        $form->ltp_path = null;
        $form->qr_code = null;
        $form->qr_code_name = null;
        $form->remarks = null;
        $form->released_date = null;
        $form->release_by = null;
        $form->expiration_date = null;
        $form->accepted_by = null;
        $form->save();
    
        return view('user.edit-application-returned', compact('form', 'butterflies'));
    }
}
