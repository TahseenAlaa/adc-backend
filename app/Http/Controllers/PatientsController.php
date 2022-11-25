<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientsHistoryResource;
use App\Models\Diagnosis;
use App\Models\MedicalLab;
use App\Models\Patients;
use App\Models\PatientsHistory;
use App\Models\Pharmacy;
use App\Models\Treatment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Resources\PatientsResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\PatientsStoreRequest;
use Illuminate\Http\Response;
use App\Http\Requests\PatientsUpdateRequest;
use Illuminate\Support\Str;


class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        // Fetch all patients records
        return response([
            'data' => Patients::with([
                'user:id,full_name',
                'updatedUser:id,full_name',
            ])->get()
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
        // START Store new patient data
        $newPatient = new Patients;
        $newPatient->uuid                        = Str::uuid()->toString();
        $newPatient->full_name                   = $request->full_name;
        $newPatient->birthday                    = $request->birthday;
        $newPatient->phone                       = $request->phone;
        $newPatient->occupation                  = $request->occupation;
        $newPatient->gender                      = $request->gender;
        $newPatient->patient_number              = $request->patient_number;
        $newPatient->education_qualification     = $request->education_qualification;
        $newPatient->marital_status              = $request->marital_status;
        $newPatient->social_status               = $request->social_status;
        $newPatient->address                     = $request->address;
        $newPatient->smoker                      = $request->smoker;
        $newPatient->drinker                     = $request->drinker;
        $newPatient->family_dm                   = $request->family_dm;
        $newPatient->gestational_dm              = $request->gestational_dm;
        $newPatient->weight_baby                 = $request->weight_of_baby_at_birthday;
        $newPatient->hypertension                = $request->hypertension;
        $newPatient->family_ihd                  = $request->family_history_of_ihd;
        $newPatient->parity                      = $request->parity;
        $newPatient->smbg                        = $request->smbg;
        $newPatient->ihd                         = $request->ihd;
        $newPatient->cva                         = $request->cva;
        $newPatient->pvd                         = $request->pvd;
        $newPatient->neuropathy                  = $request->neuropathy;
        $newPatient->retinopathy                 = $request->retinopathy;
        $newPatient->non_proliferative           = $request->non_proliferative;
        $newPatient->proliferative_dr            = $request->proliferative_dr;
        $newPatient->maculopathy                 = $request->maculopathy;
        $newPatient->insulin                     = $request->insulin;
        $newPatient->amputation                  = $request->amputation;
        $newPatient->ed                          = $request->ed;
        $newPatient->nafld                       = $request->nafld;
        $newPatient->dermopathy                  = $request->dermopathy;
        $newPatient->diabetic_food               = $request->diabetic_food;
        $newPatient->date_insulin                = $request->date_insulin;
        $newPatient->duration_insulin            = Carbon::parse($request->date_insulin)->age;
        $newPatient->date_dm                     = $request->date_of_dm;
        $newPatient->duration_dm                 = Carbon::parse($request->date_of_dm)->age;
        $newPatient->glycemic_control            = $request->glycemic_control;
        $newPatient->lipid_control               = $request->lipid_control;
        $newPatient->pressure_control            = $request->pressure_control;
        $newPatient->first_a1c                   = $request->first_a1c;
        $newPatient->referral                    = $request->referral;
        $newPatient->notes                       = $request->notes;
        $newPatient->last_visit                  = Carbon::now();
        $newPatient->created_by                  = auth('sanctum')->user()->id;
        $newPatient->save();
        // END Store new patient data

        // START Create Patient history
        $newPatientHistory = new PatientsHistory;
        $newPatientHistory->uuid                        = Str::uuid()->toString();
        $newPatientHistory->patient_id                  = $newPatient->id;
        $newPatientHistory->age_at_visit                = Carbon::parse($newPatient->birthday)->age;
        $newPatientHistory->created_by                  = auth('sanctum')->user()->id;
        $newPatientHistory->save();
        // END Create Patient history

        return response([
            'data' => $newPatient
        ]);
//
//            if ($request->hasFile('patient_picture'))  {
//                $newPatientHistory->addMediaFromRequest('patient_picture')
//                    ->usingName(Carbon::now()->format('d_M_Y,_h_m_s_a'))
//                    ->usingFileName(Carbon::now()->format('d_M_Y,_h_m_s_a') . '.jpg')
//                    ->withResponsiveImages()
//                    ->toMediaCollection('patient_picture');
//            }
//            $newPatientHistory->save();
//
//            if (isset($newPatientHistory->getMedia('patient_picture')[0])) {
//                // Patient with History
//                $getPatientInfo = PatientsResource::collection(
//                    Patients::where('id', '=', $newPatient->id)
//                        ->with('patientHistory')
//                        ->get());
//
//                return response([
//                    'data' => $getPatientInfo,
//                    'picture' => PatientsHistoryResource::collection(PatientsHistory::where('patient_id', '=', $getPatientInfo[0]->id)->get())[0]->getMedia('patient_picture')[0]->original_url
//                ], 200);
//            }
//
//            // Only pationt
//            return response([
//                'data' => PatientsResource::collection(PatientsHistory::where('id', '=', $newPatient->id)->get())
//            ], 200);
//        }
//
//        return response([
//            'data' => 'Error!'
//        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Response|ResponseFactory
     */
    public function show(Request $request)
    {
        if ($request->patient_history_uuid) {
            $getPatientLatestVisitHistory = PatientsHistory::where('uuid', '=', $request->patient_history_uuid)->orderBy('id', 'desc')->latest()->first();
            $getPatientInfo = Patients::where('id', '=', $getPatientLatestVisitHistory->patient_id)->first();

        } else if ($request->patient_uuid) {
            // Patient with History
            $getPatientInfo = Patients::where('uuid', '=', $request->patient_uuid)->first();
            $getPatientLatestVisitHistory = PatientsHistory::where('patient_id', '=', $getPatientInfo->id)->orderBy('id', 'desc')->latest()->first();
        }

        return response([
            'patient_info'           => $getPatientInfo,
            'patient_latest_history' => $getPatientLatestVisitHistory,
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
        "birthdate"       => $request->birthdate,
        "gender"          => $request->gender,
        "last_visit"      => Carbon::now(),
        "updated_by"      => auth('sanctum')->user()->id,
        ]);

        // Update patient history
        $updatePatientHistory = PatientsHistory::where('patient_id', '=', $id)->latest()->first()->update([
            "occupation"      => $request->occupation,
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
            "updated_by"      => auth('sanctum')->user()->id
        ]);

        // Store patient picture
        if ($request->hasFile('patient_picture')) {
            try {
                PatientsHistory::where('patient_id', '=', $id)->latest()->first()->clearMediaCollection('patient_picture');
            } finally {
                PatientsHistory::where('patient_id', '=', $id)->latest()->first()->addMediaFromRequest('patient_picture')
                    ->usingName(Carbon::now()->format('d_M_Y,_h_m_s_a'))
                    ->usingFileName(Carbon::now()->format('d_M_Y,_h_m_s_a') . '.jpg')
                    ->withResponsiveImages()
                    ->toMediaCollection('patient_picture');
            }
        }


            // Patient with History
            $getPatientInfo = PatientsResource::collection(
                Patients::where('id', '=', $id)
                    ->with('patientHistory')
                    ->get());


            if ($getPatientInfo[0]->patientHistory[0]->getMedia('patient_picture')) {
                return response([
                    'data' => $getPatientInfo,
                    'picture' => $getPatientInfo[0]->patientHistory[0]->getMedia('patient_picture')[0]->original_url
                ], 200);
            } else {
                return response([
                    'data' => $getPatientInfo,
                ], 200);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Request $request)
    {
        // Delete patient record (Soft Delete)
        try {
            Patients::find($request->id)->delete();

            return response([
                'date' => $this->index(),
                'result' => 'Delete Succeed!'
            ]);
        } catch (\Exception $e) {
            return response([
                'data' => $this->index(),
                'result' => 'Delete Failed!' . $e
            ]);
        }
    }

    /** Search patients by full name
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
//    public function searchByFullName(Request $request) {
//
//        $patientInfo = Patients::select(['uuid', 'full_name', 'phone', 'birthday', 'gender', 'updated_at'])
//            ->where('full_name', 'LIKE', '%' . $request->name . '%')
//            ->get();
//
//        return response([
//            'data' => $patientInfo
//        ]);
//    }

    /** Search patients by phone
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
//    public function searchByPhone(Request $request) {
//
//        $patientInfo = Patients::select(['uuid', 'full_name', 'phone', 'birthday', 'gender', 'updated_at'])
//            ->where('phone', '=', $request->phone)
//            ->get();
//
//        return response([
//            'data' => $patientInfo
//        ]);
//    }

    /** Search patients by Patient ID
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
//    public function searchByPatientId(Request $request) {
//
//        $PatientInfo = Patients::select(['uuid', 'full_name', 'phone', 'birthday', 'gender', 'updated_at'])
//            ->where('id', '=', $request->patient)
//            ->get();
//
//        return response([
//            'data' => $PatientInfo
//        ]);
//    }

    public function searchForPatient(Request $request) {
        if ($request->department === 'reception') {
            if (!is_null($request->patient)) {
                $patientInfo = Patients::select(['id', 'gender', 'patient_number', 'uuid', 'full_name', 'phone', 'birthday', 'updated_at','last_visit'])
                    ->where('id', '=', $request->patient)
                    ->with('latestPatientHistory')
                    ->get();
                return response([
                    'data' => $patientInfo
                ]);
            } else if (!is_null($request->patient_number)) {
                $patientInfo = Patients::select(['id', 'gender', 'patient_number', 'uuid', 'full_name', 'phone', 'birthday', 'updated_at','last_visit'])
                    ->where('patient_number', '=', $request->patient_number)
                    ->with('latestPatientHistory')
                    ->get();
                return response([
                    'data' => $patientInfo
                ]);
            } else if (!is_null($request->phone)) {
                $patientInfo = Patients::select(['id', 'gender', 'patient_number', 'uuid', 'full_name', 'phone', 'birthday', 'updated_at','last_visit'])
                    ->where('phone', '=', $request->phone)
                    ->with('latestPatientHistory')
                    ->get();
                return response([
                    'data' => $patientInfo
                ]);
            } else if (!is_null($request->full_name)) {
                $patientInfo = Patients::select(['id', 'gender', 'patient_number', 'uuid', 'full_name', 'phone', 'birthday', 'updated_at','last_visit'])
                    ->where('full_name', 'LIKE', '%' . $request->full_name . '%')
                    ->with('latestPatientHistory')
                    ->get();
                return response([
                    'data' => $patientInfo
                ]);
            }

        } else {
            if (!is_null($request->patient)) {
                $patientInfo = Patients::select(['id', 'gender', 'patient_number', 'uuid', 'full_name', 'phone', 'birthday', 'updated_at', 'last_visit'])
                    ->whereDate('last_visit', Carbon::today())
                    ->where('id', '=', $request->patient)
                    ->with('latestPatientHistory')
                    ->get();
                return response([
                    'data' => $patientInfo
                ]);
            } else if (!is_null($request->patient_number)) {
                    $patientInfo = Patients::select(['id', 'gender', 'patient_number', 'uuid', 'full_name', 'phone', 'birthday', 'updated_at','last_visit'])
                        ->whereDate('last_visit', Carbon::today())
                        ->where('patient_number', '=', $request->patient_number)
                        ->with('latestPatientHistory')
                        ->get();
                    return response([
                        'data' => $patientInfo
                    ]);

            } else if (!is_null($request->phone)) {
                $patientInfo = Patients::select(['id', 'gender', 'patient_number', 'uuid', 'full_name', 'phone', 'birthday', 'updated_at','last_visit'])
                    ->whereDate('last_visit', Carbon::today())
                    ->where('phone', '=', $request->phone)
                    ->with('latestPatientHistory')
                    ->get();
                return response([
                    'data' => $patientInfo
                ]);

            } else if (!is_null($request->full_name)) {
                $patientInfo = Patients::select(['id', 'gender', 'patient_number', 'uuid', 'full_name', 'phone', 'birthday', 'updated_at','last_visit'])
                    ->whereDate('last_visit', Carbon::today())
                    ->where('full_name', 'LIKE', '%' . $request->full_name . '%')
                    ->with('latestPatientHistory')
                    ->get();
                return response([
                    'data' => $patientInfo
                ]);
            }
        }
        return response([
            'data' => ''
        ]);
    }

    public function storePatientNewVisit(Request $request) {
        $patientId = Patients::select('id', 'birthday')->where('uuid', '=', $request->patient_uuid)->first();

        // Store patient history
        $newPatientHistory = new PatientsHistory;
        $newPatientHistory->patient_id                 = $patientId->id;
        $newPatientHistory->uuid                       = Str::uuid()->toString();
        $newPatientHistory->patient_id                 = $patientId->id;
        $newPatientHistory->age_at_visit               = Carbon::parse($patientId->birthday)->age;
        $newPatientHistory->created_by                 = auth('sanctum')->user()->id;
        $newPatientHistory->save();

        // Update patient last visit date
        Patients::where('uuid', '=', $request->patient_uuid)
            ->update([
                'last_visit' => Carbon::now()
            ]);

        return response([
            'data' => 'Store Successfully!',
        ]);
    }

    public function getDoctorNamebyId($doctorId) {
      return User::select('full_name')->where('id', '=', $doctorId)->first();
    }

    public function getPatientInfoForNewVisit(Request $request) {
        $patientInfo = Patients::select('patient_number', 'birthday')->where('uuid', '=', $request->patient_uuid)->first();
        return response([
            'age'             => Carbon::parse($patientInfo->birthday)->age,
            'patient_number'  => $patientInfo->patient_number
        ]);
    }

    public function showPatientHistory(Request $request) {
        $patientId = Patients::select('id')->where('uuid', '=', $request->patient_uuid)->first();

        return response([
            'data' => PatientsHistory::where('patient_id', '=', $patientId->id)->orderBy('created_at', 'desc')->latest()->first()
        ]);
    }

    public function showPatientInfo(Request $request) {
        return response([
            'data' => Patients::where('uuid', '=', $request->patient_uuid)->first()
        ]);
    }

    public function updatePatientHistory(Request $request) {
        $getPatientInfo = Patients::where('uuid', '=', $request->patient_uuid)->first();
        $getPatientLatestVisitHistory = PatientsHistory::where('patient_id', '=', $getPatientInfo->id)->orderBy('id', 'desc')->latest()->first();

        PatientsHistory::where('id', '=', $getPatientLatestVisitHistory->id)->update([
            'clinical_notes'               => $request->clinical_notes,
            'next_visit'                   => $request->next_visit,
            'updated_by'                   => auth('sanctum')->user()->id
        ]);

        return response([
            'data' => 'Store Successfully!'
        ]);
    }

    public function updatePatientHistoryByAntho(Request $request, $uuid) {
        PatientsHistory::where('uuid', '=', $uuid)->update([
            'weight'                       => $request->weight,
            'height'                       => $request->height,
            'waist_circumference'          => $request->waist_circumference,
            'hip'                          => $request->hip,
            'bmi'                          => $request->bmi,
            'father_height'                => $request->father_height,
            'mother_height'                => $request->mother_height,
            'mid_height'                   => $request->mid_height,
            'blood_pressure_systolic'      => $request->blood_pressure_systolic,
            'blood_pressure_diastolic'     => $request->blood_pressure_diastolic,
            'updated_by'                   => auth('sanctum')->user()->id
        ]);

        return response([
            'data' => 'Store Successfully!'
        ]);
    }

    public function fetchGender(Request $request) {
        return response([
            'data' => Patients::select('id', 'gender')->where('uuid', '=', $request->patient_uuid)->first()
        ]);
    }
}
