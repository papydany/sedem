<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DrugsQty;
use App\Order;
use App\OrderItem;
use App\SearchDrug;
use App\Drug;
use App\DrugsName;
use App\Tax;
use App\BankAccount;
use Auth;
use Session;
use Cart;
use DB;

class CashierController extends Controller
{
  Const VAT =2;
  Const CANCELED =1;
  Const Success =0;
     public function __construct()
    {
        $this->middleware('auth');
    }
//===================================================================================================
      public function index()
    {
      $drug_content = Cart::content();
     // dd($drug_content);
        
      return view('cashier.index')->withC($drug_content);
    }
//===================================================================================================
     public function autocomplete(Request $request)
    {
        $data = SearchDrug::select("search_name as name")->where("search_name","LIKE","%{$request->input('query')}%")->distinct()->get();
        
        return response()->json($data);
    }
//==============================bar code=====================================================
     public function autocomplete_code(Request $request)
    {
        $data = SearchDrug::select("search_code as name")->where("search_code","LIKE","%{$request->input('query')}%")->distinct()->get();
        
        return response()->json($data);
    }    
//===================================================================================================
     public function search(Request $request)
    {
        if($request->has('search')) {
      $drug_name = $request->search;

$drug = Drug::where([['drug_name',$drug_name],['store_id',Auth::user()->store_id]])->orderBy('id','DESC')->first();

if(count($drug) > 0){
    $drug_qty =DrugsQty::where([['drugsname_id',$drug->drugname_id],['store_id',Auth::user()->store_id],['qty','>',0]])->first();
if(count($drug_qty) == 0)
{
 Session::flash('warning',"please restock these drug");
   
}else{
    Cart::add(array('id' => $drug->id, 'name' => $drug->drug_name, 'qty' =>1, 'price' => $drug->selling_price,'options' => ['drugname_id' => $drug->drugname_id,'vat'=> $drug->selling_vat,'bought_price'=> $drug->price]));
  

   Cart::content();
 }

}else{Session::flash('warning',"parameters enter those not exist");}
  

    }
       if($request->has('search_code')) {
      $drug_code = $request->search_code;
    

    $drug = Drug::where([['code',$drug_code],['store_id',Auth::user()->store_id]])->orderBy('id','DESC')->first();
if(count($drug) > 0){
    $drug_qty =DrugsQty::where([['drugsname_id',$drug->drugname_id],['store_id',Auth::user()->store_id],['qty','>',0]])->first();

if(count($drug_qty) > 0)
{
    Cart::add(array('id' => $drug->id, 'name' => $drug->drug_name, 'qty' =>1, 'price' => $drug->selling_price,'options' => ['drugname_id' => $drug->drugname_id,'vat'=> $drug->selling_vat,'bought_price'=> $drug->price]));
    Cart::content();
  }else{ Session::flash('warning',"please restock these drug");}
     }else{Session::flash('warning',"parameters enter those not exist");} 
 
    }
  
    return redirect('cashier');
    }
//===================================================================================================
    public function remove($rowId)
    {
Cart::remove($rowId);
  return redirect('cashier');
    }
//===================================================================================================
      public function updatecart(Request $request)
    {
Cart::update($request->id,$request->qty);
 
     return redirect('cashier');
    }
//===================================================================================================
 public function process(Request $request)
    {
       $id = $request->input('id');
       $qty = $request->input('qty');
        $drugsname_id = $request->input('drugsname_id');
       $discount = $request->input('discount');
if($id)
{
       if($id == null)
       {
      Session::flash('warning',"Sale Cart is empty");
    return back();
       }
       foreach ($id as $key => $value) {
        $drugsqty =DrugsQty::where([['drugsname_id',$drugsname_id[$key]],['store_id',Auth::user()->store_id]])->first();
        if($drugsqty->qty > $qty[$key])
        {
          Cart::update($value,$qty[$key]);
        }else{
          $drugsname =DrugsName::find($drugsname_id[$key]);
         Session::flash('warning',"Please restock.The stock Quantity of ".$drugsname->drugname. "is less than Quantity entered"); 
          return back();
        }
   
       }
     }
$cart = Cart::content();
if($discount != null)
{
$discount_percentage =$discount /100;
 $d = Cart::subtotal() *$discount_percentage; 
    return view('cashier.process')->withC($cart)->withD($d);
  }else
  {
    return view('cashier.process')->withC($cart);
  }
       
  }
//=======================================================================================================
  public function order(Request $request)
  {
    
    $getvat =Tax::where('status',self::VAT)->first();
   $setvat =  $getvat->tax/100;
  $vat = $request->total * $setvat;

 
  //DB::transaction(function () use ($request)  {  
    $data = array();
  $order = New Order;
  $date =date('Y-m-d');
   $order->store_id = Auth::user()->store_id;
   $order->storetype_id = Auth::user()->storetype_id;
  $order->user_id = Auth::user()->id;
   $order->customer = $request->customer;
 $order->phone = $request->phone;
  $order->payment_type = $request->payment_type;
 $order->order_date = $date;
  $order->bought_price_total =$request->bought_price;
 $order->total = $request->total;
$order->subtotal = $request->subtotal;
$order->vat = $vat;
$order->status =0;
if($request->discount == null)
{
$order->discountamount= 0;
}else
{
$order->discountamount= $request->discount;
}

$order->save();

$order_id =Order::find($order->id);
 $cart = Cart::content();

 foreach ($cart as $key => $value) {
   $amount = $value->price * $value->qty;
  //$amount = $request->total;
   // find drugqtys and update the quantitydrugsqty
$drugsqty =DrugsQty::where([['drugsname_id',$value->options->drugname_id],['store_id',Auth::user()->store_id]])->first();

$drugs_qty =$drugsqty->qty - $value->qty;
$drugsqty->qty =$drugs_qty;
$drugsqty->save();
     $data[] = ['order_id'=>$order->id,'drug_id'=>$value->id,'drugname_id'=>$value->options->drugname_id,'drug_name'=>$value->name,'qty'=>$value->qty,'price'=>$value->price,'amount'=>$amount,'vat'=>$value->options->vat,'order_date'=>$date]; 
 }
OrderItem::insert($data);

 Cart::destroy();
 //dd($data);
return response()->json($order_id);
  
        
}
//======================== store daily sales ==================================
public function storedailysale()
{
  return view('cashier.storedailysale');
}
//====================================post staore daily sale=========================================

