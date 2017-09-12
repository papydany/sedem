<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DrugsFamily;
use App\Drug;
use App\SearchDrug;
use App\StoreType;
use App\DrugsQty;
use App\Tax;
use App\Order;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
class ManagerController extends Controller
{
  Const VAT =2;
    Const CANCELED =1;
  Const Success =0;
     public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
    {
        return view('manager.index');
    }

    //============================================================================================================

     public function drugs()
    {
$drug_family=DrugsFamily::get();
$storetype = StoreType::get();
   return view('manager.drugs')->withDf($drug_family)->withSt($storetype);
    } 
//============================================================================================================

     public function postdrugs(Request $request)
    {
    $this->validate($request,array(
        'drug_name'=>'required',
        'code'=>'required',
        'drugfamily_id'=>'required',
        'produced_by'=>'required',
        'quantity'=>'required',
        'reorder_quantity'=>'required',
        'price'=>'required',
        'selling_price'=>'required',
        'm_date'=>'required',
        'es_date'=>'required',
        'purchase_date'=>'required',
        ));

$check_drug =Drug::where([['code',$request->code],['store_id',Auth::user()->store_id]])->get();
if(count($check_drug) == 0)
{
  $vat =Tax::where('status',self::VAT)->first();
   $vat =  $vat->tax/100;
  $vat_value = $request->selling_price * $vat;

  $d =explode('~', $request->drug_name);

  $id =$d[0];
  $drug_name =$d[1];
DB::transaction(function () use ($request,$vat_value,$id,$drug_name)  {

    $drug =new Drug;
      $drug->drugname_id =$id;
      $drug->drug_name =$drug_name;
      $drug->code =$request->code;
      $drug->produced_by =$request->produced_by;
      $drug->bought_from =$request->bought_from;
      $drug->drugfamily_id =$request->drugfamily_id;
       $drug->quantity =$request->quantity;
         $drug->openingqty =$request->quantity;
      $drug->reorder_quantity =$request->reorder_quantity;
      $drug->price =$request->price;
      $drug->selling_price =$request->selling_price;
       $drug->m_date =$request->m_date;
      $drug->es_date =$request->es_date;
      $drug->purchase_date =$request->purchase_date;
      $drug->store_id =Auth::user()->store_id;
       $drug->store_type =Auth::user()->storetype_id;
      $drug->user_id =Auth::user()->id;
      $drug->given_discount =$request->given_discount;
      $drug->selling_vat =$vat_value;
   $drug->save();

   $search = new SearchDrug;
   $search->search_code =$drug->code;
   $search->drug_id =$drug->id;
   $search->search_name = $drug->drug_name;
   $search->save();
  

   // check qyt of drugs.
   $drugsqty =DrugsQty::where([['store_id',Auth::user()->store_id],['drugsname_id',$id]])->first();
   if(count($drugsqty) > 0)
   {
    // update
 
$newqty =$request->quantity + $drugsqty->qty;
$drugsqty->qty = $newqty;
$drugsqty->save();


   }else{
$dgty =new DrugsQty;
$dgty->store_id =Auth::user()->store_id;
$dgty->drugsname_id =$id;
$dgty->qty =$request->quantity;
$dgty->save();
   }
});
   Session::flash('success',"success");
 }else
 {
  Session::flash('warning',"please the barcode has been taken already");
 }
 return redirect()->action('ManagerController@drugs');
    }  
//============================================================================================================
   public function view_drugs()
    {
    $drug =Drug::where('store_id',Auth::user()->store_id)->orderBy('id','DESC')->paginate(50);
    return view('manager.viewdrugs')->withD($drug);
    }
//======================== store daily sales ==================================
public function ao_dailysale()
{
  $users = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.role_id',4)
              ->where('users.store_id',Auth::user()->store_id)
            ->select('users.*')
            ->get();
  return view('manager.ao_dailysale')->withUser($users);
}
//====================================post staore daily sale=========================================

     public function post_ao_dailysale(Request $request)
    {
     
    $this->validate($request,array('cashier'=>'required','payment_type'=>'required','s_date'=>'required','e_date'=>'required',));
$cashier =$request->cashier;    
$payment_type =$request->payment_type;
$s_date =$request->s_date;
$e_date =$request->e_date;
if($payment_type == "All")
{
$order =Order::where([['store_id',Auth::user()->store_id],['status',self::Success],['user_id',$cashier]])
->whereDate('order_date','>=',$s_date)->whereDate('order_date','<=',$e_date)->orderBy('id','DESC')->get();
}else{
  $order =Order::where([['store_id',Auth::user()->store_id],['status',self::Success],['payment_type',$payment_type],['user_id',$cashier]])
->whereDate('order_date','>=',$s_date)->whereDate('order_date','<=',$e_date)->orderBy('id','DESC')->get();
}

return view('manager.post_ao_dailysale')->witho($order)->withSd($s_date)->withEd($e_date);
    }

  //======================== store daily cancel sales ==================================
public function canceldailysale()
{

  return view('manager.canceldailysale');
}
//====================================post staore daily cancel sale=========================================

     public function post_canceldailysale(Request $request)
    {
     
    $this->validate($request,array('s_date'=>'required','e_date'=>'required',));

$s_date =$request->s_date;
$e_date =$request->e_date;

  $order =Order::where([['store_id',Auth::user()->store_id],['status',self::CANCELED]])
->whereDate('order_date','>=',$s_date)->whereDate('order_date','<=',$e_date)->orderBy('id','DESC')->get();


return view('manager.post_canceldailysale')->witho($order)->withSd($s_date)->withEd($e_date);
    }  
}
