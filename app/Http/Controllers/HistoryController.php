<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Documents;
use App\Models\DocumentsItems;
use App\Models\MedicalLab;
use App\Models\Patients;
use App\Models\PatientsHistory;
use App\Models\Symptoms;
use App\Models\Treatment;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function getPatientHistoryIdFromPatientHistoryUUID($patient_history_uuid) {
        return PatientsHistory::select(['id', 'patient_id'])
            ->where('uuid', '=', $patient_history_uuid)
            ->first();
    }

    public function index(Request $request)
    {
        $getPatientId = Patients::select('id')->where('uuid', '=', $request->patient_uuid)->first();

        return response([
            'data' => PatientsHistory::select(['id', 'uuid', 'created_at'])
                ->where('patient_id', '=', $getPatientId->id)
                ->distinct()
                ->get()
        ]);
    }

    public function showSymptoms(Request $request) {
        $patientHistoryId = $this->getPatientHistoryIdFromPatientHistoryUUID($request->patient_history_uuid);
        $symptomWithUser = Symptoms::where('patient_history_id', '=', $patientHistoryId->id)
            ->with([
                'user:id,full_name',
                'updatedUser:id,full_name',
                'symptom:id,title'
            ])
            ->get();

        return response([
            'data' => $symptomWithUser,
        ]);
    }

    public function showTreatments(Request $request) {
        $patientHistoryId = $this->getPatientHistoryIdFromPatientHistoryUUID($request->patient_history_uuid);

        return response([
            'data' => Treatment::where('patient_history_id', '=', $patientHistoryId->id)
                ->with([
                    'user:id,full_name',
                    'updatedUser:id,full_name',
                    'drugs:id,title,drug_type',
                ])->get()
        ]);
    }

    public function showTests(Request $request) {
        $patientHistoryId = $this->getPatientHistoryIdFromPatientHistoryUUID($request->patient_history_uuid);

        $patientTestsList = MedicalLab::where('patient_history_id', '=', $patientHistoryId->id)
            ->with([
                'user:id,full_name',
                'updatedUser:id,full_name',
                'samplingUser:id,full_name',
                'resultUser:id,full_name',
                'testGroups'
            ])
            ->get();

        return response([
            'data' => $patientTestsList
        ]);
    }

    public function showDiagnosis(Request $request) {
        $patientHistoryId = $this->getPatientHistoryIdFromPatientHistoryUUID($request->patient_history_uuid);

        $diagnosisWithUser = Diagnosis::where('patient_history_id', '=', $patientHistoryId->id)
            ->with([
                'user:id,full_name',
                'updatedUser:id,full_name',
                'diagnosis:id,title'
            ])
            ->get();

        return response([
            'data' => $diagnosisWithUser,
        ]);
    }

    public function showPatientHistory(Request $request) {
        return response([
            'data' => PatientsHistory::where('uuid', '=', $request->patient_history_uuid)->first()
        ]);

    }

    public function showDrugsHistory(Request $request) {
        $patientHistoryId = $this->getPatientHistoryIdFromPatientHistoryUUID($request->patient_history_uuid);

        return response([
            'data' => DocumentsItems::where('to_patient', '=', $patientHistoryId->patient_id)
            ->with([
                'user:id,full_name',
                'updatedUser:id,full_name',
                'drugs:id,title,drug_type'
            ])
            ->get()
        ]);
    }
}
