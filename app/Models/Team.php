<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $table = 'team';

  public $fields = [
    'id' => 'team.id',
    'competition_id' => 'team.competition.id',
    'season_id' => 'team.season_id',
    'team_id' => 'team.team_id',
    'name' => 'team.name',
    'tla' => 'team.tla',
    'crestUrl' => 'team.crestUrl',
    'stadium' => 'team.stadium',
  ];

  protected $fillable = [
    'competition_id',
    'season_id',
    'team_id',
    'name',
    'tla',
    'crestUrl',
    'stadium',
  ];

  public function league() {
    return $this->hasOne('App\Models\League', 'competition_id', 'competition_id');
  }
}