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
        Schema::create('esite_treatment', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('patient_history_id');
            $table->integer('drug_id');
            $table->integer('frequency')->comment('Scale from 1-10');
            $table->integer('day_we_mo')->comment('1: Day, 2: Week , 3: Month');
            $table->integer('meal')->comment('1: Before Meal, 2: With meal, 3: After meal, 4: On-demand, 5: Anytime');
            $table->string('notes')->comment('Instructions, Dosage, Notes, etc')->nullable();
            $table->boolean('status')->comment('0: Pending, 1: Dispensed from Pharmacy')->nullable();
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
        Schema::dropIfExists('esite_treatment');
    }
};
