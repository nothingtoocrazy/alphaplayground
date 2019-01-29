<?php

namespace App\Repositories;


use Illuminate\Http\Request;
use App\Models\Match;

class MatchRepository {

  public function filterMatches($start_date = null, $end_date = null, $team = null, $league = null) {

    $results = Match::where(function($where) use($start_date, $end_date, $team, $league){
      if ($start_date) {
        $where->where('utcDate', '>', $start_date);
      }
      if ($end_date) {
        $where->where('utcDate', '<', $end_date);
      }
      if ($team) {
        $where->where('homeTeam', '=', $team);
        $where->orWhere('awayTeam', '=', $team);
      }
      if ($league) {
        $where->where('league', '=', $league);
      }
    })->get();
    $payload = array(
      'count' => count($results),
      'matches' => $results
    );
    return $payload;

  }
}
