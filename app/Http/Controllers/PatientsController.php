<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;
use App\Http\Resources\PatientsResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\PatientsStoreRequest;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        // Fetch all patients records
        return PatientsResource::collection(Patients::all());
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
    public function store(PatientsStoreRequest $request)
    {
        // Store new patient data
        $newPatient = new Patients;
        $newPatient->full_name       = $request->full_name;
        $newPatient->phone           = $request->phone;
        $newPatient->occupation      = $request->occupation;
        $newPatient->gender          = $request->gender;
        $newPatient->birthdate       = $request->birthdate;
        $newPatient->address         = $request->address;
        $newPatient->smoker          = $request->smoker;
        $newPatient->drinker         = $request->drinker;
        $newPatient->family_dm       = $request->family_dm;
        $newPatient->gestational_dm  = $request->gestational_dm;
        $newPatient->weight_baby     = $request->weight_baby;
        $newPatient->hypert          = $request->hypert;
        $newPatient->family_ihd      = $request->family_ihd;
        $newPatient->parity          = $request->parity;
        $newPatient->smbg            = $request->smbg;
        $newPatient->ihd             = $request->ihd;
        $newPatient->cva             = $request->cva;
        $newPatient->pvd             = $request->pvd;
        $newPatient->neuro           = $request->neuro;
        $newPatient->weight          = $request->weight;
        $newPatient->height          = $request->height;
        $newPatient->wc              = $request->wc;
        $newPatient->bmi             = $request->bmi;
        $newPatient->hip             = $request->hip;
        $newPatient->retino          = $request->retino;
        $newPatient->nonpro          = $request->nonpro;
        $newPatient->prolif          = $request->prolif;
        $newPatient->macul           = $request->macul;
        $newPatient->insul           = $request->insul;
        $newPatient->amput           = $request->amput;
        $newPatient->ed              = $request->ed;
        $newPatient->nafld           = $request->nafld;
        $newPatient->dermo           = $request->dermo;
        $newPatient->dfoot           = $request->dfoot;
        $newPatient->date_insulin    = $request->date_insulin;
        $newPatient->duration_insulin = $request->duration_insulin;
        $newPatient->duration_dm     = $request->duration_dm;
        $newPatient->glycemic        = $request->glycemic;
        $newPatient->lipid           = $request->lipid;
        $newPatient->pressure        = $request->pressure;
        $newPatient->f_height        = $request->f_height;
        $newPatient->m_height        = $request->m_height;
        $newPatient->mid_height      = $request->mid_height;
        $newPatient->fa1c            = $request->fa1c;
        $newPatient->sa2c            = $request->sa2c;
        $newPatient->referral        = $request->referral;
        $newPatient->created_by      = $request->created_by;
        $newPatient->updated_by      = $request->updated_by;
        $newPatient->save();

        return response([
            'data' => new PatientsResource($newPatient)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return AnonymousResourceCollection
     */
    public function show($id)
    {
        // Get patients by id
        return PatientsResource::collection(Patients::where('id', '=', $id)->get());
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
