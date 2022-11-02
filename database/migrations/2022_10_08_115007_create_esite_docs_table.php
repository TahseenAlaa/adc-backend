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
        Schema::create('esite_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('provider_id');
            $table->string('source_ref')->nullable();
            $table->string('source_name')->nullable();
            $table->string('source_job_title')->nullable();
            $table->string('destination_ref')->nullable();
            $table->string('destination_name')->nullable();
            $table->string('destination_job_title')->nullable();
            $table->integer('doc_type')->comment('1: Input Doc, 2: Output Doc.')->nullable();
            $table->boolean('to_pharmacy')->comment('1: True, 0: False')->nullable();
            $table->boolean('final_approval')->comment('1: Yes, 0: No')->nullable(); // 1: Yes, 0: No
            $table->string('manager_name')->nullable();
            $table->integer('approved_by')->nullable();
            $table->dateTime('approved_at')->nullable();
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
        Schema::dropIfExists('esite_docs');
    }
};
