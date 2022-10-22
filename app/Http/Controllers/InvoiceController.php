<?php

namespace App\Http\Controllers;
use App\Models\Patients;
use App\Models\PatientsHistory;

class InvoiceController extends Controller
{
    public function patientInfoInvoice($uuid) {
        if (!is_null($uuid)) {
            $patientInfo = Patients::where('uuid', '=', $uuid)->first();
            $patientHistory = PatientsHistory::where('patient_id', '=', $patientInfo->id)->orderBy('id', 'desc')->latest()->first();

            return view('invoice-patient-info', [
                'patientInfo'     => $patientInfo,
                'patientHistory'  => $patientHistory
            ]);
        } else {
            return null;
        }
    }

    public function ReceptionInfoInvoice ($uuid) {
        if (!is_null($uuid)) {
            $patientInfo = Patients::select('id', 'full_name', 'phone', 'created_at')
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
