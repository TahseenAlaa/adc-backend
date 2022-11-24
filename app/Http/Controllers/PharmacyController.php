<?php

namespace App\Http\Controllers;

use App\Http\Resources\PharmacyResource;
use App\Models\Documents;
use App\Models\DocumentsItems;
use App\Models\MedicalLab;
use App\Models\Patients;
use App\Models\Pharmacy;
use App\Http\Requests\PharmacyStoreRequest;
use App\Http\Requests\PharmacyUpdateRequest;
use App\Models\Treatment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inputDrugsOnly = DocumentsItems::where('doc_type', '=', 1)->with('drugs:id,title,drug_type')->get();
        $outputDrugs = DocumentsItems::where('doc_type', '=', 2)->with('drugs:id,title')->get();

        foreach ($inputDrugsOnly as $in) {
            $in['diff'] = 0;
            foreach ($outputDrugs as $out) {
                if ($in->drug_id === $out->drug_id && $in->batch_no === $out->batch_no && $in->expire_date === $out->expire_date) {

                    if (
                        $out->to_pharmacy <> 0 &&
                        $out->to_patient === null
                    ) {
                        $in['diff'] += $out->quantity;

                        // Check to patient ?
                    } else if (
                        $out->to_pharmacy <> 0 &&
                        $out->to_patient <> null
                    ) {
                        $in['diff'] -= $out->quantity;

                        // Check output to others ?
                    } else if (
                        $out->to_pharmacy === 0 &&
                        $out->to_patient === null
                    ) {
                        $in['diff'] -= $out->quantity;
                    }
                }
            }
        }

        return response([
            'data' => $inputDrugsOnly
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
    public function store(PharmacyStoreRequest $request)
    {
        $patientId = Patients::select('id')->where('uuid', '=', $request->patient_uuid)->first();
        $patientHistoryId = MedicalLab::select('patient_history_id')->where('patient_id', '=', $patientId->id)->orderBy('id', 'desc')->latest()->first();


        $newDrug = new Pharmacy;
        $newDrug->patient_id           = $patientId->id;
        $newDrug->patient_history_id   = $patientHistoryId->patient_history_id;
        $newDrug->name                 = $request->name;
        $newDrug->batch_no             = $request->batch_no;
        $newDrug->expire_date          = $request->expire_date;
        $newDrug->treatment_type       = $request->treatment_type;
        $newDrug->dosage               = $request->dosage;
        $newDrug->quantity             = $request->quantity;
        $newDrug->notes                = $request->notes;
        $newDrug->created_by           = auth('sanctum')->user()->id;
        $newDrug->save();

        return response([
            'data' => $newDrug
        ]);
    }

    public function storeTreatment(Request $request) {
        $patientId = Patients::select('id')->where('uuid', '=', $request->patient_uuid)->first();

        // Update Treatment status
        foreach ($request->treatments as $item) {
            Treatment::where('id', '=', $item['id'])->update([
                'status'      => 1,
                'updated_by'  => auth('sanctum')->user()->id
            ]);
        }

        // Set output document to patient
        $newDoc = new Documents;
        $newDoc->doc_type = 2;
        $newDoc->to_pharmacy = 0;
        $newDoc->created_by = auth('sanctum')->user()->id;
        $newDoc->save();

        // Store documents items
        foreach ($request->newItems as $item) {
            $newDocumentItem = new DocumentsItems;
            $newDocumentItem->drug_id = $item['drug_id'];
            $newDocumentItem->notes = $item['notes'];
            $newDocumentItem->parent_doc = $newDoc->id;
            $newDocumentItem->batch_no = $item['batch'];
            $newDocumentItem->expire_date = $item['expire_date'];
            $newDocumentItem->doc_type = 2;
            $newDocumentItem->to_pharmacy = 0;
            $newDocumentItem->to_patient = $patientId->id;
            $newDocumentItem->quantity = $item['quantity'];
            $newDocumentItem->created_by = auth('sanctum')->user()->id;
            $newDocumentItem->created_at = Carbon::now();
            $newDocumentItem->save();
        }

        return response([
            'data' => 'Stores successfully'
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
        return response([
            'data' => PharmacyResource::collection(Pharmacy::where('id', '=', $id)->get())
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
    public function update(PharmacyUpdateRequest $request, $id)
    {
        Pharmacy::where('id', '=', $id)->update([
            'name'              => $request->name,
            'batch_no'          => $request->batch_no,
            'expire_date'       => $request->expire_date,
            'treatment_type'    => $request->treatment_type,
            'dosage'            => $request->dosage,
            'quantity'          => $request->quantity,
            'notes'             => $request->notes,
            'updated_by'        => 1 // TODO add AUTH ID
        ]);

        return response([
            'data' => PharmacyResource::collection(Pharmacy::where('id', '=', $id)->get())
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
        Pharmacy::where('id', '=', $id)->delete();

        return response(['Item deleted successfully!']);
    }
}
