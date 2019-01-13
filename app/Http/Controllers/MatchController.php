<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;

class MatchController extends Controller {
  public function match() {
    $results = Match::all();
    $payload = array(
      'count' => count($results),
      'matches' => $results
    );
    return $payload;
  }
}