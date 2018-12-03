<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;

class MatchesController extends Controller {
  public function matches() {
    $results = Matches::all();
    $payload = array(
      'count' => count($results),
      'matches' => $results
    );
    return $payload;
  }
}
