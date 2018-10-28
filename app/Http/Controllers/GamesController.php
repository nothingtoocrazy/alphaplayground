<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use GuzzleHttp\Client;

class GamesController extends Controller
{
    public function upcomingGames() {
      $results = DB::select('SELECT * FROM Users ORDER BY username');
      // $resultsJSON = Response::json($results);
      // return view('welcome')->with('results', $results);
      return response()->json($results);
    }
    public function leagues(){
      // $client = new Client(['headers' => ['X-Auth-Token' => env('FOOTBALL_DATA_API_KEY')]]);
      // $client = new Client();
      // ['defaults' => [
      //   'headers' => ['X-Auth-Token' => env('FOOTBALL_DATA_API_KEY')]
      // ]]);
      
        //THIS WORKS
    $client = new \GuzzleHttp\Client();
    $res = $client->get('https://api.football-data.org/v2/competitions?plan=TIER_ONE');
    // ['auth' =>  ['user', 'pass']]);
    echo $res->getStatusCode(); // 200
    echo $res->getBody();


      // $response = $client->get('https://api.football-data.org/v2/competitions?plan=TIER_ONE');
      // return $response;

      // $uri = 'http://api.football-data.org/v2/competitions?plan=TIER_ONE';
      // $reqPrefs['http']['method'] = 'GET';
      // $reqPrefs['http']['header'] = "X-Auth-Token: {$_ENV['FOOTBALL_DATA_API_KEY']}";
      // $stream_context = stream_context_create($reqPrefs);
      // $response = file_get_contents($uri, false, $stream_context);
      // $result = json_decode($response);
      // foreach ($result->competitions as $key => $value) {
      //   // echo $key;
      //   // echo "\n";
      //   // echo "\n";
      //   return DB::insert("INSERT INTO leagues (competition_id, area_id, area_name, competition_name, competition_code) VALUES ($value->id, $value->area->id, $value->area->name, $value->name, $value->code)");
      // }

      // return response()->json($response);
      }
}
