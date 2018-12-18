<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('league', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('competition_id');
            $table->integer('area_id');
            $table->string('area_name');
            $table->string('competition_name');
            $table->string('competition_code');
            // fix this later
            // $table->dateTimeTz('utcDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.s
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
