<?php

namespace App\Http\Controllers;

use App\Http\Resources\TreatmentResource;
use App\Models\Treatment;
use Carbon\Carbon;
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
        $newTreatment->patient_id          = $request->patient_id;
        $newTreatment->patient_history_id  = $request->patient_history_id;
        $newTreatment->name                = $request->name;
        $newTreatment->drug_id             = $request->drug_id;
        $newTreatment->dose                = $request->dose;
        $newTreatment->status              = 0; // 0 -> Pending, 1 -> Done
        $newTreatment->created_by          = 1; // TODO add Auth ID
        if ($request->hasFile('patient_picture')) {
            $newTreatment->addMediaFromRequest('patient_picture')
                ->usingName(Carbon::now()->format('d_M_Y,_h_m_s_a'))
                ->usingFileName(Carbon::now()->format('d_M_Y,_h_m_s_a') . '_esite.jpg')
                ->withResponsiveImages()
                ->toMediaCollection('patient_picture');
        }
        $newTreatment->save();

        // TODO update pharmacy inventory

        if (isset($newTreatment->getMedia('patient_picture')[0])) {
            return response([
                'data'    => $newTreatment,
                'picture' => $newTreatment->getMedia('patient_picture')[0]->original_url
            ], 200);
        } else {
            return response([
                'data'    => $newTreatment,
            ], 200);
        }
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
    public function update(TreatmentUpdateRequest $request, $id)
    {
        // Update status
        Treatment::where('patient_history_id', '=', $id)->update([
            'drug_id'  => $request->drug_id,
            'name'     => $request->name,
            'dose'     => $request->dose,
            'status'   => $request->status,
            'updated_by' => 2 // TODO Auth ID
        ]);

        // Store patient history
        if ($request->hasFile('patient_picture')) {
            try {
                Treatment::where('patient_history_id', '=', $id)->latest()->first()->clearMediaCollection('patient_picture');
            } finally {
                Treatment::where('patient_id', '=', $id)->latest()->first()->addMediaFromRequest('patient_picture')
                    ->usingName(Carbon::now()->format('d_M_Y,_h_m_s_a'))
                    ->usingFileName(Carbon::now()->format('d_M_Y,_h_m_s_a') . '.jpg')
                    ->withResponsiveImages()
                    ->toMediaCollection('patient_picture');
            }
        }

        $getTreatmentInfo = Treatment::where('patient_history_id', '=', $id)->latest()->first();

        if (isset($getTreatmentInfo->getMedia('patient_picture')[0])) {
            return response([
                'data' => $getTreatmentInfo,
                'picture' => $getTreatmentInfo->getMedia('patient_picture')[0]->original_url
            ]);
        } else {
            return response([
                'data' => $getTreatmentInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Treatment::where('id', '=', $id)->delete();

        // TODO update pharmacy inventory

        return response([
            'data' => 'Items deleted successfully!'
        ]);



    }
}
