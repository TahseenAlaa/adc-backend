<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esite_medical_lab', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('patient_history_id')->nullable();
            $table->string('test_name');
            $table->string('dm_f_blood_glucose', 100)->nullable();
            $table->string('dm_r_blood_glucose', 100)->nullable();
            $table->string('dm_hb_aic_turbo', 100)->nullable();
            $table->string('dm_hb_aic_single_pr', 100)->nullable();
            $table->string('dm_hb_aic_turbid', 100)->nullable();
            $table->string('dm_hypoglycemia', 100)->nullable();
            $table->string('dm_insulin', 100)->nullable();
            $table->string('lipid_tg', 100)->nullable();
            $table->string('lipid_hdl', 100)->nullable();
            $table->string('lipid_chol', 100)->nullable();
            $table->string('lipid_ldl', 100)->nullable();
            $table->string('lipid_vldl', 100)->nullable();
            $table->string('lipid_non_hdl_c', 100)->nullable();
            $table->string('lipid_ldh', 100)->nullable();
            $table->string('kidney_proteinuria', 100)->nullable();
            $table->string('kidney_microalbuminuria', 100)->nullable();
            $table->string('kidney_creatinine', 100)->nullable();
            $table->string('kidney_urea', 100)->nullable();
            $table->string('kidney_bun', 100)->nullable();
            $table->string('liver_s_albumin', 100)->nullable();
            $table->string('liver_total_protein', 100)->nullable();
            $table->string('liver_ast', 100)->nullable();
            $table->string('liver_alt', 100)->nullable();
            $table->string('liver_ai_phos', 100)->nullable();
            $table->string('liver_cpk', 100)->nullable();
            $table->string('electrolite_anion_gap', 100)->nullable();
            $table->string('electrolite_bicarb', 100)->nullable();
            $table->string('electrolite_uric_acid', 100)->nullable();
            $table->string('electrolite_calcitonin', 100)->nullable();
            $table->string('electrolite_ca', 100)->nullable();
            $table->string('electrolite_na', 100)->nullable();
            $table->string('electrolite_k', 100)->nullable();
            $table->string('electrolite_ci', 100)->nullable();
            $table->string('electrolite_ferritin', 100)->nullable();
            $table->string('electrolite_pth', 100)->nullable();
            $table->string('electrolite_25_oh_wt_d', 100)->nullable();
            $table->string('electrolite_ttg_iga', 100)->nullable();
            $table->string('ras_glucometer_type', 100)->nullable();
            $table->string('ras_renin', 100)->nullable();
            $table->string('ras_aldosterone', 100)->nullable();
            $table->string('ras_arr', 100)->nullable();
            $table->string('ras_cp_peptide', 100)->nullable();
            $table->string('thyroid_tsh', 100)->nullable();
            $table->string('thyroid_ft4', 100)->nullable();
            $table->string('thyroid_tt4', 100)->nullable();
            $table->string('thyroid_tt3', 100)->nullable();
            $table->string('endocrine_gad', 100)->nullable();
            $table->string('endocrine_dhea_s', 100)->nullable();
            $table->string('endocrine_cortisol', 100)->nullable();
            $table->string('endocrine_acth', 100)->nullable();
            $table->string('endocrine_gh_basal', 100)->nullable();
            $table->string('endocrine_gh_1hr', 100)->nullable();
            $table->string('endocrine_gh_2hr', 100)->nullable();
            $table->string('endocrine_gh_3hr', 100)->nullable();
            $table->string('endocrine_metanephric', 100)->nullable();
            $table->string('endocrine_n_metaneph', 100)->nullable();
            $table->string('endocrine_17_ch_pro', 100)->nullable();
            $table->string('endocrine_17_ch_pro_1hr_after_syn', 100)->nullable();
            $table->string('endocrine_tpo', 100)->nullable();
            $table->string('endocrine_trab', 100)->nullable();
            $table->string('endocrine_thyrolobulin', 100)->nullable();
            $table->string('endocrine_ig_f1', 100)->nullable();
            $table->string('endocrine_testosterone', 100)->nullable();
            $table->string('endocrine_free_testosterone', 100)->nullable();
            $table->string('endocrine_shbg', 100)->nullable();
            $table->string('endocrine_fsh', 100)->nullable();
            $table->string('endocrine_lh', 100)->nullable();
            $table->string('endocrine_prolactin', 100)->nullable();
            $table->string('endocrine_estradiol', 100)->nullable();
            $table->string('endocrine_progestrone', 100)->nullable();
            $table->string('endocrine_b_hcg', 100)->nullable();
            $table->string('egfr', 100)->nullable();
            $table->string('hdma_r', 100)->nullable();
            $table->string('osmolamity', 100)->nullable();
            $table->integer('status')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('esite_medical_lab');
    }
};
