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
        Schema::create('esite_pharmacy', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('batch_no')->nullable();
            $table->date('expire_date');
            $table->string('treatment_type')->nullable();
            $table->string('dosage')->nullable();
            $table->integer('quantity');
            $table->longText('notes');
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
        Schema::dropIfExists('esite_pharmacy');
    }
};
