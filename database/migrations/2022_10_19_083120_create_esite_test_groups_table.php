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
        Schema::create('esite_test_groups', function (Blueprint $table) {
            $table->id();
            $table->string('test_group');
            $table->string('test_name');
            $table->string('min_range')->nullable();
            $table->string('max_range')->nullable();
            $table->string('measurement_unit')->nullable();
            $table->string('gender');
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
        Schema::dropIfExists('esite_test_groups');
    }
};
