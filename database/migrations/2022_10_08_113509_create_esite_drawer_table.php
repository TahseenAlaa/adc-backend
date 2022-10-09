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
        Schema::create('esite_drawer', function (Blueprint $table) {
            $table->id();
            $table->string('endpoint');
            $table->tinyInteger('type')->comment('0: Not shown in drawer, 1: Drawer Main Item, 2: Drawer Sub item')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('icon')->nullable();
            $table->string('parent')->nullable();
            $table->string('v_order')->nullable();
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
        Schema::dropIfExists('esite_drawer');
    }
};
