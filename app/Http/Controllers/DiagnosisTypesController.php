<?php

namespace App\Http\Controllers;

use App\Models\DiagnosisTypesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiagnosisTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosisList = DiagnosisTypesModel::with([
                'user:id,full_name',
                'updatedUser:id,full_name',
            ])->get();

        return response([
            'data' => $diagnosisList
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
        $newDiagnosis = new DiagnosisTypesModel;
        $newDiagnosis->title = $request->title;
        $newDiagnosis->created_by = auth('sanctum')->user()->id;
        $newDiagnosis->created_at = Carbon::now();
        $newDiagnosis->updated_at = Carbon::now();
        $newDiagnosis->save();

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
        DiagnosisTypesModel::where('id', '=', $request->id)->update([
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
        DiagnosisTypesModel::where('id', '=', $request->id)->delete();

        return $this->index();
    }
}
