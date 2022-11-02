<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\DocumentsItems;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentsController extends Controller
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
    public function store(Request $request) // TODO validation request
    {
        $newDocument = new Documents;
        $newDocument->provider_id = $request->provider_id;
        $newDocument->source_ref = $request->source_reference;
        $newDocument->source_name = $request->source_name;
        $newDocument->source_job_title = $request->source_job_title;
        $newDocument->destination_ref = $request->destination_reference;
        $newDocument->destination_name = $request->destination_name;
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
            $newDocumentItem->drug_id = $item['name'];
            $newDocumentItem->quantity = $item['quantity'];
            $newDocumentItem->notes = $item['notes'];
            $newDocumentItem->parent_doc = $newDocument->id;
            $newDocumentItem->batch_no = $item['batch'];
            $newDocumentItem->expire_date = $item['expire_date'];
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
