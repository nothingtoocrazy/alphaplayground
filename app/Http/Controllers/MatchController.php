<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use App\Repositories\MatchRepository;

class MatchController extends Controller {

  public function __construct(MatchRepository $MatchRepository) {
    $this->MatchRepository = $MatchRepository;
  }

  public function match(Request $request) {
    $payload = array(
      'count' => 2,
      'teams' => 'hihi'
    );
    
    return $payload;
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    $team = $request->input('team');
    $league = $request->input('league');
    dd($league);
    $result = $this->MatchRepository->filterMatches($start_date, $end_date, $team, $league);

    return $result;
    // $results = Match::all();
    // $payload = array(
    //   'count' => count($results),
    //   'matches' => $results
    // );
    // return $payload;
  }
}
