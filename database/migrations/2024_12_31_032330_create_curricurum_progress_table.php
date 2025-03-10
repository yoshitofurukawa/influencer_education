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
        Schema::create('curricurum_progress', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->bigIncrements('id');
            $table->integer('curriculum_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('clear_flg')->unsigned()->default(0); // Default 0 for not cleared
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curricurum_progress');
    }
};
