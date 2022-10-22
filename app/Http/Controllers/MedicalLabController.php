<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedicalLabResource;
use App\Models\MedicalLab;
use App\Models\Patients;
use App\Models\PatientsHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\MedicalLabStoreRequest;
use App\Http\Requests\MedicalLabUpdateRequest;

class MedicalLabController extends Controller
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
    public function store(Request $request) // TODO Request Validation
    {
        $patientId = Patients::select('id')->where('uuid', '=', $request->patient_uuid)->first();
        $patientHistoryId = PatientsHistory::select('id')->where('patient_id', '=', $patientId->id)->orderBy('id', 'desc')->latest()->first();

        $newTest = new MedicalLab;
        $newTest->patient_id                   = $patientId->id;
        $newTest->patient_history_id           = $patientHistoryId->id;
        $newTest->test_id                      = $request->test_id;
        $newTest->doctor_notes                 = $request->notes;
        $newTest->created_by                   = auth('sanctum')->user()->id;
        $newTest->created_at                   = Carbon::now();
        $newTest->save();

        $patientTestsList = MedicalLab::where('patient_history_id', '=', $patientHistoryId->id)
            ->with([
                'user:id,full_name',
                'testGroups:id,test_group,test_name,created_by'
            ])
            ->get();

        return response([
            'data' => $patientTestsList
        ]);

//        $newTest = new MedicalLab;
//        $newTest->test_name                    = $request->test_name;
//        $newTest->patient_id                   = $patientId->id;
//        $newTest->patient_history_id           = $patientHistoryId->id;
//        $newTest->dm_f_blood_glucose           = $request->dm_f_blood_glucose;
//        $newTest->dm_r_blood_glucose           = $request->dm_r_blood_glucose;
//        $newTest->dm_hb_aic_turbo              = $request->dm_hb_aic_turbo;
//        $newTest->dm_hb_aic_single_pr          = $request->dm_hb_aic_single_pr;
//        $newTest->dm_hb_aic_dual_pr            = $request->dm_hb_aic_dual_pr;
//        $newTest->dm_hb_aic_turbid             = $request->dm_hb_aic_turbid;
//        $newTest->dm_hypoglycemia              = $request->dm_hypoglycemia;
//        $newTest->dm_insulin                   = $request->dm_insulin;
//        $newTest->lipid_tg                     = $request->lipid_tg;
//        $newTest->lipid_hdl                    = $request->lipid_hdl;
//        $newTest->lipid_chol                   = $request->lipid_chol;
//        $newTest->lipid_ldl                    = $request->lipid_ldl;
//        $newTest->lipid_vldl                   = $request->lipid_vldl;
//        $newTest->lipid_non_hdl_c              = $request->lipid_non_hdl_c;
//        $newTest->lipid_ldh                    = $request->lipid_ldh;
//        $newTest->kidney_proteinuria           = $request->kidney_proteinuria;
//        $newTest->kidney_microalbuminuria      = $request->kidney_microalbuminuria;
//        $newTest->kidney_creatinine            = $request->kidney_creatinine;
//        $newTest->kidney_urea                  = $request->kidney_urea;
//        $newTest->kidney_bun                   = $request->kidney_bun;
//        $newTest->liver_s_albumin              = $request->liver_s_albumin;
//        $newTest->liver_total_protein          = $request->liver_total_protein;
//        $newTest->liver_ast                    = $request->liver_ast;
//        $newTest->liver_alt                    = $request->liver_alt;
//        $newTest->liver_ai_phos                = $request->liver_ai_phos;
//        $newTest->liver_cpk                    = $request->liver_cpk;
//        $newTest->electrolite_anion_gap        = $request->electrolite_anion_gap;
//        $newTest->electrolite_bicarb           = $request->electrolite_bicarb;
//        $newTest->electrolite_uric_acid        = $request->electrolite_uric_acid;
//        $newTest->electrolite_calcitonin       = $request->electrolite_calcitonin;
//        $newTest->electrolite_ca               = $request->electrolite_ca;
//        $newTest->electrolite_na               = $request->electrolite_na;
//        $newTest->electrolite_k                = $request->electrolite_k;
//        $newTest->electrolite_ci               = $request->electrolite_ci;
//        $newTest->electrolite_ferritin         = $request->electrolite_ferritin;
//        $newTest->electrolite_pth              = $request->electrolite_pth;
//        $newTest->electrolite_25_oh_wt_d       = $request->electrolite_25_oh_wt_d;
//        $newTest->electrolite_ttg_iga          = $request->electrolite_ttg_iga;
//        $newTest->ras_glucometer_type          = $request->ras_glucometer_type;
//        $newTest->ras_renin                    = $request->ras_renin;
//        $newTest->ras_aldosterone              = $request->ras_aldosterone;
//        $newTest->ras_arr                      = $request->ras_arr;
//        $newTest->ras_cp_peptide               = $request->ras_cp_peptide;
//        $newTest->thyroid_tsh                  = $request->thyroid_tsh;
//        $newTest->thyroid_ft4                  = $request->thyroid_ft4;
//        $newTest->thyroid_tt4                  = $request->thyroid_tt4;
//        $newTest->thyroid_tt3                  = $request->thyroid_tt3;
//        $newTest->endocrine_gad                = $request->endocrine_gad;
//        $newTest->endocrine_dhea_s             = $request->endocrine_dhea_s;
//        $newTest->endocrine_cortisol           = $request->endocrine_cortisol;
//        $newTest->endocrine_acth               = $request->endocrine_acth;
//        $newTest->endocrine_gh_basal           = $request->endocrine_gh_basal;
//        $newTest->endocrine_gh_1hr             = $request->endocrine_gh_1hr;
//        $newTest->endocrine_gh_2hr             = $request->endocrine_gh_2hr;
//        $newTest->notes                        = $request->test_notes;
//        $newTest->status                       = 0; // 0 -> Pending, 1 -> Done
//        $newTest->created_by                   = auth('sanctum')->user()->id;
//        $newTest->save();
//
//        $getDoctorName = auth('sanctum')->user()->full_name;

//        return response([
//            'data'          => $newTest,
//            'doctor_name'   => $getDoctorName
//        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $patientId = Patients::select('id')->where('uuid', '=', $uuid)->first();
        $patientHistoryId = PatientsHistory::select('id')->where('patient_id', '=', $patientId->id)->orderBy('id', 'desc')->latest()->first();


        $patientTestsList = MedicalLab::where('patient_history_id', '=', $patientHistoryId->id)
            ->with([
                'user:id,full_name',
                'testGroups:id,test_group,test_name,created_by'
            ])
            ->get();

        return response([
            'data' => $patientTestsList
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
    public function update(MedicalLabUpdateRequest $request)
    {
        $patientId = Patients::select('id')->where('uuid', '=', $request->patient_uuid)->first();
        $medicalLabId = MedicalLab::select('id')->where('patient_id', '=', $patientId->id)->orderBy('id', 'desc')->latest()->first();

        MedicalLab::where('id', '=', $medicalLabId->id)->update([
//            'test_name'                 => $request->test_name,
            'dm_f_blood_glucose'        => $request->dm_f_blood_glucose,
            'dm_r_blood_glucose'        => $request->dm_r_blood_glucose,
            'dm_hb_aic_turbo'           => $request->dm_hb_aic_turbo,
            'dm_hb_aic_single_pr'       => $request->dm_hb_aic_single_pr,
            'dm_hb_aic_dual_pr'         => $request->dm_hb_aic_dual_pr,
            'dm_hb_aic_turbid'          => $request->dm_hb_aic_turbid,
            'dm_hypoglycemia'           => $request->dm_hypoglycemia,
            'dm_insulin'                => $request->dm_insulin,
            'lipid_tg'                  => $request->lipid_tg,
            'lipid_hdl'                 => $request->lipid_hdl,
            'lipid_chol'                => $request->lipid_chol,
            'lipid_ldl'                 => $request->lipid_ldl,
            'lipid_vldl'                => $request->lipid_vldl,
            'lipid_non_hdl_c'           => $request->lipid_non_hdl_c,
            'lipid_ldh'                 => $request->lipid_ldh,
            'kidney_proteinuria'        => $request->kidney_proteinuria,
            'kidney_microalbuminuria'   => $request->kidney_microalbuminuria,
            'kidney_creatinine'         => $request->kidney_creatinine,
            'kidney_urea'               => $request->kidney_urea,
            'kidney_bun'                => $request->kidney_bun,
            'liver_s_albumin'           => $request->liver_s_albumin,
            'liver_total_protein'       => $request->liver_total_protein,
            'liver_ast'                 => $request->liver_ast,
            'liver_alt'                 => $request->liver_alt,
            'liver_ai_phos'             => $request->liver_ai_phos,
            'liver_cpk'                 => $request->liver_cpk,
            'electrolite_anion_gap'     => $request->electrolite_anion_gap,
            'electrolite_bicarb'        => $request->electrolite_bicarb,
            'electrolite_uric_acid'     => $request->electrolite_uric_acid,
            'electrolite_calcitonin'    => $request->electrolite_calcitonin,
            'electrolite_ca'            => $request->electrolite_ca,
            'electrolite_na'            => $request->electrolite_na,
            'electrolite_k'             => $request->electrolite_k,
            'electrolite_ci'            => $request->electrolite_ci,
            'electrolite_ferritin'      => $request->electrolite_ferritin,
            'electrolite_pth'           => $request->electrolite_pth,
            'electrolite_25_oh_wt_d'    => $request->electrolite_25_oh_wt_d,
            'electrolite_ttg_iga'       => $request->electrolite_ttg_iga,
            'ras_glucometer_type'       => $request->ras_glucometer_type,
            'ras_renin'                 => $request->ras_renin,
            'ras_aldosterone'           => $request->ras_aldosterone,
            'ras_arr'                   => $request->ras_arr,
            'ras_cp_peptide'            => $request->ras_cp_peptide,
            'thyroid_tsh'               => $request->thyroid_tsh,
            'thyroid_ft4'               => $request->thyroid_ft4,
            'thyroid_tt4'               => $request->thyroid_tt4,
            'thyroid_tt3'               => $request->thyroid_tt3,
            'endocrine_gad'             => $request->endocrine_gad,
            'endocrine_dhea_s'          => $request->endocrine_dhea_s,
            'endocrine_cortisol'        => $request->endocrine_cortisol,
            'endocrine_acth'            => $request->endocrine_acth,
            'endocrine_gh_basal'        => $request->endocrine_gh_basal,
            'endocrine_gh_1hr'          => $request->endocrine_gh_1hr,
            'endocrine_gh_2hr'          => $request->endocrine_gh_2hr,
            'endocrine_gh_3hr'          => $request->endocrine_gh_3hr,
            'endocrine_metanephric'     => $request->endocrine_metanephric,
            'endocrine_n_metaneph'      => $request->endocrine_n_metaneph,
            'endocrine_17_ch_pro'       => $request->endocrine_17_ch_pro,
            'endocrine_17_ch_pro_1hr_after_syn'    => $request->endocrine_17_ch_pro_1hr_after_syn,
            'endocrine_tpo'             => $request->endocrine_tpo,
            'endocrine_trab'            => $request->endocrine_trab,
            'endocrine_thyrolobulin'    => $request->endocrine_thyrolobulin,
            'endocrine_ig_f1'           => $request->endocrine_ig_f1,
            'endocrine_testosterone'    => $request->endocrine_testosterone,
            'endocrine_free_testosterone'  => $request->endocrine_free_testosterone,
            'endocrine_shbg'            => $request->endocrine_shbg,
            'endocrine_fsh'             => $request->endocrine_fsh,
            'endocrine_lh'              => $request->endocrine_lh,
            'endocrine_prolactin'       => $request->endocrine_prolactin,
            'endocrine_estradiol'       => $request->endocrine_estradiol,
            'endocrine_progestrone'     => $request->endocrine_progestrone,
            'endocrine_b_hcg'           => $request->endocrine_b_hcg,
            'egfr'                      => $request->egfr,
            'hdma_r'                    => $request->hdma_r,
            'osmolamity'                => $request->osmolamity,
            'status'                    => 1,
            'updated_by'                => auth('sanctum')->user()->id

        ]);

        return response([
//            'data' => MedicalLabResource::collection(MedicalLab::where('id', '=', $medicalLabId->id)->get())
        'data' => 'Saved Successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $uuid)
    {
        MedicalLab::where('id', '=', $id)->delete();

        return $this->show($uuid);
    }

    public function showHistory($id) {
        $patientID = MedicalLabResource::collection(MedicalLab::where('patient_id', '=', $id)->orderBy('created_at', 'desc')->get());

        return response([
            'data' => $patientID
        ]);
    }
}
