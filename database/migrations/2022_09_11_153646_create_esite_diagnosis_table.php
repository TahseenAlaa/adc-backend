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
        Schema::create('esite_diagnosis', function (Blueprint $table) {
            $table->id();
            $table->string('symptoms');
            $table->integer('is_confirmed')->comment('0 -> suspected, 1 -> confirmed'); // 0 -> suspected, 1 -> confirmed
            $table->integer('doctor_id');
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
        Schema::dropIfExists('esite_diagnosis');
    }
};
