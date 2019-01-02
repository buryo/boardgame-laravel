<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('player_id');
            $table->unsignedInteger('battle_id');
            $table->integer('score');
            $table->timestamps();
            $table->unique(['battle_id', 'player_id']);
        });

        Schema::table('scores', function($table) {
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('battle_id')->references('id')->on('battles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
