<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiagnosisResource;
use App\Models\Diagnosis;
use App\Models\DiagnosisTypesModel;
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

    public function types() {
        $diagnosisList = DiagnosisTypesModel::select('id', 'title')->get();

        return response([
            'data' => $diagnosisList
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
    public function store(Request $request)
    {
        $patientId = Patients::select('id')->where('uuid', '=', $request->patient_uuid)->first();
        $patientHistoryId = PatientsHistory::select('id')->where('patient_id', '=', $patientId->id)->orderBy('id', 'desc')->latest()->first();

        foreach ($request->diagnosis_id as $item) {
            $newDiagnosis = new Diagnosis;
            $newDiagnosis->patient_id         = $patientId->id;
            $newDiagnosis->patient_history_id = $patientHistoryId->id;
            $newDiagnosis->diagnosis_id       = $item;
            $newDiagnosis->diagnosis_notes    = $request->diagnosis_notes;
            $newDiagnosis->created_by         = auth('sanctum')->user()->id;
            $newDiagnosis->save();
        }


        return response([
            'data'        => $newDiagnosis,
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
