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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('full_name');
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('job_title')->nullable();
            $table->integer('profile_id')->nullable();
            $table->integer('permission_id')->nullable();
            $table->string('role')->nullable();
            $table->timestamp('last_login_at');
            $table->string('last_login_ip');
            $table->string('password');
            $table->boolean('enabled')->default(1)->comment('1 Active, 0 Disabled');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
