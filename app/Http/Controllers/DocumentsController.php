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
    public function store(Request $request)
    {
        $newDocument = new Documents;
        $newDocument->provider_id = $request->provider_id;
        $newDocument->doc_number = $request->doc_numbe;
        $newDocument->doc_date = $request->doc_date;
        $newDocument->doc_type = $request->doc_type; // 1: Input Doc, 2: Output Doc.
        $newDocument->to_pharmacy = $request->to_pharmacy;
        $newDocument->to_name = $request->to_name;
        $newDocument->sender_name = $request->sender_name;
        $newDocument->sender_job_title = $request->sender_job_title;
        $newDocument->receiver_name = $request->receiver_name;
        $newDocument->receiver_job_title = $request->receiver_job_title;
        $newDocument->manager_name = $request->manager_name;
        $newDocument->approved_by = $request->approved_by;
        $newDocument->approved_at = $request->approved_at;
        $newDocument->created_by = auth('sanctum')->user()->id;
        $newDocument->created_at = Carbon::now();
        $newDocument->save();

        // Store documents items
//        foreach ($item in $newItem) {
//
//    }
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
