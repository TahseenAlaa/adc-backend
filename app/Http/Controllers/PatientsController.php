<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Http\Resources\PatientsResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\PatientsStoreRequest;
use Illuminate\Http\Response;
use App\Http\Requests\PatientsUpdateRequest;
use App\Http\Requests\searchByFullNamePatientsRequest;
use App\Http\Requests\searchByPhonePatientsRequest;
use App\Http\Requests\searchByPatientIDPatientsRequest;


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
        $newPatient->created_by      = 1; // TODO Auth ID
        $newPatient->updated_by      = 2; // TODO Auth ID
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
     * @param PatientsUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(PatientsUpdateRequest $request, $id)
    {
        // Update patients data
        $updatePatient = Patients::where('id', '=', $id)->update([
        "full_name"       => $request->full_name,
        "phone"           => $request->phone,
        "occupation"      => $request->occupation,
        "gender"          => $request->gender,
        "birthdate"       => $request->birthdate,
        "address"         => $request->address,
        "smoker"          => $request->smoker,
        "drinker"         => $request->drinker,
        "family_dm"       => $request->family_dm,
        "gestational_dm"  => $request->gestational_dm,
        "weight_baby"     => $request->weight_baby,
        "hypert"          => $request->hypert,
        "family_ihd"      => $request->family_ihd,
        "parity"          => $request->parity,
        "smbg"            => $request->smbg,
        "ihd"             => $request->ihd,
        "cva"             => $request->cva,
        "pvd"             => $request->pvd,
        "neuro"           => $request->neuro,
        "weight"          => $request->weight,
        "height"          => $request->height,
        "wc"              => $request->wc,
        "bmi"             => $request->bmi,
        "hip"             => $request->hip,
        "retino"          => $request->retino,
        "nonpro"          => $request->nonpro,
        "prolif"          => $request->prolif,
        "macul"           => $request->macul,
        "insul"           => $request->insul,
        "amput"           => $request->amput,
        "ed"              => $request->ed,
        "nafld"           => $request->nafld,
        "dermo"           => $request->dermo,
        "dfoot"           => $request->dfoot,
        "date_insulin"    => $request->date_insulin,
        "duration_insulin" => $request->duration_insulin,
        "duration_dm"     => $request->duration_dm,
        "glycemic"        => $request->glycemic,
        "lipid"           => $request->lipid,
        "pressure"        => $request->pressure,
        "f_height"        => $request->f_height,
        "m_height"        => $request->m_height,
        "mid_height"      => $request->mid_height,
        "fa1c"            => $request->fa1c,
        "sa2c"            => $request->sa2c,
        "referral"        => $request->referral,
        "created_by"      => 1, // TODO Auth ID
        "updated_by"      => 2, // TODO Auth ID
        ]);

        return response([
            'data' => PatientsResource::collection(Patients::where('id', '=', $id)->get())
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|ResponseFactory|Response
     */
    public function destroy($id)
    {
        // Delete patient record (Soft Delete)
        try {
            Patients::find($id)->delete();

            return response([
                'date' => 'Delete Succeed!'
            ]);
        } catch (\Exception $e) {
            return response([
                'data' => 'Delete Failed!' . $e
            ]);
        }
    }

    /** Search patients by full name
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function searchByFullName(Request $request) {

        $patientInfo = Patients::select(['id', 'full_name', 'phone', 'birthdate', 'gender', 'updated_at'])
            ->where('full_name', 'LIKE', '%' . $request->name . '%')
            ->first();

        return response([
            'data' => $patientInfo
        ]);
    }

    /** Search patients by phone
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function searchByPhone(Request $request) {

        $patientInfo = Patients::select(['id', 'full_name', 'phone', 'birthdate', 'gender', 'updated_at'])
            ->where('phone', '=', $request->phone)
            ->first();

        return response([
            'data' => $patientInfo
        ]);
    }

    /** Search patients by Patient ID
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function searchByPatientId(Request $request) {

        $PatientInfo = Patients::select(['id', 'full_name', 'phone', 'birthdate', 'gender', 'updated_at'])
            ->where('id', '=', $request->patient)
            ->first();

        return response([
            'data' => $PatientInfo
        ]);
    }
}
