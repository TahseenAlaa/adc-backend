<?php

namespace App\Http\Controllers;

use App\Models\SymptomsTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SymptomsTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $symptomsTypes = SymptomsTypes::with([
            'user:id,full_name',
            'updatedUser:id,full_name',
        ])->get();

        return response([
            'data' => $symptomsTypes
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
        $newSymptom = new SymptomsTypes;
        $newSymptom->title = $request->title;
        $newSymptom->created_by = auth('sanctum')->user()->id;
        $newSymptom->created_at = Carbon::now();
        $newSymptom->updated_at = Carbon::now();
        $newSymptom->save();

        return $this->index();
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
    public function update(Request $request)
    {
        SymptomsTypes::where('id', '=', $request->id)->update([
            'title' => $request->title,
            'updated_by' => auth('sanctum')->user()->id,
            'updated_at' => Carbon::now()
        ]);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        SymptomsTypes::where('id', '=', $request->id)->delete();

        return $this->index();
    }
}
