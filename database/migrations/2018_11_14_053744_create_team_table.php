<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('team', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('competition_id');
          $table->integer('season_id');
          $table->integer('team_id');
          $table->string('name');
          $table->string('tla');
          $table->string('crestUrl')->nullable();
          $table->string('stadium');
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
        Schema::dropIfExists('team');
    }
}
