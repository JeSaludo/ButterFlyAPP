<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use App\Models\OrderOfPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function ShowGetPermit($id){
        $form = ApplicationForm::findOrFail($id);
        
        return view('user.order-receipt-add', compact('form'));
    }

    public function StoreUserSignatories($id, Request $request){
        $data = $request->validate([
            'orNumber' => 'required',
            'signature' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        
        
        $application = ApplicationForm::findOrFail($id);

        $orderOfPayment = OrderOfPayment::where('application_form_id', $id)->firstOrFail();
       
        if(!$orderOfPayment->or_number){
            //if null
            
            return redirect('/myapplication/show-submit');
        }
        
        if($orderOfPayment->or_number === $request->orNumber){
            if ($request->hasFile('signature')) {
                $file = $request->file('signature');
                $fileName = date('YmdHis') . '-' . $application->user_id . '.' . $file->getClientOriginalExtension();
            
                $filePath = $file->storeAs('signatures', $fileName, 'public');
            
                $application->file_name = $fileName;
                $application->file_path = $filePath;
            
                $application->save();
            
                $orderOfPayment->status = "paid";
                $orderOfPayment->save();
            
                return redirect('/myapplication/show-submit');
            }
            
            

        }
        else{
            return redirect('/myapplication/show-submit');
           //add here error mssg when back
        }    
    }

    public function download($id)
    {
        $applicationForm = ApplicationForm::findOrFail($id);
        $filePath = $applicationForm->file_path;
        $absoluteFilePath = storage_path('app/public/' . $filePath);

        if (file_exists($absoluteFilePath)) {
            return response()->download($absoluteFilePath, $applicationForm->file_name);
        } else {
            abort(404, 'File not found');
        }

        
        return redirect('/myapplication/show-submit');

    }
}
