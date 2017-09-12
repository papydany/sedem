<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
   public function state()
    {
        return $this->belongsTo('App\State');
    }

   
    public function lga()
    {
        return $this->belongsTo('App\lga');
    }
}
