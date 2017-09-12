<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  public function storetype()
    {

        return $this->belongsTo('App\StoreType');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    
}
