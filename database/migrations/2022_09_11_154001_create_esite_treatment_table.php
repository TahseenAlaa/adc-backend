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
            $table->string('name');
            $table->integer('drug_id')->nullable();
            $table->string('patient_picture_id')->nullable();
            $table->string('dose')->nullable();
            $table->boolean('status')->nullable();
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
