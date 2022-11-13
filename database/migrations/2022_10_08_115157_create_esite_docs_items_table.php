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
        Schema::create('esite_docs_items', function (Blueprint $table) {
            $table->id();
            $table->integer('drug_id');
            $table->integer('quantity');
            $table->longText('notes')->nullable();
            $table->integer('parent_doc')->nullable();
            $table->string('batch_no')->nullable();
            $table->date('expire_date')->nullable();
            $table->integer('doc_type')->comment('1: Input Doc, 2: Output Doc.')->nullable();
            $table->boolean('to_pharmacy')->comment('1: True, 0: False')->nullable();
            $table->integer('to_patient')->comment('Patient Id')->nullable();
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
        Schema::dropIfExists('esite_docs_items');
    }
};
