<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeatureAddTeamIdsToMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if (!Schema::hasColumn('match', 'homeTeamId') && !Schema::hasColumn('match', 'awayTeamId')) {
            Schema::table('match', function($table) {
                $table->integer('homeTeamId')->after('homeTeam')->nullable()->default(0);
                $table->integer('awayTeamId')->after('awayTeam')->nullable()->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
