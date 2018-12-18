<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'league';

    public function team() {
        return $this->hasMany('App\team');
  }
}
