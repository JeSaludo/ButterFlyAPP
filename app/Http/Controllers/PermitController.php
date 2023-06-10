<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use App\Models\Butterfly;
use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PermitController extends Controller
{
    public function AddWildLifePermit(Request $request){
       
        $data = $request->validate([
            'permitType' => 'required|in:wfp,wcp',
            'permitNo' => 'required|unique:permits,permit_no',
            'businessName' => 'required',
            'ownerName' =>'required',
            'address' => 'required',
            'issueDate' => 'required|date',
            'expirationDate' => 'required|date',
        ]);
    
        $permit = Permit::create([
            'permit_type' => $request->permitType,
            'permit_no' => $request->permitNo,
            'business_name' => $request->businessName,
            'owner_name' => $request->ownerName,
            'address' => $request->address,
            'issue_date' => $request->issueDate,
            'expiration_date' => $request->expirationDate,
        ]);

        return redirect('/admin/dashboard');
    }



    public function ApplyApplication(){

    }

    public function ShowApplyPermit(){
        return view('user.apply-permit');
    }

    public function RegisterApplication(Request $request){
        
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'transportAddress' => 'required',
            'transportDate' => 'required',            
            'modeOfTransport' => 'required',
            'purpose' => 'required',
            'butterfly_name.*' => 'required',
            'butterfly_quantity.*' => 'required',
        ]);

        $applicationForm =  new ApplicationForm();
        $applicationForm->user_id = Auth::user()->id;
        $applicationForm->name = $request->name;
        $applicationForm->address = $request->address;
        $applicationForm->transport_address = $request->transportAddress;
        $applicationForm->purpose = $request->purpose;
        $applicationForm->transport_date = $request->transportDate;
        $applicationForm->mode_of_transport = $request->modeOfTransport;
        $applicationForm->is_draft = false;
        $applicationForm->save();

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

        foreach($butterflies as $butterfly){
            $butterflyDB = new Butterfly();
            $butterflyDB->application_forms_id = $applicationForm->id;
            $butterflyDB->name = $butterfly['name'];
            $butterflyDB->quantity = $butterfly['quantity'];
            $butterflyDB->save();
        }
        
       
       return redirect('myapplication/show-submit');//add msg with successfull
       
     
    }

    public function DraftApplication(Request $request){
       
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'transportAddress' => 'required',
            'transportDate' => 'required',            
            'modeOfTransport' => 'required',
            'purpose' => 'required',
            'butterfly_name.*' => 'required',
            'butterfly_quantity.*' => 'required',
        ]);
        // add validation

        $applicationForm =  new ApplicationForm();
        $applicationForm->user_id = Auth::user()->id;
        $applicationForm->name = $request->name;
        $applicationForm->address = $request->address;
        $applicationForm->transport_address = $request->transportAddress;
        $applicationForm->purpose = $request->purpose;
        $applicationForm->transport_date = $request->transportDate;
        $applicationForm->mode_of_transport = $request->modeOfTransport;
        $applicationForm->is_draft = true;
        $applicationForm->save();

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

        foreach($butterflies as $butterfly){
            $butterflyDB = new Butterfly();
            $butterflyDB->application_forms_id = $applicationForm->id;
            $butterflyDB->name = $butterfly['name'];
            $butterflyDB->quantity = $butterfly['quantity'];
            $butterflyDB->save();
        }
        
       
       return redirect('/myapplication/show-draft');//add msg with successfull
       
     
    }

    public function CreatePermit(){
        return view('admin.add-wildlife-permit');
    }
    public function uploadLTP(Request $request, $id)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:50000', // Validate file type and maximum size
        ]);

        $application = ApplicationForm::findOrFail($id);
        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $filename = date('YmdHis') . '-Permit-' . $pdfFile->getClientOriginalName();
        
            $filePath = $pdfFile->storeAs('ltpPermit', $filename, 'public');
        
            $application->ltp_name = $filename;
            $application->ltp_path = $filePath;
            $application->status = "Released";
            $application->save();
        
            return redirect('/admin/dashboard/applications');
        }
    
      
    }

    public function SaveDraftedtApplication(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'address' => 'required',
        'transportAddress' => 'required',
        'transportDate' => 'required',
        'modeOfTransport' => 'required',
        'purpose' => 'required',
        'butterfly_name.*' => 'required',
        'butterfly_quantity.*' => 'required',
    ]);

    $existingDraft = ApplicationForm::where('transport_date', $request->transportDate)
        ->where('is_draft', true)
        ->first();

    if ($existingDraft) {
        // Update the existing draft instead of creating a new one
        $applicationForm = $existingDraft;
    } else {
        // Create a new draft
        $applicationForm = new ApplicationForm();
        $applicationForm->is_draft = true;
    }

    $applicationForm->user_id = Auth::user()->id;
    $applicationForm->name = $request->name;
    $applicationForm->address = $request->address;
    $applicationForm->transport_address = $request->transportAddress;
    $applicationForm->purpose = $request->purpose;
    $applicationForm->transport_date = $request->transportDate;
    $applicationForm->mode_of_transport = $request->modeOfTransport;
    $applicationForm->save();

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

    // Delete existing butterflies associated with the draft
    $applicationForm->butterflies()->delete();

    foreach ($butterflies as $butterfly) {
        $butterflyDB = new Butterfly();
        $butterflyDB->application_forms_id = $applicationForm->id;
        $butterflyDB->name = $butterfly['name'];
        $butterflyDB->quantity = $butterfly['quantity'];
        $butterflyDB->save();
    }

    return redirect('/myapplication/show-draft');//add msg with successfull
}


    public function PrintLTP($id){

        $applicationForm = ApplicationForm::findOrFail($id);
        $pdfPath = $applicationForm->ltp_path;
        $absolutePdfPath = storage_path('app/public/' . $pdfPath);

        if (file_exists($absolutePdfPath)) {
            return response()->file($absolutePdfPath);
        } else {
            abort(404, 'File not found');
        }

    
    }

}
