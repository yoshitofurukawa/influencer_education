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
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();

            // $table->id();
            // $table->timestamps();
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('name_kana', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('profile_image', 255)->nullable();
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
