<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use App\Models\OrderOfPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use chillerlan\QRCode\{QRCode, QROptions};
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
        
            
            return redirect('/myapplication/show-submit');
        }
        
        if($orderOfPayment->or_number === $request->orNumber){
            if ($request->hasFile('signature')) {
                $file = $request->file('signature');
                $fileName = date('YmdHis') . '-Signature-' . $application->id . '.' . $file->getClientOriginalExtension();
            
                $filePath = $file->storeAs('signatures', $fileName, 'public');
            
                $application->file_name = $fileName;
                $application->file_path = $filePath;

                $applicationID = ApplicationForm::findOrFail($id);
               
               
               $options = new QROptions([
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'eccLevel' => QRCode::ECC_L,
                'scale' => 10,
                ]);
                $qrName = date('YmdHis') . '-QRCode-'. $applicationID->id  . '.png';
                
                $qrPath = 'qrcodes/' . $qrName;
                $qrcode = new QRCode($options);
                $qrcode->render($applicationID->id, storage_path('app/public/' . $qrPath));
                
                

                $application->qr_code = $qrPath;
                $application->qr_code_name = $qrName;
               

                $application->save();
            
                $orderOfPayment->status = "paid";
                $orderOfPayment->save();
            
                return redirect('/myapplication/show-submit');//msg
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
