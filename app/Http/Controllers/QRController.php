<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Http\JsonResponse;

class QRController extends Controller
{
    public function DownloadQR($id){
        $applicationForm = ApplicationForm::findOrFail($id);
        $filePath = $applicationForm->qr_code;
        $absoluteFilePath = storage_path('app/public/' . $filePath);

        if (file_exists($absoluteFilePath)) {
            return response()->download($absoluteFilePath, $applicationForm->qr_code_name);
        } else {
            abort(404, 'File not found');
        }

        
        return redirect('/myapplication/show-submit');
    }


    public function ShowQRDashboard(){
        return view('admin.scan-qr-code');
    }
    public function updateStatus(Request $request)
    {
        $applicationId = $request->input('application_id');

        // Find the application by ID and update the status
        $application = ApplicationForm::findOrFail($applicationId);
        $application->status = 'Used';
        $application->save();

        return new JsonResponse(['status' => 'success']);
    }
}
