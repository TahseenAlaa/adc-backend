<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\PatientsHistory;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Resources\PatientsResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\PatientsStoreRequest;
use Illuminate\Http\Response;
use App\Http\Requests\PatientsUpdateRequest;


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
        $newPatient->birthdate       = $request->birthdate;
        $newPatient->gender          = $request->gender;
        $newPatient->last_visit      = Carbon::now();
        $newPatient->created_by      = 1; // TODO Auth ID
        $newPatient->save();

        if ($newPatient->exists) {
            // Store patient history
            $newPatientHistory = new PatientsHistory;
            $newPatientHistory->patient_id      = $newPatient->id;
            $newPatientHistory->patient_picture_id = 123;
            $newPatientHistory->occupation      = $request->occupation;
            $newPatientHistory->address         = $request->address;
            $newPatientHistory->smoker          = $request->smoker;
            $newPatientHistory->drinker         = $request->drinker;
            $newPatientHistory->family_dm       = $request->family_dm;
            $newPatientHistory->gestational_dm  = $request->gestational_dm;
            $newPatientHistory->weight_baby     = $request->weight_baby;
            $newPatientHistory->hypert          = $request->hypert;
            $newPatientHistory->family_ihd      = $request->family_ihd;
            $newPatientHistory->parity          = $request->parity;
            $newPatientHistory->smbg            = $request->smbg;
            $newPatientHistory->ihd             = $request->ihd;
            $newPatientHistory->cva             = $request->cva;
            $newPatientHistory->pvd             = $request->pvd;
            $newPatientHistory->neuro           = $request->neuro;
            $newPatientHistory->weight          = $request->weight;
            $newPatientHistory->height          = $request->height;
            $newPatientHistory->wc              = $request->wc;
            $newPatientHistory->bmi             = $request->bmi;
            $newPatientHistory->hip             = $request->hip;
            $newPatientHistory->retino          = $request->retino;
            $newPatientHistory->nonpro          = $request->nonpro;
            $newPatientHistory->prolif          = $request->prolif;
            $newPatientHistory->macul           = $request->macul;
            $newPatientHistory->insul           = $request->insul;
            $newPatientHistory->amput           = $request->amput;
            $newPatientHistory->ed              = $request->ed;
            $newPatientHistory->nafld           = $request->nafld;
            $newPatientHistory->dermo           = $request->dermo;
            $newPatientHistory->dfoot           = $request->dfoot;
            $newPatientHistory->date_insulin    = $request->date_insulin;
            $newPatientHistory->duration_insulin = $request->duration_insulin;
            $newPatientHistory->duration_dm     = $request->duration_dm;
            $newPatientHistory->glycemic        = $request->glycemic;
            $newPatientHistory->lipid           = $request->lipid;
            $newPatientHistory->pressure        = $request->pressure;
            $newPatientHistory->f_height        = $request->f_height;
            $newPatientHistory->m_height        = $request->m_height;
            $newPatientHistory->mid_height      = $request->mid_height;
            $newPatientHistory->fa1c            = $request->fa1c;
            $newPatientHistory->sa2c            = $request->sa2c;
            $newPatientHistory->referral        = $request->referral;
            $newPatientHistory->created_by      = 1; // TODO Auth ID
            $newPatientHistory->addMediaFromRequest('patient_picture')
                ->usingName(Carbon::now()->format('d_M_Y,_h_m_s_a'))
                ->usingFileName(Carbon::now()->format('d_M_Y,_h_m_s_a') . '.jpg')
                ->withResponsiveImages()
                ->toMediaCollection('patient_picture');
            $newPatientHistory->save();

            if ($newPatientHistory->exists) {
                // Patient with History
                $getPatientInfo = PatientsResource::collection(
                    Patients::where('id', '=', $newPatient->id)
                        ->with('patientHistory')
                        ->get());

                return response([
                    'data' => $getPatientInfo,
                    'picture' => $getPatientInfo[0]->patientHistory[0]->getMedia('patient_picture')[0]->original_url
                ], 200);
            }

            // Only pationt
            return response([
                'data' => PatientsResource::collection(PatientsHistory::where('id', '=', $newPatient->id)->get())
            ], 200);
        }

        return response([
            'data' => 'Error!'
        ], 500);
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
        return PatientsResource::collection(Patients::where('id', '=', $id)->with(['patientHistory'])->get());
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
