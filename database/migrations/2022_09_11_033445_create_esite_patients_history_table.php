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
            $table->uuid('uuid')->unique();
            $table->integer('patient_id');
            $table->string('patient_picture_id')->nullable();
            $table->string('patient_number')->nullable();
            $table->date('date_of_visit')->nullable();
            $table->integer('blood_pressure_systolic')->nullable();
            $table->integer('blood_pressure_diastolic')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('waist_circumference')->nullable();
            $table->integer('bmi')->nullable();
            $table->integer('age_at_visit')->nullable();
            $table->longText('clinical_notes')->nullable();
            $table->date('next_visit')->nullable();
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
        Schema::dropIfExists('esite_patients_history');
    }
};
