<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use App\Models\PatientsHistory;
use App\Models\Treatment;
use Illuminate\Http\Request;

class CommitteeApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all drug need committee approval
        $committeeDrugsList = Drugs::select('id')->where('drug_type', '=', 1)->get();


        // fetch all treatment contain drugs need approval and still pending
        $drugsListInTreatment = Treatment::whereIn('drug_id', $committeeDrugsList)
            ->where('status', '=', 0)
            ->with([
                'patient:id,full_name,phone,last_visit,uuid',
                'patient_history:id,uuid',
                'drugs:id,title',
                'user:id,full_name',
                'updatedUser:id,full_name',
                'committee_approvals'
            ])
            ->get();



        return response([
            'data' => $drugsListInTreatment
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
        //
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
