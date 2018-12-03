<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //todo: create the migration for the teams model
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id');
            $table->integer('competition_id');
            $table->integer('season_id');
            $table->string('homeTeam');
            $table->string('awayTeam');
            $table->string('winner')->nullable();
            $table->string('status');
            $table->string('homeScore')->nullable();
            $table->string('awayScore')->nullable();
            $table->integer('homePenalties')->nullable();
            $table->integer('awayPenalties')->nullable();
            // fix this later
            // $table->dateTimeTz('utcDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
