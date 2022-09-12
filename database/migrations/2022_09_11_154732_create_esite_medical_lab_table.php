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
            $table->string('dm_f_blood_glucose')->nullable();
            $table->string('dm_r_blood_glucose')->nullable();
            $table->string('dm_hb_aic_turbo')->nullable();
            $table->string('dm_hb_aic_single_pr')->nullable();
            $table->string('dm_hb_aic_turbid')->nullable();
            $table->string('dm_hypoglycemia')->nullable();
            $table->string('dm_insulin')->nullable();
            $table->string('lipid_tg')->nullable();
            $table->string('lipid_hdl')->nullable();
            $table->string('lipid_chol')->nullable();
            $table->string('lipid_ldl')->nullable();
            $table->string('lipid_vldl')->nullable();
            $table->string('lipid_non_hdl-c')->nullable();
            $table->string('lipid_ldh')->nullable();
            $table->string('kidney_proteinuria')->nullable();
            $table->string('kidney_microalbuminuria')->nullable();
            $table->string('kidney_creatinine')->nullable();
            $table->string('kidney_urea')->nullable();
            $table->string('kidney_bun')->nullable();
            $table->string('liver_s_albumin')->nullable();
            $table->string('liver_total_protein')->nullable();
            $table->string('liver_ast')->nullable();
            $table->string('liver_alt')->nullable();
            $table->string('liver_ai_phos')->nullable();
            $table->string('liver_cpk')->nullable();
            $table->string('electrolite_anion_gap')->nullable();
            $table->string('electrolite_bicarb')->nullable();
            $table->string('electrolite_uric_acid')->nullable();
            $table->string('electrolite_calcitonin')->nullable();
            $table->string('electrolite_ca')->nullable();
            $table->string('electrolite_na')->nullable();
            $table->string('electrolite_k')->nullable();
            $table->string('electrolite_ci')->nullable();
            $table->string('electrolite_ferritin')->nullable();
            $table->string('electrolite_pth')->nullable();
            $table->string('electrolite_25_oh_wt_d')->nullable();
            $table->string('electrolite_ttg-iga')->nullable();
            $table->string('ras_glucometer_type')->nullable();
            $table->string('ras_renin')->nullable();
            $table->string('ras_aldosterone')->nullable();
            $table->string('ras_arr')->nullable();
            $table->string('ras_cp_peptide')->nullable();
            $table->string('thyroid_tsh')->nullable();
            $table->string('thyroid_ft4')->nullable();
            $table->string('thyroid_tt4')->nullable();
            $table->string('thyroid_tt3')->nullable();
            $table->string('endocrine_gad')->nullable();
            $table->string('endocrine_dhea_s')->nullable();
            $table->string('endocrine_cortisol')->nullable();
            $table->string('endocrine_acth')->nullable();
            $table->string('endocrine_gh_basal')->nullable();
            $table->string('endocrine_gh_1hr')->nullable();
            $table->string('endocrine_gh_2hr')->nullable();
            $table->string('endocrine_gh_3hr')->nullable();
            $table->string('endocrine_metanephric')->nullable();
            $table->string('endocrine_n_metaneph')->nullable();
            $table->string('endocrine_17_ch_pro')->nullable();
            $table->string('endocrine_17_ch_pro_1hr_after_syn')->nullable();
            $table->string('endocrine_tpo')->nullable();
            $table->string('endocrine_trab')->nullable();
            $table->string('endocrine_thyrolobulin')->nullable();
            $table->string('endocrine_ig_f1')->nullable();
            $table->string('endocrine_testosterone')->nullable();
            $table->string('endocrine_free_testosterone')->nullable();
            $table->string('endocrine_shbg')->nullable();
            $table->string('endocrine_fsh')->nullable();
            $table->string('endocrine_lh')->nullable();
            $table->string('endocrine_prolactin')->nullable();
            $table->string('endocrine_estradiol')->nullable();
            $table->string('endocrine_progestrone')->nullable();
            $table->string('endocrine_b_hcg')->nullable();
            $table->string('egfr')->nullable();
            $table->string('hdma_r')->nullable();
            $table->string('osmolamity')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
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
