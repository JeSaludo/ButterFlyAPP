<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function ShowGetPermit($id){
        return view('user.order-receipt-add');
    }

    public function StoreUserSignatories($id , Request $request){
        $data = $request->validate([
            'orNumber' => 'required',
            'signature' => 'required|image',
        ]);

        $signature = $request->file('signature');
        $signaturePath = $signature->store('signatures', 'public');

        $application = ApplicationForm::findOrFail($id);
        $application->file_name = $signature->getClientOriginalName();
        $applicaiton->file_path = $signat




        $orNumber = $request->input('orNumber');
      


    }
}
