<?php

namespace App\Http\Controllers;

use App\Http\Resources\PharmacyResource;
use App\Models\Pharmacy;
use App\Http\Requests\PharmacyStoreRequest;
use App\Http\Requests\PharmacyUpdateRequest;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'date' => PharmacyResource::collection(Pharmacy::all())
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
        $newDrug = new Pharmacy;
        $newDrug->name              = $request->name;
        $newDrug->batch_no          = $request->batch_no;
        $newDrug->expire_date       = $request->expire_date;
        $newDrug->treatment_type    = $request->treatment_type;
        $newDrug->dosage            = $request->dosage;
        $newDrug->quantity          = $request->quantity;
        $newDrug->notes             = $request->notes;
        $newDrug->created_by        = 1; // TODO add AUTH ID
        $newDrug->save();

        return response([
            'data' => $newDrug
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
