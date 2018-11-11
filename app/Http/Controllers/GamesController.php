<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Leagues;
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
    $headers = ['headers' => ['X-Auth-Token' => '643ecaa8ac1e48eea0a07dd29ad2a910']];
    $res = $client->get('https://api.football-data.org/v2/competitions?plan=TIER_ONE', $headers);
    // print_r($res->getBody());
    // echo $res->getBody();
    $json = json_decode($res->getBody());
    // ['auth' =>  ['user', 'pass']]);
    // echo $res->getStatusCode(); // 20
    // echo $res->json();
    // echo $res->getBody();
    // $result = json_decode($res->getBody(), true);
    // print_r($result, true);
    // echo $result->competitions;

      // $response = $client->get('https://api.football-data.org/v2/competitions?plan=TIER_ONE');
      // return $response;

      // $uri = 'http://api.football-data.org/v2/competitions?plan=TIER_ONE';
      // $reqPrefs['http']['method'] = 'GET';
      // $reqPrefs['http']['header'] = "X-Auth-Token: {$_ENV['FOOTBALL_DATA_API_KEY']}";
      // $stream_context = stream_context_create($reqPrefs);
      // $response = file_get_contents($uri, false, $stream_context);
      // $result = json_decode($response);
      // echo count($res);


      foreach ($json->competitions as $key => $value) {
        // echo $key;
        // echo "\n";
        // echo "\n";

        $league = new Leagues;
        $league->competition_id = $value->id;
        $league->area_id = $value->area->id;
        $league->area_name = $value->area->name;
        $league->competition_name = $value->name;
        $league->competition_code = $value->code;

        $league->save();
        // return DB::insert("INSERT INTO leagues (competition_id, area_id, area_name, competition_name, competition_code) VALUES ($value->id, $value->area->id, $value->area->name, $value->name, $value->code)");
      }
      $strMessage =  "successfully inserted " . count($json->competitions) ." records into database";

      return $strMessage;
      }

      public function getUserModel(){
        $userModel = Leagues::all();
        print_r($userModel);
        foreach($userModel as $user){
          echo $user->competition_name;
        }

      }
}
