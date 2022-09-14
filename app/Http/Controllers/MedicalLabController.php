<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedicalLabResource;
use App\Models\MedicalLab;
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
    public function store(MedicalLabStoreRequest $request)
    {
        $newTest = new MedicalLab;
        $newTest->test_name                    = $request->test_name;
        $newTest->patient_id                   = $request->patient_id;
        $newTest->patient_history_id           = $request->patient_history_id;
        $newTest->dm_f_blood_glucose           = $request->dm_f_blood_glucose;
        $newTest->dm_r_blood_glucose           = $request->dm_r_blood_glucose;
        $newTest->dm_hb_aic_turbo              = $request->dm_hb_aic_turbo;
        $newTest->dm_hb_aic_single_pr          = $request->dm_hb_aic_single_pr;
        $newTest->dm_hb_aic_turbid             = $request->dm_hb_aic_turbid;
        $newTest->dm_hypoglycemia              = $request->dm_hypoglycemia;
        $newTest->dm_insulin                   = $request->dm_insulin;
        $newTest->lipid_tg                     = $request->lipid_tg;
        $newTest->lipid_hdl                    = $request->lipid_hdl;
        $newTest->lipid_chol                   = $request->lipid_chol;
        $newTest->lipid_ldl                    = $request->lipid_ldl;
        $newTest->lipid_vldl                   = $request->lipid_vldl;
        $newTest->lipid_non_hdl_c              = $request->lipid_non_hdl_c;
        $newTest->lipid_ldh                    = $request->lipid_ldh;
        $newTest->kidney_proteinuria           = $request->kidney_proteinuria;
        $newTest->kidney_microalbuminuria      = $request->kidney_microalbuminuria;
        $newTest->kidney_creatinine            = $request->kidney_creatinine;
        $newTest->kidney_urea                  = $request->kidney_urea;
        $newTest->kidney_bun                   = $request->kidney_bun;
        $newTest->liver_s_albumin              = $request->liver_s_albumin;
        $newTest->liver_total_protein          = $request->liver_total_protein;
        $newTest->liver_ast                    = $request->liver_ast;
        $newTest->liver_alt                    = $request->liver_alt;
        $newTest->liver_ai_phos                = $request->liver_ai_phos;
        $newTest->liver_cpk                    = $request->liver_cpk;
        $newTest->electrolite_anion_gap        = $request->electrolite_anion_gap;
        $newTest->electrolite_bicarb           = $request->electrolite_bicarb;
        $newTest->electrolite_uric_acid        = $request->electrolite_uric_acid;
        $newTest->electrolite_calcitonin       = $request->electrolite_calcitonin;
        $newTest->electrolite_ca               = $request->electrolite_ca;
        $newTest->electrolite_na               = $request->electrolite_na;
        $newTest->electrolite_k                = $request->electrolite_k;
        $newTest->electrolite_ci               = $request->electrolite_ci;
        $newTest->electrolite_ferritin         = $request->electrolite_ferritin;
        $newTest->electrolite_pth              = $request->electrolite_pth;
        $newTest->electrolite_25_oh_wt_d       = $request->electrolite_25_oh_wt_d;
        $newTest->electrolite_ttg_iga          = $request->electrolite_ttg_iga;
        $newTest->ras_glucometer_type          = $request->ras_glucometer_type;
        $newTest->ras_renin                    = $request->ras_renin;
        $newTest->ras_aldosterone              = $request->ras_aldosterone;
        $newTest->ras_arr                      = $request->ras_arr;
        $newTest->ras_cp_peptide               = $request->ras_cp_peptide;
        $newTest->thyroid_tsh                  = $request->thyroid_tsh;
        $newTest->thyroid_ft4                  = $request->thyroid_ft4;
        $newTest->thyroid_tt4                  = $request->thyroid_tt4;
        $newTest->thyroid_tt3                  = $request->thyroid_tt3;
        $newTest->endocrine_gad                = $request->endocrine_gad;
        $newTest->endocrine_dhea_s             = $request->endocrine_dhea_s;
        $newTest->endocrine_cortisol           = $request->endocrine_cortisol;
        $newTest->endocrine_acth               = $request->endocrine_acth;
        $newTest->endocrine_gh_basal           = $request->endocrine_gh_basal;
        $newTest->endocrine_gh_1hr             = $request->endocrine_gh_1hr;
        $newTest->endocrine_gh_2hr             = $request->endocrine_gh_2hr;
        $newTest->status                       = 0; // 0 -> Pending, 1 -> Done
        $newTest->created_by                   = 1; // TODO add AUTH ID
        $newTest->save();

        return response([
            'data' => $newTest
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
        $showTest = MedicalLabResource::collection(MedicalLab::where('id', '=', $id)->get());

        return response([
            'data' => $showTest
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
