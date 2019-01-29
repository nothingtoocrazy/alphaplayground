<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\League;
use App\Models\Match;
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

        $league = new League;
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

      $leagues = League::all();
      foreach ($leagues as $league) {
        $res = $client->get('https://api.football-data.org/v2/competitions/'.$league->competition_id.'/teams', $headers);
        // $res = $client->get('https://api.football-data.org/v2/competitions/2021/teams', $headers);
        $json = json_decode($res->getBody());
        foreach ($json->teams as $key => $value) {

          Team::updateOrCreate(
            [
              'competition_id' => $json->competition->id,
              'team_id' => $value->id,
            ],
            [
              'competition_id' => $json->competition->id,
              'season_id' => $json->season->id,
              'team_id' => $value->id,
              'name' => $value->name,
              'tla' => $value->tla,
              'crestUrl' => $value->crestUrl,
              'stadium' => $value->venue,
            ]
          );

        }
      }

      $strMessage =  "successfully inserted " . count($json->teams) ." records into database";

      return $strMessage;
    }

  public function syncMatchesToDatabase(){

      $client = new \GuzzleHttp\Client();
      $headers = ['headers' => ['X-Auth-Token' => env('FOOTBALL_DATA_API_KEY')]];

        $res = $client->get('https://api.football-data.org/v2/matches/?dateFrom=2019-01-18&dateTo=2019-01-28', $headers);
        $json = json_decode($res->getBody());
        print_r($json);
        foreach ($json->matches as $key => $value) {
          $match = new Match;
          Match::updateOrCreate(
            [
              'match_id' => $value->id,
              'competition_id' => $value->competition->id
            ],
            [
              'season_id' => $value->season->id,
              'homeTeam' => $value->homeTeam->name,
              'homeTeamId' => $value->homeTeam->id,
              'awayTeam' => $value->awayTeam->name,
              'awayTeamId' => $value->awayTeam->id,
              'winner' => $value->score->winner,
              'status' => $value->status,
              'homeScore' => $value->score->fullTime->homeTeam,
              'awayScore' => $value->score->fullTime->awayTeam,
              'homePenalties' => $value->score->penalties->homeTeam,
              'awayPenalties' => $value->score->penalties->awayTeam,
              // 'utcDate' => $value->utcDate,
            ]
          );

          // TODO: help
          // $match->utcDate = $value->utcDate;
          // $match->save();
        }

      $strMessage =  "successfully inserted " . count($json->matches) ." records into database";

      return $strMessage;
    }
}
