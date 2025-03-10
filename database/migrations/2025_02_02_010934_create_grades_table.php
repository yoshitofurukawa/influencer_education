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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->timestamps();
        });

        // 外部キー制約の追加
        Schema::table('curriculums', function (Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });

        Schema::table('classes_clear_checks', function (Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 外部キー制約の削除
        Schema::table('curriculums', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
        });

        Schema::table('classes_clear_checks', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
        });

        Schema::dropIfExists('grades');
    }
};

