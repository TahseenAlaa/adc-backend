<?php

namespace App\Http\Controllers;
use App\Models\Patients;

class InvoiceController extends Controller
{
    public function patientInfoInvoice($uuid) {
        return view('invoice-patient-info');
    }

    public function ReceptionInfoInvoice ($uuid) {
        if (!is_null($uuid)) {
            $patientInfo = Patients::select('id', 'full_name', 'phone')
                ->where('uuid', '=', $uuid)
                ->first();
            return view('invoice-reception', [
                'patientInfo' => $patientInfo
            ]);
        } else {
            return null;
        }
    }
}
