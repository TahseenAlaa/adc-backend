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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('occupation');
            $table->integer('gender');
            $table->timestamp('birthdate');
            $table->string('address');
            $table->string('smoker');
            $table->string('drinker');
            $table->string('family_dm');
            $table->string('gestational_dm');
            $table->string('weight_baby');
            $table->string('hypert');
            $table->string('family_ihd');
            $table->string('parity');
            $table->string('smbg');
            $table->string('ihd');
            $table->string('cva');
            $table->string('pvd');
            $table->string('neuro');
            $table->string('weight');
            $table->string('height');
            $table->string('wc');
            $table->string('bmi');
            $table->string('hip');
            $table->string('retino');
            $table->string('nonpro');
            $table->string('prolif');
            $table->string('macul');
            $table->string('insul');
            $table->string('amput');
            $table->string('ed');
            $table->string('nafld');
            $table->string('dermo');
            $table->string('dfoot');
            $table->timestamp('date_insulin');
            $table->string('duration_insulin');
            $table->string('duration_dm');
            $table->string('glycemic');
            $table->string('lipid');
            $table->string('pressure');
            $table->string('f_height');
            $table->string('m_height');
            $table->string('mid_height');
            $table->string('fa1c');
            $table->string('sa2c');
            $table->string('referral');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('patients');
    }
};
