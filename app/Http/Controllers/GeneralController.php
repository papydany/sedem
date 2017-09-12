<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\DrugsName;
use Auth;
class GeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function storepurchase()
    {
        return view('general.storepurchase');
    }
   public function storestockcontrol()
    {
        return view('general.storestockcontrol');
    }
     public function stockavailable()
    {
  $store =Store::find(Auth::user()->store_id);
    $drugs = DrugsName::get();
 return view('general.stockavailable')->withS($store)->withD($drugs);
    }
      public function storesale()
    {
        return view('general.storesale');
    }
}
