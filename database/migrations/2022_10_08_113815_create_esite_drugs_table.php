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
        Schema::create('esite_drugs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('drug_type')->comment(' 0: Normal Drug, 1: Committee');
            $table->integer('item_type')->comment(' 0: Drugs, 1: Assets');
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
        Schema::dropIfExists('esite_drugs');
    }
};
