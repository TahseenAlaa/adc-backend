<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiagnosisResource;
use App\Models\Diagnosis;
use App\Models\Patients;
use App\Models\PatientsHistory;
use Illuminate\Http\Request;
use App\Http\Requests\DiagnosisStoreRequest;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $diagnosis = DiagnosisResource::collection(Diagnosis::where('patient_id', '=', $id)->get());

        return response([
            'data' => $diagnosis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiagnosisStoreRequest $request)
    {
        $patientId = Patients::select('id')->where('uuid', '=', $request->patient_uuid)->first();
        $patientHistoryId = PatientsHistory::select('id')->where('patient_id', '=', $patientId->id)->orderBy('id', 'desc')->latest()->first();

        $newDiagnosis = new Diagnosis;
        $newDiagnosis->patient_id         = $patientId->id;
        $newDiagnosis->patient_history_id = $patientHistoryId->id;
        $newDiagnosis->symptoms           = $request->symptoms;
        $newDiagnosis->is_confirmed       = $request->is_confirmed;
//        $newDiagnosis->clinical_notes     = $request->clinical_notes;
        $newDiagnosis->created_by         = auth('sanctum')->user()->id;
        $newDiagnosis->save();

        $getDoctorName = auth('sanctum')->user()->full_name;

        return response([
            'data'        => $newDiagnosis,
            'doctor_name' => $getDoctorName
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnosis = DiagnosisResource::collection(Diagnosis::where('patient_history_id', '=', $id)->get());

        return response([
            'data' => $diagnosis
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
