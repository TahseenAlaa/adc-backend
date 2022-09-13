<?php

namespace App\Http\Controllers;

use App\Http\Resources\TreatmentResource;
use App\Models\Treatment;
use Illuminate\Http\Request;
use App\Http\Requests\TreatmentStoreRequest;
use App\Http\Requests\TreatmentUpdateRequest;

class TreatmentController extends Controller
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
    public function store(TreatmentStoreRequest $request)
    {
        $newTreatment = new Treatment;
        $newTreatment->patient_id = $request->patient_id;
        $newTreatment->patient_history_id = $request->patient_history_id;
        $newTreatment->name = $request->name;
        $newTreatment->dose = $request->dose;
        $newTreatment->status = 0; // 0 -> Pending, 1 -> Done
        $newTreatment->created_by = 1; // TODO add Auth ID
        $newTreatment->save();

        return response([
            'data' => $newTreatment
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
        $treatmentList = TreatmentResource::collection(Treatment::where('patient_history_id', '=', $id)->get());
        return response([
            'data' => $treatmentList
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
        // Update status
        Treatment::where('patient_history_id', '=', $id)->update(['status' => $request->status]);

        // Fetch treatment data
        $updatedTreatment = TreatmentResource::collection(Treatment::where('patient_history_id', '=', $id)->get());

        return response([
            'data' => $updatedTreatment
        ]);
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
