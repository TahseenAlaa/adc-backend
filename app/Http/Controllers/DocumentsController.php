<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\DocumentsItems;
use App\Models\Providers;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $availableDrugs = DocumentsItems::where('doc_type', '=', 1)
            ->where('calc_quantity', '>=', 1)
            ->with([
                'drugs:id,title'
            ])
            ->get();

        return response([
            'data' => $availableDrugs
        ]);
    }

    public function indexOutputDocuments() {
        return response([
            'data' => Documents::where('doc_type', '=', 2)
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
        } else if ($request->doc_type === 2) { // Output Document
            $newDocument->destination_id = $request->destination_id;
            $newDocument->provider_id = Providers::select('id')->where('title', '=', 'Alhasan Diabetes Center')->first()->id;
        }
        $newDocument->destination_name = $request->destination_name;
        $newDocument->destination_ref = $request->destination_reference;
        $newDocument->destination_job_title = $request->destination_job_title;
        $newDocument->doc_type = $request->doc_type; // 1: Input Doc, 2: Output Doc.
        $newDocument->to_pharmacy = $request->to_pharmacy;
        $newDocument->final_approval = $request->final_approval;
        $newDocument->approved_by = $request->approved_by;
        $newDocument->approved_at = $request->approved_at;
        $newDocument->created_by = auth('sanctum')->user()->id;
        $newDocument->created_at = Carbon::now();
        $newDocument->save();

        // Store documents items
        foreach ($request->newItems as $item) {
            $newDocumentItem = new DocumentsItems;
            $newDocumentItem->drug_id = $item['name'];
            $newDocumentItem->quantity = $item['quantity'];
            $newDocumentItem->notes = $item['notes'];
            $newDocumentItem->parent_doc = $newDocument->id;
            $newDocumentItem->batch_no = $item['batch'];
            $newDocumentItem->expire_date = $item['expire_date'];
            $newDocumentItem->doc_type = $request->doc_type;
            $newDocumentItem->to_pharmacy = $request->to_pharmacy;
            if ($request->doc_type === 2) { /* Output Document */ // TODO Validation Calc_quantity >= 1
                $newDocumentItem->calc_quantity = $request->calc_quantity;
            } else if ($request->doc_type === 1) {
                $newDocumentItem->calc_quantity = $item['quantity'];
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
