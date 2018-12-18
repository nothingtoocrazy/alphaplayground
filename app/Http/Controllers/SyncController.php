<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Leagues;
use App\Models\Matches;
use App\Models\Team;
// use GuzzleHttp\Client;

class SyncController extends Controller
{
    public function syncLeaguesToDatabase(){

    $client = new \GuzzleHttp\Client();
    $headers = ['headers' => ['X-Auth-Token' => env('FOOTBALL_DATA_API_KEY')]];
    $res = $client->get('https://api.football-data.org/v2/competitions?plan=TIER_ONE', $headers);
    $json = json_decode($res->getBody());

      foreach ($json->competitions as $key => $value) {

        $league = new Leagues;
        $league->competition_id = $value->id;
        $league->area_id = $value->area->id;
        $league->area_name = $value->area->name;
        $league->competition_name = $value->name;
        $league->competition_code = $value->code;

        $league->save();
        //raw sql query that does the same thing
        // return DB::insert("INSERT INTO leagues (competition_id, area_id, area_name, competition_name, competition_code) VALUES ($value->id, $value->area->id, $value->area->name, $value->name, $value->code)");
      }
      $strMessage =  "successfully inserted " . count($json->competitions) ." records into database";

      return $strMessage;
      }

    public function syncTeamsToDatabase(){

      $client = new \GuzzleHttp\Client(['verify' => false]);
      $headers = ['headers' => ['X-Auth-Token' => env('FOOTBALL_DATA_API_KEY')]];

      // $leagues = Leagues::all();
      // foreach ($leagues as $league) {
        // $res = $client->get('https://api.football-data.org/v2/competitions/'.$league->competition_id.'/teams', $headers);
        $res = $client->get('https://api.football-data.org/v2/competitions/2021/teams', $headers);
        $json = json_decode($res->getBody());
        foreach ($json->teams as $key => $value) {
          $team = new Team;

          $team->competition_id = $json->competition->id;
          $team->season_id = $json->season->id;

          $team->team_id = $value->id;
          $team->name = $value->name;
          $team->tla = $value->tla;
          $team->crestUrl = $value->crestUrl;
          $team->stadium = $value->venue;

          $team->save();
        }
      // }

      $strMessage =  "successfully inserted " . count($json->teams) ." records into database";

      return $strMessage;
    }

  public function syncMatchesToDatabase(){

      $client = new \GuzzleHttp\Client();
      $headers = ['headers' => ['X-Auth-Token' => env('FOOTBALL_DATA_API_KEY')]];

      // $matches = Matches::all();
        $res = $client->get('https://api.football-data.org/v2/matches', $headers);
        
        $json = json_decode($res->getBody());
        // print_r($json);
        foreach ($json->matches as $key => $value) {
          $match = new Matches;

          $match->match_id = $value->id;
          
          $match->competition_id = $value->competition->id;
          $match->season_id = $value->season->id;

          $match->homeTeam = $value->homeTeam->name;
          $match->awayTeam = $value->awayTeam->name;

          $match->winner = $value->score->winner;
          $match->status = $value->status;

          $match->homeScore = $value->score->fullTime->homeTeam;
          $match->awayScore = $value->score->fullTime->awayTeam;
          
          $match->homePenalties = $value->score->penalties->homeTeam;
          $match->awayPenalties = $value->score->penalties->awayTeam;

          // TODO: help
          // $match->utcDate = $value->utcDate;
          $match->save();
        }

      $strMessage =  "successfully inserted " . count($json->matches) ." records into database";

      return $strMessage;
    }
}
