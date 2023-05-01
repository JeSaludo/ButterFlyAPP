<?php

namespace App\Http\Controllers;

use App\Models\Butterfly;
use App\Models\Permit;
use Illuminate\Http\Request;

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
        

       
    }

}
