<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testGroups = [
            ['groupName', 'dm_f_blood_glucose', 1, 10, 'unit', 'Male'],
            ['groupName', 'dm_r_blood_glucose', 1, 10, 'unit', 'Male'],
            ['groupName', 'dm_hb_aic_turbo', 1, 10, 'unit', 'Male'],
            ['groupName', 'dm_hb_aic_single_pr', 1, 10, 'unit', 'Male'],
            ['groupName', 'dm_hb_aic_dual_pr', 1, 10, 'unit', 'Male'],
            ['groupName', 'dm_hb_aic_turbid', 1, 10, 'unit', 'Male'],
            ['groupName', 'dm_hypoglycemia', 1, 10, 'unit', 'Male'],
            ['groupName', 'dm_insulin', 1, 10, 'unit', 'Male'],
            ['groupName', 'lipid_tg', 1, 10, 'unit', 'Male'],
            ['groupName', 'lipid_hdl', 1, 10, 'unit', 'Male'],
            ['groupName', 'lipid_chol', 1, 10, 'unit', 'Male'],
            ['groupName', 'lipid_ldl', 1, 10, 'unit', 'Male'],
            ['groupName', 'lipid_vldl', 1, 10, 'unit', 'Male'],
            ['groupName', 'lipid_non_hdl_c', 1, 10, 'unit', 'Male'],
            ['groupName', 'lipid_ldh', 1, 10, 'unit', 'Male'],
            ['groupName', 'kidney_proteinuria', 1, 10, 'unit', 'Male'],
            ['groupName', 'kidney_microalbuminuria', 1, 10, 'unit', 'Male'],
            ['groupName', 'kidney_creatinine', 1, 10, 'unit', 'Male'],
            ['groupName', 'kidney_urea', 1, 10, 'unit', 'Male'],
            ['groupName', 'kidney_bun', 1, 10, 'unit', 'Male'],
            ['groupName', 'liver_s_albumin', 1, 10, 'unit', 'Male'],
            ['groupName', 'liver_total_protein', 1, 10, 'unit', 'Male'],
            ['groupName', 'liver_ast', 1, 10, 'unit', 'Male'],
            ['groupName', 'liver_alt', 1, 10, 'unit', 'Male'],
            ['groupName', 'liver_ai_phos', 1, 10, 'unit', 'Male'],
            ['groupName', 'liver_cpk', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_anion_gap', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_bicarb', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_uric_acid', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_calcitonin', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_ca', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_na', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_k', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_ci', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_ferritin', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_pth', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_25_oh_wt_d', 1, 10, 'unit', 'Male'],
            ['groupName', 'electrolite_ttg_iga', 1, 10, 'unit', 'Male'],
            ['groupName', 'ras_glucometer_type', 1, 10, 'unit', 'Male'],
            ['groupName', 'ras_renin', 1, 10, 'unit', 'Male'],
            ['groupName', 'ras_aldosterone', 1, 10, 'unit', 'Male'],
            ['groupName', 'ras_arr', 1, 10, 'unit', 'Male'],
            ['groupName', 'ras_cp_peptide', 1, 10, 'unit', 'Male'],
            ['groupName', 'thyroid_tsh', 1, 10, 'unit', 'Male'],
            ['groupName', 'thyroid_ft4', 1, 10, 'unit', 'Male'],
            ['groupName', 'thyroid_tt4', 1, 10, 'unit', 'Male'],
            ['groupName', 'thyroid_tt3', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_gad', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_dhea_s', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_cortisol', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_acth', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_gh_basal', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_gh_1hr', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_gh_2hr', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_gh_3hr', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_metanephric', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_n_metaneph', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_17_ch_pro', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_17_ch_pro_1hr_after_syn', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_tpo', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_trab', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_thyrolobulin', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_ig_f1', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_testosterone', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_free_testosterone', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_shbg', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_fsh', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_lh', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_prolactin', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_estradiol', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_progestrone', 1, 10, 'unit', 'Male'],
            ['groupName', 'endocrine_b_hcg', 1, 10, 'unit', 'Male'],
            ['groupName', 'egfr', 1, 10, 'unit', 'Male'],
            ['groupName', 'hdma_r', 1, 10, 'unit', 'Male'],
            ['groupName', 'osmolamity', 1, 10, 'unit', 'Male'],
        ];

        foreach ($testGroups as $group) {
            DB::table('esite_test_groups')->insert([
                'test_group'            => $group[0],
                'test_name'             => $group[1],
                'min_range'             => $group[2],
                'max_range'             => $group[3],
                'measurement_unit'      => $group[4],
                'gender'                => $group[5],
                'created_by'            => 1,
                'created_at'            => Carbon::now()
            ]);
        }
    }
}
