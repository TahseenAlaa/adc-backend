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
            $table->integer('test_id');
            $table->longText('doctor_notes')->nullable();
            $table->boolean('sampling_status')->nullable();
            $table->integer('sampling_by')->nullable();
            $table->dateTime('sampling_at')->nullable();
            $table->string('result')->nullable();
            $table->integer('result_by')->nullable();
            $table->dateTime('result_at')->nullable();
            $table->integer('created_by'); // Doctor Name
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
