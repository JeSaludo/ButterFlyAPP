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

class UserCRUDController extends Controller
{
    public function ShowSubmitApplicationForm(){
        $currentUserId = auth()->user()->id;

        $usersWithPermit = User::where('id', $currentUserId)
        ->whereHas('applicationForms', function ($query) {
            $query->where('is_draft', false);
        })
        ->with(['applicationForms' => function ($query) {
            $query->where('is_draft', false);
        }, 'applicationForms.butterflies'])
        ->paginate(10);

        return view('user.dashboard-view-submitted-form', compact('usersWithPermit'));
    }

    public function ShowDraftApplicationForm(){
        $currentUserId = auth()->user()->id;

        $usersWithPermit = User::where('id', $currentUserId)
        ->whereHas('applicationForms', function ($query) {
            $query->where('is_draft', true);
        })
        ->with(['applicationForms' => function ($query) {
            $query->where('is_draft', true);
        }, 'applicationForms.butterflies'])
        ->paginate(10);

        return view('user.dashboard-view-draft-form', compact('usersWithPermit'));
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

    
}