     public function poststoredailysale(Request $request)
    {
     
    $this->validate($request,array('payment_type'=>'required','s_date'=>'required','e_date'=>'required',));
$payment_type =$request->payment_type;
$s_date =$request->s_date;
$e_date =$request->e_date;
if($payment_type == "All")
{
$order =Order::where([['store_id',Auth::user()->store_id],['status',self::Success]])
->whereDate('order_date','>=',$s_date)->whereDate('order_date','<=',$e_date)->orderBy('id','DESC')->get();
}else{
  $order =Order::where([['store_id',Auth::user()->store_id],['status',self::Success],['payment_type',$payment_type]])
->whereDate('order_date','>=',$s_date)->whereDate('order_date','<=',$e_date)->orderBy('id','DESC')->get();
}

return view('cashier.poststoredailysale')->witho($order)->withSd($s_date)->withEd($e_date);
    }
//======================== store daily sales ==================================
public function cancelorder($id)
{
  $order =Order::find($id);
  $order->status =self::CANCELED;
  $order->return_date =date("Y-m-d");
  $order->user_id =Auth::user()->id;
  $order->save();
  $orderitem =OrderItem::where('order_id',$id)->get();
  foreach ($orderitem as $key => $value) {
$drugsqty =DrugsQty::where([['drugsname_id',$value->drugname_id],['store_id',Auth::user()->store_id]])->first();
$drugs_qty =$drugsqty->qty + $value->qty;
$drugsqty->qty =$drugs_qty;
$drugsqty->save();
  }
Session::flash('success','success');
return back();
}
//======================== order details ==================================
public function orderdetail($id)
{
 $order =Order::find($id); 
$order_item = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('order_items.order_id',$id)
             ->where('orders.id',$id)
            ->get();
           
  return view('cashier.orderdetail')->withO($order)->withOi($order_item);
}

//======================== print bank ==================================
public function printref($id)
{
 $order =Order::find($id); 
$order_item = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('order_items.order_id',$id)
             ->where('orders.id',$id)
            ->get();

  $bankaccount =BankAccount::where('store_id',$order->store_id)->get();         
  return view('cashier.printref')->withO($order)->withOi($order_item)->withB($bankaccount);
}

//================================= reportledger ==================================================


public  function stockreorder()
{
  $date =date('Y-m-d');
  $store_id =Auth::user()->store_id;

    $reorder = DB::table('drugs')
            //->join('drugs_qties','drugs.drugname_id', '=', 'drugs_qties.drugsname_id')
              ->join('drugs_qties', [['drugs.drugname_id', '=', 'drugs_qties.drugsname_id'],['drugs.store_id','=','drugs_qties.store_id']])
              ->where('drugs.store_id', $store_id)
           ->whereColumn('drugs_qties.qty','<=','drugs.reorder_quantity')
             
             ->get();
 
  //dd($reorder);
 return view('cashier.stockreorder')->withR($reorder)->withSd($date);
          }
}