<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBattleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('team_id_1');
            $table->biginteger('team_id_2');
            $table->biginteger('team_winner');
            $table->integer('exec')->default(0)->nullable();
            $table->integer('win_team_1');
            $table->integer('win_team_2');
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
        Schema::dropIfExists('battle');
    }
}
