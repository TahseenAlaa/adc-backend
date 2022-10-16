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
        Schema::create('esite_patients', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('full_name');
            $table->string('patient_number')->comment('Old patient File Number')->nullable(); // Old patient File Number
            $table->date('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('education_qualification')->nullable();
            $table->string('referral')->nullable();
            $table->string('social_status')->nullable();
            $table->string('address')->nullable();
            $table->string('parity')->nullable();
            $table->string('first_a1c')->nullable();
            $table->date('date_insulin')->nullable();
            $table->integer('duration_insulin')->nullable();
            $table->date('date_dm')->nullable();
            $table->integer('duration_dm')->nullable();
            $table->boolean('family_ihd')->nullable();
            $table->boolean('weight_baby')->comment('Weight of baby > 4.5 Kg')->nullable();
            $table->boolean('family_dm')->nullable();
            $table->boolean('gestational_dm')->nullable();
            $table->boolean('retinopathy')->nullable();
            $table->boolean('hypertension')->nullable();
            $table->boolean('smoker')->nullable();
            $table->boolean('drinker')->nullable();
            $table->boolean('smbg')->nullable();
            $table->boolean('ihd')->nullable();
            $table->boolean('cva')->nullable();
            $table->boolean('lipid_control')->nullable();
            $table->boolean('pvd')->nullable();
            $table->boolean('neuropathy')->nullable();
            $table->boolean('pressure_control')->nullable();
            $table->boolean('glycemic_control')->nullable();
            $table->boolean('non_proliferative')->nullable();
            $table->boolean('proliferative_dr')->nullable();
            $table->boolean('maculopathy')->nullable();
            $table->boolean('insulin')->nullable();
            $table->boolean('amputation')->nullable();
            $table->boolean('ed')->nullable();
            $table->boolean('nafld')->nullable();
            $table->boolean('dermopathy')->nullable();
            $table->boolean('diabetic_food')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamp('last_visit');
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
        Schema::dropIfExists('esite_patients');
    }
};
