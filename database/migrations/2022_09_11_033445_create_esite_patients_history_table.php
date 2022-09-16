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
        Schema::create('esite_patients_history', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('patient_picture_id')->nullable();
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->string('smoker')->nullable();
            $table->string('drinker')->nullable();
            $table->string('family_dm')->nullable();
            $table->string('gestational_dm')->nullable();
            $table->string('weight_baby')->nullable();
            $table->string('hypert')->nullable();
            $table->string('family_ihd')->nullable();
            $table->string('parity')->nullable();
            $table->string('smbg')->nullable();
            $table->string('ihd')->nullable();
            $table->string('cva')->nullable();
            $table->string('pvd')->nullable();
            $table->string('neuro')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('wc')->nullable();
            $table->string('bmi')->nullable();
            $table->string('hip')->nullable();
            $table->string('retino')->nullable();
            $table->string('nonpro')->nullable();
            $table->string('prolif')->nullable();
            $table->string('macul')->nullable();
            $table->string('insul')->nullable();
            $table->string('amput')->nullable();
            $table->string('ed')->nullable();
            $table->string('nafld')->nullable();
            $table->string('dermo')->nullable();
            $table->string('dfoot')->nullable();
            $table->timestamp('date_insulin')->nullable();
            $table->string('duration_insulin')->nullable();
            $table->string('duration_dm')->nullable();
            $table->string('glycemic')->nullable();
            $table->string('lipid')->nullable();
            $table->string('pressure')->nullable();
            $table->string('f_height')->nullable();
            $table->string('m_height')->nullable();
            $table->string('mid_height')->nullable();
            $table->string('fa1c')->nullable();
            $table->string('sa2c')->nullable();
            $table->string('referral')->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('esite_patients_history');
    }
};
