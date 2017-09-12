<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
      public function staff()
    {
        return $this->hasMany('App\Staff');
    }
}
