<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\DocumentsItems;
use App\Models\Drugs;
use App\Models\Providers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexInventory()
    {
        return response([
            'data' => Documents::where('doc_type', '=', 1)
                ->with([
                    'user:id,full_name',
                    'updatedUser:id,full_name',
                    'source:id,title',
                    'destination:id,title'
                ])
                ->orderBy('id', 'desc')
                ->get() // 1: mean Inside the inventory
        ]);
    }

    public function indexAvailableDrugs() {

        $inputDrugsOnly = DocumentsItems::where('doc_type', '=', 1)->with('drugs:id,title')->get();
        $outputDrugs = DocumentsItems::where('doc_type', '=', 2)->with('drugs:id,title')->get();

        foreach ($inputDrugsOnly as $in) {
            $in['diff'] = $in->quantity;
            foreach ($outputDrugs as $out) {
                if ($in->drug_id === $out->drug_id && $in->batch_no === $out->batch_no && $in->expire_date === $out->expire_date) {

                    if (
                        $out->to_pharmacy <> 0 &&
                        $out->to_patient === null
                    ) {
                        $in['diff'] -= $out->quantity;

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


//        $documentsList = Documents::with('items')->get();
//        $newDocumentsList = [];
//        $inputInInventory = [];
//        $inPharmacy = [];
//        $outputToPatient = [];
//        $outputToOthers = [];
//
//        foreach ($documentsList as $item) {
//
//            $inputInInventory = DocumentsItems::select('id', 'quantity', 'drug_id')
//                ->where('drug_id', '=', $item->drug_id)
//                ->where('doc_type', '=', 1)
//                ->where('to_pharmacy', '=', null)
//                ->where('to_patient', '=', null)
//                ->with([
//                    'drugs:id,title'
//                ])->get();
//
//            $inPharmacy = DocumentsItems::select('id', 'quantity', 'drug_id')
//                ->where('drug_id', '=', $item->drug_id)
//                ->where('doc_type', '=', 2)
//                ->where('to_pharmacy', '=', 1)
//                ->where('to_patient', '=', null)
//                ->with([
//                    'drugs:id,title'
//                ])->get();
//
//            $outputToPatient = DocumentsItems::select('id', 'quantity', 'drug_id')
//                ->where('drug_id', '=', $item->drug_id)
//                ->where('doc_type', '=', 2)
//                ->where('to_pharmacy', '=', 1)
//                ->where('to_patient', '<>', null)
//                ->with([
//                    'drugs:id,title'
//                ])->get();
//
//            $outputToOthers = DocumentsItems::select('id', 'quantity', 'drug_id')
//                ->where('drug_id', '=', $item->drug_id)
//                ->where('doc_type', '=', 2)
//                ->where('to_pharmacy', '=', 0)
//                ->where('to_patient', '=', null)
//                ->with([
//                    'drugs:id,title'
//                ])->get();
//        }
//
//
//
//        return response([
//            'inputInInventory' => $inputInInventory,
//            'inPharmacy'       => $inPharmacy,
//            'outputToPatient'  => $outputToPatient,
//            'outputToOthers'   => $outputToOthers
//        ]);

    }

    public function indexOutputDocuments() {

        return response([
            'data' => Documents::where('doc_type', '=', 2)
                ->where('provider_id', '<>', null)
                ->with([
                    'user:id,full_name',
                    'updatedUser:id,full_name',
                    'source:id,title',
                    'destination:id,title'
                ])
                ->orderBy('id', 'desc')
                ->get() // 2: mean Output Document
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
    public function store(Request $request) // TODO validation request
    {
        $newDocument = new Documents;
        $newDocument->source_name = $request->source_name;
        $newDocument->source_ref = $request->source_reference;
        $newDocument->source_job_title = $request->source_job_title;
        if ($request->doc_type === 1) { // Input Document
            $newDocument->destination_id = Providers::select('id')->where('title', '=', 'Alhasan Diabetes Center')->first()->id;
            $newDocument->provider_id = $request->provider_id;
            $newDocument->to_pharmacy = false;
            $newDocument->destination_name = 'Inventory';
        } else if ($request->doc_type === 2) { // Output Document
            $newDocument->destination_id = $request->destination_id;
            $newDocument->provider_id = Providers::select('id')->where('title', '=', 'Alhasan Diabetes Center')->first()->id;
            $newDocument->to_pharmacy = $request->to_pharmacy;
            $newDocument->destination_name = $request->destination_name;
        }
        $newDocument->destination_ref = $request->destination_reference;
        $newDocument->destination_job_title = $request->destination_job_title;
        $newDocument->doc_type = $request->doc_type; // 1: Input Doc, 2: Output Doc.
        $newDocument->final_approval = $request->final_approval;
        $newDocument->approved_by = $request->approved_by;
        $newDocument->approved_at = $request->approved_at;
        $newDocument->created_by = auth('sanctum')->user()->id;
        $newDocument->created_at = Carbon::now();
        $newDocument->save();

        // Store documents items
        foreach ($request->newItems as $item) {
            $newDocumentItem = new DocumentsItems;
            $newDocumentItem->drug_id = $item['drug_id'];
            $newDocumentItem->notes = $item['notes'];
            $newDocumentItem->parent_doc = $newDocument->id;
            $newDocumentItem->batch_no = $item['batch'];
            $newDocumentItem->expire_date = $item['expire_date'];
            $newDocumentItem->doc_type = $request->doc_type;
            if ($request->doc_type === 2) { /* Output Document */
                $newDocumentItem->to_pharmacy = $request->to_pharmacy;
                $newDocumentItem->to_patient = $request->to_patient;
                $newDocumentItem->quantity = $item['diff'];

            } else if ($request->doc_type === 1) { // Input Document
                $newDocumentItem->to_pharmacy = false;
                $newDocumentItem->to_patient = null;
                $newDocumentItem->quantity = $item['quantity'];
            }
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
     * @param
     * @return \Illuminate\Http\Response
     */
    public function showInputDocument(Request $request) {
        $getDocumentInfo = Documents::where('id', '=', $request->doc_id)->with([
            'items'
        ])->first();

        return response([
            'data' => $getDocumentInfo
        ]);
    }

    public function showOutputDocument(Request $request) {
        $getDocumentInfo = Documents::where('id', '=', $request->doc_id)->with([
            'items'
        ])->first();

        return response([
            'data' => $getDocumentInfo
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
     * @param
     * @return \Illuminate\Http\Response
     */
    public function destroyInputDocument(Request $request)
    {
        if ($request->id) {
//             Delete Document
            $getDocument = Documents::where('id', '=',$request->id)->first();
            Documents::where('id', '=',$request->id)->delete();

            // Delete Drugs related to this document
            DocumentsItems::where('parent_doc', '=', $getDocument->id)->delete();

            return $this->indexInventory();
        }

        return response([
            'data' => 'Error'
        ]);
    }

    public function destroyOutputDocument(Request $request)
    {
        if ($request->id) {
            // Delete Document
            $getDocument = Documents::where('id', '=',$request->id)->first();
            Documents::where('id', '=',$request->id)->delete();

            // Delete Drugs related to this document
            DocumentsItems::where('parent_doc', '=', $getDocument->id)->delete();

            return $this->indexOutputDocuments();
        }

        return response([
            'data' => 'Error'
        ]);
    }
}
