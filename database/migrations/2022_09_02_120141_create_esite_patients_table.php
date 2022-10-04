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
            // START Personal Information
            $table->string('full_name');
            $table->date('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('occupation')->nullable();
            $table->boolean('education_qualification')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->boolean('smoker')->nullable();
            $table->boolean('drinker')->nullable();
            $table->boolean('family_dm')->nullable();
            $table->string('gestational_dm')->nullable();
            $table->integer('weight_baby')->nullable();
            $table->boolean('hypertension')->nullable();
            $table->string('family_ihd')->nullable();
            $table->string('parity')->nullable();
            $table->boolean('smbg')->nullable();
            $table->boolean('ihd')->nullable();
            $table->boolean('cva')->nullable();
            $table->boolean('pvd')->nullable();
            $table->boolean('neuropathy')->nullable();
            // END Personal Information

            // START Physical Information
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('waist_circumference')->nullable();
            $table->integer('bmi')->nullable();
            $table->string('hip')->nullable();
            $table->boolean('retinopathy')->nullable();
            $table->boolean('non_proliferative')->nullable();
            $table->boolean('proliferative_dr')->nullable();
            $table->boolean('maculopathy')->nullable();
            $table->boolean('insulin')->nullable();
            $table->boolean('amputation')->nullable();
            $table->boolean('ed')->nullable();
            $table->boolean('nafld')->nullable();
            $table->boolean('dermopathy')->nullable();
            $table->boolean('diabetic_food')->nullable();
            $table->date('date_insulin')->nullable();
            $table->integer('duration_insulin')->nullable();
            $table->integer('duration_dm')->nullable();
            $table->boolean('glycemic_control')->nullable();
            $table->boolean('lipid_control')->nullable();
            $table->string('pressure_control')->nullable();
            $table->integer('father_height')->nullable();
            $table->integer('mother_height')->nullable();
            $table->integer('mid_height')->nullable();
            $table->string('first_a1c')->nullable();
            $table->string('second_a1c')->nullable();
            $table->string('referral')->nullable();
            // END Physical Information
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
