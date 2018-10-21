<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GamesController extends Controller
{
    public function upcomingGames() {
      $results = DB::select('SELECT * FROM Users ORDER BY username');
      // $resultsJSON = Response::json($results);
      // return view('welcome')->with('results', $results);
      return response()->json($results);
    }
}
