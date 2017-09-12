<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreType extends Model
{
  public function store()
    {
    	return $this->hasMany('App\Store');
    }
  

}
