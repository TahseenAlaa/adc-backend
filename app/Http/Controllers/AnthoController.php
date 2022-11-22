<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\PatientsHistory;
use Illuminate\Http\Request;

class AnthoController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->patient_history_uuid) {
            $getPatientLatestVisitHistory = PatientsHistory::where('uuid', '=', $request->patient_history_uuid)->orderBy('id', 'desc')->latest()->first();

        } else if ($request->patient_uuid) {
            $getPatientInfo = Patients::where('uuid', '=', $request->patient_uuid)->first();
            $getPatientLatestVisitHistory = PatientsHistory::where('patient_id', '=', $getPatientInfo->id)->orderBy('id', 'desc')->latest()->first();
        }

        return response([
            'patient_latest_history' => $getPatientLatestVisitHistory,
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
