<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanceoffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danceoffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('robot_id_1');
            $table->biginteger('robot_id_2');
            $table->biginteger('robot_winner');
            $table->integer('exec')->default(0)->nullable();
            $table->biginteger('battle_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('robot_id_1')->references('id')->on('robots');
            $table->foreign('robot_id_2')->references('id')->on('robots');
            $table->foreign('robot_winner')->references('id')->on('robots');
            $table->foreign('battle_id')->references('id')->on('battle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danceoffs');
    }
}
