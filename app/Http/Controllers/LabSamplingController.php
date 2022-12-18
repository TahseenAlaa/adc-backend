<?php

namespace App\Http\Controllers;

use App\Models\MedicalLab;
use App\Models\Patients;
use App\Models\PatientsHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LabSamplingController extends Controller
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
            MedicalLab::where('id', '=', $request->test_id)
                ->update([
                    'sampling_status' => true,
                    'sampling_by'     => auth('sanctum')->user()->id,
                    'sampling_at'     => Carbon::now()
                ]);

        return $this->show($request->patient_uuid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $patientId = Patients::select('id')->where('uuid', '=', $uuid)->first();
        $patientHistoryId = PatientsHistory::select('id')->where('patient_id', '=', $patientId->id)->orderBy('id', 'desc')->latest()->first();


        $patientTestsList = MedicalLab::where('patient_history_id', '=', $patientHistoryId->id)
            ->with([
                'user:id,full_name',
                'testGroups:id,test_group,test_name,created_by'
            ])
            ->get();

        return response([
            'data' => $patientTestsList
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
