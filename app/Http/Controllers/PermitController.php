<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use App\Models\Butterfly;
use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermitController extends Controller
{
    public function AddWildLifePermit(Request $request){
       
        $data = $request->validate([
            'permitType' => 'required',
            'permitNo' => 'required',
        ]);
       
        
        $permit = Permit::Create([            
            'permit_type' => $request->permitType,
            'permit_no' => $request->permitNo
        ]);

        return redirect('/');
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
        ]);

        $applicationForm =  new ApplicationForm();
        $applicationForm->user_id = Auth::user()->id;
        $applicationForm->name = $request->name;
        $applicationForm->address = $request->address;
        $applicationForm->transport_address = $request->transportAddress;
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

        foreach($butterflies as $butterfly){
            $butterflyDB = new Butterfly();
            $butterflyDB->user_id = Auth::user()->id;
            $butterflyDB->butterfly_name = $butterfly['name'];
            $butterflyDB->quantity = $butterfly['quantity'];
            $butterflyDB->save();
        }
        
       
       return redirect('/');
       
     
    }

}
