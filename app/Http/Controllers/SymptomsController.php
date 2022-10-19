<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\PatientsHistory;
use App\Models\Symptoms;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SymptomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request) //TODO Request Validation
    {
        $patientId = Patients::select('id')->where('uuid', '=', $request->patient_uuid)->latest()->first();
        $patientHistoryId = PatientsHistory::select('id')->where('patient_id', '=', $patientId->id)->orderBy('id', 'desc')->latest()->first();

        $newSymptoms = new Symptoms;
        $newSymptoms->patient_id           = $patientId->id;
        $newSymptoms->patient_history_id   = $patientHistoryId->id;
        $newSymptoms->symptoms_id          = $request->symptoms_type_id;
        $newSymptoms->clinical_notes       = $request->symptoms_notes;
        $newSymptoms->created_by           = auth('sanctum')->user()->id;
        $newSymptoms->save();

        $symptomWithUser = Symptoms::with([
            'user:id,full_name',
            'symptom:id,title'
        ])
            ->orderBy('id', 'desc')
            ->latest()
            ->first();

        return response([
            'data' => $symptomWithUser,
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
        //
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
