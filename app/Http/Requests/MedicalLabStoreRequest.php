<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalLabStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'test_name'                          => 'bail|string|required',
//            'patient_id'                         => 'bail|integer|required',
//            'patient_history_id'                 => 'bail|integer|required',
            'dm_f_blood_glucose'                 => 'bail|string|nullable',
            'dm_r_blood_glucose'                 => 'bail|string|nullable',
            'dm_hb_aic_turbo'                    => 'bail|string|nullable',
            'dm_hb_aic_single_pr'                => 'bail|string|nullable',
            'dm_hb_aic_turbid'                   => 'bail|string|nullable',
            'dm_hypoglycemia'                    => 'bail|string|nullable',
            'dm_insulin'                         => 'bail|string|nullable',
            'lipid_tg'                           => 'bail|string|nullable',
            'lipid_hdl'                          => 'bail|string|nullable',
            'lipid_chol'                         => 'bail|string|nullable',
            'lipid_ldl'                          => 'bail|string|nullable',
            'lipid_vldl'                         => 'bail|string|nullable',
            'lipid_non_hdl_c'                    => 'bail|string|nullable',
            'lipid_ldh'                          => 'bail|string|nullable',
            'kidney_proteinuria'                 => 'bail|string|nullable',
            'kidney_microalbuminuria'            => 'bail|string|nullable',
            'kidney_creatinine'                  => 'bail|string|nullable',
            'kidney_urea'                        => 'bail|string|nullable',
            'kidney_bun'                         => 'bail|string|nullable',
            'liver_s_albumin'                    => 'bail|string|nullable',
            'liver_total_protein'                => 'bail|string|nullable',
            'liver_ast'                          => 'bail|string|nullable',
            'liver_alt'                          => 'bail|string|nullable',
            'liver_ai_phos'                      => 'bail|string|nullable',
            'liver_cpk'                          => 'bail|string|nullable',
            'electrolite_anion_gap'              => 'bail|string|nullable',
            'electrolite_bicarb'                 => 'bail|string|nullable',
            'electrolite_uric_acid'              => 'bail|string|nullable',
            'electrolite_calcitonin'             => 'bail|string|nullable',
            'electrolite_ca'                     => 'bail|string|nullable',
            'electrolite_na'                     => 'bail|string|nullable',
            'electrolite_k'                      => 'bail|string|nullable',
            'electrolite_ci'                     => 'bail|string|nullable',
            'electrolite_ferritin'               => 'bail|string|nullable',
            'electrolite_pth'                    => 'bail|string|nullable',
            'electrolite_25_oh_wt_d'             => 'bail|string|nullable',
            'electrolite_ttg_iga'                => 'bail|string|nullable',
            'ras_glucometer_type'                => 'bail|string|nullable',
            'ras_renin'                          => 'bail|string|nullable',
            'ras_aldosterone'                    => 'bail|string|nullable',
            'ras_arr'                            => 'bail|string|nullable',
            'ras_cp_peptide'                     => 'bail|string|nullable',
            'thyroid_tsh'                        => 'bail|string|nullable',
            'thyroid_ft4'                        => 'bail|string|nullable',
            'thyroid_tt4'                        => 'bail|string|nullable',
            'thyroid_tt3'                        => 'bail|string|nullable',
            'endocrine_gad'                      => 'bail|string|nullable',
            'endocrine_dhea_s'                   => 'bail|string|nullable',
            'endocrine_cortisol'                 => 'bail|string|nullable',
            'endocrine_acth'                     => 'bail|string|nullable',
            'endocrine_gh_basal'                 => 'bail|string|nullable',
            'endocrine_gh_1hr'                   => 'bail|string|nullable',
            'endocrine_gh_2hr'                   => 'bail|string|nullable',
            'endocrine_gh_3hr'                   => 'bail|string|nullable',
            'endocrine_metanephric'              => 'bail|string|nullable',
            'endocrine_n_metaneph'               => 'bail|string|nullable',
            'endocrine_17_ch_pro'                => 'bail|string|nullable',
            'endocrine_17_ch_pro_1hr_after_syn'  => 'bail|string|nullable',
            'endocrine_tpo'                      => 'bail|string|nullable',
            'endocrine_trab'                     => 'bail|string|nullable',
            'endocrine_thyrolobulin'             => 'bail|string|nullable',
            'endocrine_ig_f1'                    => 'bail|string|nullable',
            'endocrine_testosterone'             => 'bail|string|nullable',
            'endocrine_free_testosterone'        => 'bail|string|nullable',
            'endocrine_shbg'                     => 'bail|string|nullable',
            'endocrine_fsh'                      => 'bail|string|nullable',
            'endocrine_lh'                       => 'bail|string|nullable',
            'endocrine_prolactin'                => 'bail|string|nullable',
            'endocrine_estradiol'                => 'bail|string|nullable',
            'endocrine_progestrone'              => 'bail|string|nullable',
            'endocrine_b_hcg'                    => 'bail|string|nullable',
            'egfr'                               => 'bail|string|nullable',
            'hdma_r'                             => 'bail|string|nullable',
            'osmolamity'                         => 'bail|string|nullable',
            'notes'                              => 'bail|string|nullable',


        ];
    }
}
