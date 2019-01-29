<?php

namespace App\Repositories;


use Illuminate\Http\Request;
use App\Models\Match;

class MatchRepository {

  public function filterMatches($start_date = null, $end_date = null, $team = null, $league = null) {
    $results = Match::all();
    $payload = array(
      'count' => count($results),
      'matches' => $results
    );
    return $payload;

    return 'heyworld';
  }
}
