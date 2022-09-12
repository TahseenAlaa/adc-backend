<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiagnosisResource;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use App\Http\Requests\DiagnosisStoreRequest;

class DiagnosisController extends Controller
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
    public function store(DiagnosisStoreRequest $request)
    {
        $newDiagnosis = new Diagnosis;
        $newDiagnosis->patient_history_id = $request->patient_history_id;
        $newDiagnosis->symptoms           = $request->symptoms;
        $newDiagnosis->is_confirmed       = $request->is_confirmed;
        $newDiagnosis->clinical_notes     = $request->clinical_notes;
        $newDiagnosis->created_by         = 1; // TODO use Auth ID
        $newDiagnosis->save();

        return response([
            'data' => $newDiagnosis
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
