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
        Schema::create('curriculum_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculums_id');
            $table->unsignedBigInteger('users_id');
            $table->boolean('clear_flg')->default(false);
            $table->timestamps();

            // 外部キー制約（必要に応じて追加）
            $table->foreign('curriculums_id')->references('id')->on('curriculums')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_progress');
    }
};
