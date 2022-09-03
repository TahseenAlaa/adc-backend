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
            $table->string('username');
            $table->string('email')->unique();
            $table->string('profile_pic')->nullable();
            $table->string('job_title')->nullable();
            $table->integer('added_by');
            $table->timestamp('last_login_at');
            $table->integer('profile_id')->nullable();
            $table->string('token');
            $table->timestamp('token_gd');
            $table->integer('permission_id')->nullable();
            $table->integer('role')->nullable();
            $table->string('last_login_ip');
            $table->string('password');
            $table->rememberToken();
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
