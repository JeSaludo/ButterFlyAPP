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
        
       
       return redirect('/');//add msg with successfull
       
     
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
        
       
       return redirect('/');//add msg with successfull
       
     
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
            $filename = date('YmdHis') . '-' . $pdfFile->getClientOriginalName();
            $pdfFile->move(public_path('ltpPermit'), $filename);
                       
            $application->ltp_name = $filename;          
            $application->ltp_path = 'ltpPermit/' . $filename;
            $application->status = "Released";
            $application->save();
           
           
            return redirect('/admin/dashboard/applications');
        }
    
      
    }

    public function PrintLTP($id){

        $applicationForm = ApplicationForm::findOrFail($id);

        $pdfPath = $applicationForm->ltp_path;
        $absolutePdfPath = public_path($pdfPath);

        if (file_exists($absolutePdfPath)) {
            return response()->file($absolutePdfPath);
        } else {
            abort(404, 'File not found');
        }
       // $applicationForm = ApplicationForm::findOrFail($id);
//
       // $pdfPath = $applicationForm->ltp_path;
        
      //  $absolutepdfPath = public_path($pdfPath);
        
       // if (file_exists($absolutepdfPath)) {
       ///     return response()->file($absolutepdfPath, [
       //         'Content-Disposition' => 'attachment; filename="' . $applicationForm->ltp_name . '"',
        //    ]);
       // } else {
       //     abort(404, 'File not found');
        //}
    }

}
