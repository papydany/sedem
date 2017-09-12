<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StoreType;
use App\State;
use App\Lga;
use App\Store;
use App\Role;
use App\User;
use App\DrugsFamily;
use App\Drug;
use App\Staff;
use App\Salary;
use App\Leaf;
use App\LoanAndCredit;
use App\Tax;
use App\Payroll;
use App\CeoAccount;
use App\BankPost;
use App\DrugsName;
use App\Order;
use App\PersonelAccount;
use App\Asset;
use App\Impress;
use App\RunningCost;
use App\Ledger;
use App\BankAccount;
use App\Debtpayment;
use DB;
use Image;
use Auth;

use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
        Const admin =2;
        Const setleaf =2;
        Const active =1;
        Const terminate =3;
        Const debit =2;
        Const credit =1;

         Const vat =2;
        Const tax =1;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.home');
    }
//============================================================================================================
    public function home()
    {
        return view('home.home');
    }
//============================================================================================================

     public function newstore()
    {
    $getStoreType =StoreType::get();
     $getState =State::get();
        return view('home.newstore')->withSt($getStoreType)->withState($getState);
    }
 //============================================================================================================
   
 public function postnewstore(Request $request)
    {

    $this->validate($request,array('store_name'=>'required|unique:stores','storetype_id'=>'required'));   
   $store =new Store;
   $store->store_name =$request->store_name;
   $store->email =$request->email;
   $store->storetype_id =$request->storetype_id;
   $store->phone =$request->phone;
   $store->lga_id =$request->lga_id;
   $store->state_id =$request->state_id;
   $store->address =$request->address;
   $store->save();
  Session::flash('success','success');

       return redirect()->action('HomeController@newstore');
    }
 //============================================================================================================
   public function view_newstore()
    {
    $getStore =Store::get();
   
        return view('home.view_newstore')->withS($getStore);
    }

//============================================================================================================

     public function storeadmin()
    {
    $Store =Store::get();
   return view('home.storeadmin')->withS($Store);
    } 
//============================================================================================================

     public function poststoreadmin(Request $request)
    {
    $this->validate($request,array(
        'store_id'=>'required',
       'role' => 'required',
        'name' => 'required|string|max:255',
        'username' => 'required|unique:users',
        'email' => 'required|unique:users',
        'password' => 'required|string|min:6|confirmed',));

    
     $staff = Staff::find($request->name);
//dd($store_type);
    $user =new User;
      $user->name =  $staff->staff_name;
       $user->staff_id =  $request->name;
     $user->status =  0;
     $user->email = $request->email;
     $user->username = $request->username;
     $user->store_id =$request->store_id;
     $user->storetype_id = $staff->storetype_id;
     $user->phone = $staff->phone;
     $user->address = $staff->address;
     $user->plain_password = $request->password;
     $user->password = bcrypt($request->password);
     $user->save();

    
$user_role =DB::table('user_roles')->insert(['user_id' => $user->id, 'role_id' =>$request->role]);
  Session::flash('success',"success");
   return redirect()->action('HomeController@storeadmin');
    }  
//============================================================================================================
   public function view_storeadmin()
    {
    $user =DB::table('users')
    ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
    ->get(); 
    
    return view('home.view_storeadmin')->withU($user);
    }
//============================================================================================================
    public function activate($id)
    {
    $user =User::find($id);
    $user->status =0;
    $user->save();
 Session::flash('success',"success");
 return redirect()->action('HomeController@view_storeadmin');
    }
//============================================================================================================
    public function deactivate($id)
    {
    $user =User::find($id);
    $user->status =1;
    $user->save();
    Session::flash('success',"success");
 return redirect()->action('HomeController@view_storeadmin');
    }
//============================================================================================================

     public function role()
    {

   return view('home.role');
    } 
//============================================================================================================

     public function postrole(Request $request)
    {
    $this->validate($request,array(
        'role_name'=>'required',));

    $role =new Role;
      $role->role_name =$request->role_name;
   $role->save();
 return redirect()->action('HomeController@role');
    }  
//============================================================================================================
   public function view_role()
    {
    $user =Role::get();
    return view('home.view_role')->withU($user);
    }
//============================================================================================================

     public function drugsfamily()
    {

   return view('home.drugsfamily');
    } 
//============================================================================================================

     public function postdrugsfamily(Request $request)
    {
    $this->validate($request,array(
        'drug_name'=>'required',));

    $role =new DrugsFamily;
      $role->drug_name =$request->drug_name;
   $role->save();
   Session::flash('success',"success");
 return redirect()->action('HomeController@drugsfamily');
    }  
//============================================================================================================
   public function view_drugsfamily()
    {
    $user =DrugsFamily::get();
    return view('home.view_drugsfamily')->withU($user);
    }
//===========================edit drugs family ========================================
   public function edit_drugsfamily($id)
    {
    $drugs =DrugsFamily::find($id);
    return view('home.edit_drugsfamily')->withD($drugs);
    } 
 //===========================post edit drugs family ========================================
   public function post_edit_drugsfamily(Request $request,$id)
    {
   $drugs =DrugsFamily::find($id);
   if(count($drugs) == 0)
   {
      return redirect()->action('HomeController@view_drugsfamily');
   }
   $drugs->drug_name = strtoupper($request->drugname);
   $drugs->save();
Session::flash('success',"success");
  return redirect()->action('HomeController@view_drugsfamily');
    }

//============================================================================================================

     public function setbankaccount()
    {
$store =Store::get();
   return view('home.setbankaccount')->withS($store);
    } 
//============================================================================================================

     public function postsetbankaccount(Request $request)
    {
    $this->validate($request,array(
        'store_id'=>'required','account_name'=>'required','account_type'=>'required','bank_name'=>'required','account_number'=>'required',));

    $bank_account =new BankAccount;
       $bank_account->user_id =Auth::user()->id;
       $bank_account->account_name =$request->account_name;
        $bank_account->account_type =$request->account_type;
       $bank_account->bank_name =$request->bank_name;
        $bank_account->store_id =$request->store_id;
       $bank_account->account_number =$request->account_number;
   $bank_account->save();
   Session::flash('success',"success");
 return redirect()->action('HomeController@setbankaccount');
    }  
//============================================================================================================
   public function viewbankaccount()
    {
    $bank =BankAccount::get();
    return view('home.viewbankaccount')->withB($bank);
    }
//===========================edit drugs family ========================================
   public function editbankaccount($id)
    {
    $bank=BankAccount::find($id);
    $store =Store::get();
    return view('home.editbankaccount')->withB($bank)->withS($store);
    } 
 //===========================post edit drugs family ========================================
   public function post_editbankaccount(Request $request,$id)
    {
   $bank_account=BankAccount::find($id);
   if(count($bank_account) == 0)
   {
      return redirect()->action('HomeController@viewbankaccount');
   }
  $bank_account->user_id =Auth::user()->id;
       $bank_account->account_name =$request->account_name;
        $bank_account->account_type =$request->account_type;
       $bank_account->bank_name =$request->bank_name;
       
       $bank_account->account_number =$request->account_number;
   $bank_account->save();
Session::flash('success',"success");
  return redirect()->action('HomeController@viewbankaccount');
    }         





//============================================================================================================

     public function dailypurchase()
    {
$store =Store::get();
   return view('home.dailypurchase')->withS($store);
    } 
//============================================================================================================

     public function postdailypurchase(Request $request)
    {
     
    $this->validate($request,array(
        'store'=>'required','s_date'=>'required','e_date'=>'required',));
$store_id =$request->store;
$s_date =$request->s_date;
$e_date =$request->e_date;
 $store =Store::find($store_id);
    $drugs = Drug::where('store_id',$store_id)->whereDate('purchase_date','>=',$s_date)->whereDate('purchase_date','<=',$e_date)->get();

  return view('home.displaydailypurchase')->withS($store)->withD($drugs)->withSd($s_date)->withEd($e_date);
    }

 //============================================================================================================

     public function dailysale()
    {
$store =Store::get();
   return view('home.dailysale')->withS($store);
    } 
//============================================================================================================

     public function postdailysale(Request $request)
    {
     
    $this->validate($request,array(
        'store'=>'required','s_date'=>'required','e_date'=>'required',));
$store_id =$request->store;
$s_date =$request->s_date;
$e_date =$request->e_date;
 $store =Store::find($store_id);
 $order = DB::table('orders')
            ->join('order_items','orders.id','=','order_items.order_id')
            ->where('orders.store_id',$store_id)
            ->whereDate('orders.order_date','>=',$s_date)
            ->whereDate('orders.order_date','<=',$e_date)
            ->get();
   

  return view('home.displaydailysale')->withS($store)->witho($order)->withSd($s_date)->withEd($e_date);
    }
//============================================================================================================

     public function newstaff()
    {
    $getStore =Store::get();
    $getStoreType =StoreType::get();
     $getState =State::get();
        return view('home.newstaff')->withSt($getStoreType)->withState($getState)->withStore($getStore);
    }
 //============================================================================================================
   
 public function postnewstaff(Request $request)
    {

    $this->validate($request,array(
      'staff_name'=>'required',
      'jobTitle'=>'required',
      'jobType'=>'required',
      'storetype_id'=>'required',
      'store_id'=>'required',
      'gender'=>'required',
      'bod'=>'required',
      'qualification'=>'required',
      'salary'=>'required',
      'state_id'=>'required',
      'lga_id'=>'required',
      'phone'=>'required',
      'address'=>'required',
      'parent_name'=>'required',
      'parent_phone'=>'required',
      'parent_address'=>'required',
     ));   
   $staff =new Staff;
   $staff->staff_name =$request->staff_name;
   $staff->jobTitle =$request->jobTitle;

   $staff->jobType =$request->jobType; //dd($staff->jobType);
   $staff->storetype_id =$request->storetype_id ;
   $staff->store_id =$request->store_id;
   $staff->gender =$request->gender;
   $staff->phone =$request->phone;
   $staff->lga_id =$request->lga_id;
   $staff->state_id =$request->state_id;
   $staff->address =$request->address;
  $staff->qualification =$request->qualification ;
   $staff->salary=$request->salary;
   $staff->bod =$request->bod;
   $staff->appoinment_date =$request->appoinment_date;
   $staff->parent_name =$request->parent_name;
   $staff->parent_phone =$request->parent_phone;
   $staff->parent_address =$request->parent_address;
   $staff->status =self::active;
   if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
           $destinationPath = public_path('img/staff');
            $img = Image::make($image->getRealPath());
            $img->resize(150, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);
         $staff->image = $filename;
          }
   $staff->save();
   $salary = New Salary;
   $salary->staff_id =$staff->id;
   $salary->salary =$request->salary;
   $salary->date =date('Y-m-d');
   $salary->save();
  Session::flash('success','success');

       return redirect()->action('HomeController@newstaff');
    }
 //============================================================================================================
   public function view_newstaff()
    {
    $getStaff =Staff::get();
   
        return view('home.view_newstaff')->withS($getStaff);
    }

//============================================================================================================
   public function set_leaf($id)
    {
    $getStaff =Staff::find($id);
   return view('home.set_leaf')->withId($getStaff);
    }
 //============================================================================================================
   public function post_set_leaf(Request $request,$id)
    {
        $this->validate($request,array(
      's_date'=>'required',
      'e_date'=>'required',));
    $getStaff =Staff::find($id);
    $getStaff->status = self::setleaf;
    $getStaff->save();
    $leaf = New Leaf;
    $leaf->staff_id = $id;
    $leaf->start_date = $request->s_date;
    $leaf->end_date =$request->e_date;
    $leaf->save();
    Session::flash('success','success');
   return redirect()->action('HomeController@view_newstaff');
    }   
//============================================================================================================
   public function back_from_leaf($id)
    {
    $getStaff =Staff::find($id);
   $getStaff->status =self::active;
   $getStaff->save();
     Session::flash('success','success');
   return redirect()->action('HomeController@view_newstaff');
    }
//============================================================================================================
   public function terminate($id)
    {
    $getStaff =Staff::find($id);
   $getStaff->status =self::terminate;
   $getStaff->save();
   $user =User::where('staff_id',$id)->get();
   if(count($user) > 0){
   User::where('staff_id',$id)->update(['status' => 1]);
 }
     Session::flash('success','success');
   return redirect()->action('HomeController@view_newstaff');
    }    
//====================================  Profile    =================================================
   public function profile($id)
    {
    $Staff =Staff::find($id);
   return view('home.profile')->withP($Staff);
    }
//=====================================Increase Salary  =====================================================
   public function increase_salary($id)
    {
    $getStaff =Staff::find($id);
   return view('home.increase_salary')->withId($getStaff);
    }
 //============================================================================================================
   public function post_increase_salary(Request $request,$id)
    {
        $this->validate($request,array(
      'new_salary'=>'required',));
        $date =date('Y-m-d');
    $getStaff =Staff::find($id);
    $getStaff->salary = $request->new_salary;
    $getStaff->save();
    $salary = New Salary;
    $salary->staff_id = $id;
    $salary->salary = $request->new_salary;
    $salary->date =$date;
    $salary->save();
    Session::flash('success','success');
   return redirect()->action('HomeController@view_newstaff');
    } 

   //=====================================Staff On leaf  =====================================================
   public function leafstaff()
    {
    $getStaff =Staff::where('status',self::setleaf)->get();
   return view('home.leafstaff')->withS($getStaff);
    }

  //=====================================prepare salary  =====================================================
   public function preparesalary()
    {
    $getStaff =Staff::where('status','!=',self::terminate)->get();
     $tax =Tax::where('status',self::tax)->first();
     if(count($tax) > 0)
     {
   return view('home.preparesalary')->withS($getStaff)->withT($tax);
     }else{
  return view('home.preparesalary')->withS($getStaff);
     }

    }

  //=====================================prepare salary  =====================================================
   public function post_preparesalary(Request $request)
    {

       $this->validate($request,array(
      'staff_id'=>'required',
      'year'=>'required',
      'month'=>'required',
      'salary'=>'required',
      ));
    $payroll =Payroll::where([['staff_id',$request->staff_id],['year',$request->year],['month',$request->month]])
    ->first();
    if(count($payroll) > 0)
    {
       Session::flash('warning','Salary has been prepared for these staff alredy for thses month');
   return redirect()->action('HomeController@preparesalary');
    }
     $pay =new Payroll;
     $pay->user_id = Auth::user()->id;
     $pay->staff_id =$request->staff_id;
      $pay->salary =floatval(preg_replace('/[^\d.]/', '', $request->salary));
      $pay->bonus =floatval(preg_replace('/[^\d.]/', '',$request->bonus));
      $pay->loan_deduction =floatval(preg_replace('/[^\d.]/', '',$request->loan_deduction));
      $pay->other_deduction =floatval(preg_replace('/[^\d.]/', '',$request->other_deduction));
      $tax_per =$request->tax/100;
      $tax =  $pay->salary * $tax_per;
      $pay->tax = $tax;

      $pay->month =$request->month;
      $pay->year =$request->year;
      $salary = $pay->salary + $pay->bonus;
     $deduct = $tax +$pay->loan_deduction + $pay->other_deduction;
     $netpay =$salary - $deduct;
      $pay->netpay =$netpay;
      $pay->save();
    
     if($pay->loan_deduction !== null){

      $lc =LoanAndCredit::where('staff_id',$pay->staff_id)->orderBy('id','desc')->first();
      if(count($lc) > 0)
{

  $balance = $lc->balance - $pay->loan_deduction;

  $insert_lc = new LoanAndCredit;
   $insert_lc->user_id = Auth::user()->id;
  $insert_lc->staff_id =$pay->staff_id;
  $insert_lc->amount_to_deduct =$lc->amount_to_deduct;
  $insert_lc->balance = $balance;
  $insert_lc->credit =$pay->loan_deduction;
  $insert_lc->save();
 
}

    }
  
     Session::flash('success','success');
   return redirect()->action('HomeController@preparesalary');
     }

     
//=====================================Take loan  =====================================================
   public function takeloan($id)
    {
    $getStaff =Staff::find($id);
   
   return view('home.takeloan')->withId($getStaff);
    }
 //============================================================================================================
   public function post_takeloan(Request $request,$id)
    {
        $this->validate($request,array(
      'loan'=>'required','number'=>'required',));
        $date =date('Y-m-d');
    
    $loan = $request->loan;
    $number = $request->number;
    
$lcb = LoanAndCredit::where('staff_id',$id)->orderBy('id','desc')->first();
if(count($lcb) > 0)
{
  // balance from previous loan
  $balance = $lcb->balance + $loan;
}else{
 $balance =  $loan;

}

$amount_to_deduct = $balance/$number; 
    $lc = new LoanAndCredit;
    $lc->staff_id = $id;
    $lc->user_id =Auth::user()->id;
    $lc->loan = $loan;
    $lc->balance = $balance;
    $lc->amount_to_deduct = $amount_to_deduct;
 $lc->save();

    Session::flash('success','success');
   return redirect()->action('HomeController@view_newstaff');
    } 
//===================================== tax percentage for salary ===========================================
    public function settax()
    {
return view('home.settax');
    }
//==================== post tax percentage for salary ===========================================
    public function post_settax(request $request)
    {
        $this->validate($request,array(
      'tax'=>'required',));
     
      $t =Tax::where('status',self::tax)->first();
      if(count($t) > 0)
      {
$t->tax = $request->tax;
$t->save();
      }else{
$tax = new Tax;
$tax->tax = $request->tax;
$tax->status = self::tax;
$tax->save(); 
      }
  Session::flash('success','success');
  return redirect()->action('HomeController@settax');


    }
//===================================== view tax percentage ===========================================
    public function viewtax()
    {
     $t =Tax::where('status',self::tax)->first();
      
  return view('home.viewtax')->withT($t);


    }


//===================================== vat for drugs ===========================================
    public function setvat()
    {
return view('home.setvat');
    }
//===================================== post vat for drugs ===========================================
    public function post_setvat(request $request)
    {
        $this->validate($request,array(
      'tax'=>'required',));
     
      $t =Tax::where('status',self::vat)->first();
      if(count($t) > 0)
      {
$t->tax = $request->tax;
$t->save();
      }else{
$tax = new Tax;
$tax->tax = $request->tax;
$tax->status = self::vat;
$tax->save(); 
      }
  Session::flash('success','success');
  return redirect()->action('HomeController@setvat');


    }
//===================================== view vat ===========================================
    public function viewvat()
    {
     $t =Tax::where('status',self::vat)->first();
      
  return view('home.viewvat')->withT($t);


    }

 //===================================== generate payroll ===========================================
    public function generatepayroll()
    {  $getStore =Store::get();
    return view('home.generatepayroll')->withS($getStore);
 }  
 //===================================== generate payroll ===========================================
    public function post_generatepayroll(Request $request)
    {
    $view=$request->view;
if($view =="All")
{ $title = "All Staff"; 
     $payroll = Payroll::where([['month',$request->month],['year',$request->year]])->get();
   }
elseif($view =="manufactured_date")
{
    $store_id =$request->store_id;
    $staff =Staff::where('store_id',$store_id)->get();
    foreach ($staff as $key => $value) {
      $staff_id[] =$value->id;
    }
   if($store_id == "0")
  {
     $title = "Head Office Staff"; 
  }else{
   $store_name =Store::find($store_id);
    $title =$store_name->store_name." Staff";
  }
$payroll = Payroll::where([['month',$request->month],['year',$request->year]])->whereIn('staff_id', $staff_id)->get();
}
     if(count($payroll) == 0)
     {
        Session::flash('warning','No records avalaible');
        return back();
     }
     return view('home.displaypayroll')->withP($payroll)->withM($request->month)->withY($request->year)->withT( $title);
     } 
//===================================== generate paslip ===========================================
    public function generatepayslip()
    {
    return view('home.generatepayslip');
 }  
 //===================================== generate payslip===========================================
    public function post_generatepayslip(Request $request)
    {

     $payroll = Payroll::where([['month',$request->month],['year',$request->year]])->get();
  
     if(count($payroll) == 0)
     {
        Session::flash('warning','No records avalaible');
        return back();
     }
     return view('home.displaypayslip')->withP($payroll)->withM($request->month)->withY($request->year);
     } 
//===================================== print payslip ===========================================
    public function printpayslip($id)
    {
     $payroll = Payroll::find($id);
     if(count($payroll) == 0)
     {
        Session::flash('warning','No records avalaible');
        return back();
     }
     return view('home.printpayslip')->withP($payroll);
     } 
//===================================staff report =====================================

     public function staffreport()
    {
    $getStore =Store::get();
   
   return view('home.staffreport')->withS($getStore);
    }

    //========================================= post staff report============================

     public function poststaffreport(Request $request)
    {
   
$view=$request->view;
if($view =="All")
{
$title ="ALL Staff";
$staff =Staff::where('status','!=',self::terminate)->get();
}
elseif($view =="terminated")
{
$title ="ALL Terminated Staff";
$staff =Staff::where('status',self::terminate)->get();
}
elseif($view =="purchase_date")
{
    $jobType=$request->jobType;
  $title =$jobType."&nbsp;&nbsp;Staff";

  
$staff =Staff::where([['status','!=',self::terminate],['jobType',$jobType]])->get();
}
elseif($view =="manufactured_date")
{
    $store_id =$request->store_id;
   if($store_id == "0")
  {
     $title = "Head Office Staff"; 
  }else{
   $store_name =Store::find($store_id);
    $title =$store_name->store_name." Staff";
  }


$staff =Staff::where([['status','!=',self::terminate],['store_id',$store_id]])->get();
}

   return view('home.displaystaffreport')->withS($staff)->withV($title);
} 

public function edit_staff($id)
{ $getStore =Store::get();
    $getStoreType =StoreType::get();
   
        //return view('home.newstaff')->withSt($getStoreType)->withState($getState)->withStore($getStore);
$staff = Staff::find($id);
 return view('home.edit_staff')->withS($staff)->withSt($getStoreType);
}

//===================================== invested amount ===========================================
    public function investedamount()
    {
      $s = Store::get();
    return view('home.investedamount')->withS($s);
 }  
 //===================================== invested amount===========================================
    public function post_investedamount(Request $request)
    {
        $this->validate($request,array(
      'posted_date'=>'required','detail'=>'required','store_id'=>'required','invest_type'=>'required','credit'=>'required',));
     $ceo_account = new CeoAccount;
      $ceo_account->user_id = Auth::user()->id;
     $ceo_account->posted_date = $request->posted_date;
     $ceo_account->credit = floatval(preg_replace('/[^\d.]/', '',$request->credit));
      $ceo_account->store_id = $request->store_id;
     $ceo_account->investment_type = $request->invest_type;
     $ceo_account->detail = $request->detail;
     $ceo_account->status = self::credit;
     $ceo_account->save();
     Session::flash('success','successfull');
        return back();
     }
  //===================================== ceo drawn amount ===========================================
    public function drawnamount()
    {
    return view('home.drawnamount');
 }  
 //===================================== ceo drawn amount===========================================
    public function post_drawnamount(Request $request)
    {
        $this->validate($request,array(
      'posted_date'=>'required','detail'=>'required',));
     $ceo_account = new CeoAccount;
      $ceo_account->user_id = Auth::user()->id;
     $ceo_account->posted_date = $request->posted_date;
     $ceo_account->debit = floatval(preg_replace('/[^\d.]/', '',$request->debit));
     $ceo_account->detail = $request->detail;
     $ceo_account->status = self::debit;
     $ceo_account->save();
     Session::flash('success','successfull');
        return back();
     }
  //===================================== ceo report ===========================================
    public function ceo_account_report()
    {
    return view('home.ceo_account_report');
 }  
 //===================================== invested amount===========================================
    public function post_ceo_account_report(Request $request)
    {
$all =$request->all;
$s =$request->start_date;
$e =$request->end_date;
if($all !== null)
{
  $ceo_account_credit =CeoAccount::where('status',self::credit)->get();
  $ceo_account_debit =CeoAccount::where('status',self::debit)->get();
  return view('home.display_ceo_account_report')->withCr($ceo_account_credit)->withDb($ceo_account_debit);
}
elseif($s && $e !== null)
{
   $ceo_account_credit =CeoAccount::where('status',self::credit)
   ->whereDate('posted_date','>=',$s)->whereDate('posted_date','<=',$e)
   ->get();
  $ceo_account_debit =CeoAccount::where('status',self::debit)
  ->whereDate('posted_date','>=',$s)->whereDate('posted_date','<=',$e)
  ->get();

  return view('home.display_ceo_account_report')->withCr($ceo_account_credit)->withDb($ceo_account_debit)->withS($s)->withE($e);
}else
{
   Session::flash('warning','Please select a parameter to view your report');
    return back();
}
     
        
     }

//===================================== bank adjustment ===========================================
    public function bank_adjustment()
    {
    return view('home.bank_adjustment');
 }  
 //===================================== invested amount===========================================
    public function post_bank_adjustment(Request $request)
    {
        $this->validate($request,array(
      'customer_detail'=>'required','amount'=>'required','status'=>'required','trans_detail'=>'required'));
        $date =Date("Y-m-d");
     $bank_post = new BankPost;
      $bank_post->user_id = Auth::user()->id;
      $bank_post->store_id = 0;
    $bank_post->posted_date = $date;
       $bank_post->status = $request->status;
       if($bank_post->status == Self::credit)
       {
      $bank_post->credit = floatval(preg_replace('/[^\d.]/', '',$request->amount));
    }else{
      $bank_post->debit = floatval(preg_replace('/[^\d.]/', '',$request->amount));
    }
     $bank_post->customer_detail = $request->customer_detail;
  
     $bank_post->trans_detail = $request->trans_detail;
    $bank_post->teller_number = $request->teller_number;
     $bank_post->save();
    
     Session::flash('success','successfull');
        return back();
     }  

 //===================================== bank credit ===========================================
    public function bank_credit()
    {
      $store = Store::get();
    return view('home.bank_credit')->withS($store);
 }  
 //=====================================post bank credit===========================================
    public function post_bank_credit(Request $request)
    {
        $this->validate($request,array(
      'customer_detail'=>'required','amount'=>'required','trans_detail'=>'required','store_id'=>'required'));
        $date =Date("Y-m-d");
     $bank_post = new BankPost;
      $bank_post->user_id = Auth::user()->id;
      $bank_post->store_id = $request->store_id;
    $bank_post->posted_date = $date;
       $bank_post->status = self::credit;
      
      $bank_post->credit = floatval(preg_replace('/[^\d.]/', '',$request->amount));
  
     $bank_post->customer_detail = $request->customer_detail;
  
     $bank_post->trans_detail = $request->trans_detail;
    $bank_post->teller_number = $request->teller_number;
     $bank_post->save();
    
     Session::flash('success','successfull');
        return back();
     } 

 //===================================== bank debit ===========================================
    public function bank_debit()
    {
    return view('home.bank_debit');
 }  
 //=====================================post bank debit===========================================
    public function post_bank_debit(Request $request)
    {
        $this->validate($request,array(
      'customer_detail'=>'required','amount'=>'required','trans_detail'=>'required'));
        $date =Date("Y-m-d");
     $bank_post = new BankPost;
      $bank_post->user_id = Auth::user()->id;
      $bank_post->store_id = 0;
    $bank_post->posted_date = $date;
       $bank_post->status = self::debit;
      
      $bank_post->debit = floatval(preg_replace('/[^\d.]/', '',$request->amount));
  
     $bank_post->customer_detail = $request->customer_detail;
  
     $bank_post->trans_detail = $request->trans_detail;
    $bank_post->teller_number = $request->teller_number;
     $bank_post->save();
    
     Session::flash('success','successfull');
        return back();
     } 
//===================================== ceo report ===========================================
    public function bank_reconcelation()
    {
    return view('home.bank_reconcelation');
 }  
 //===================================== invested amount===========================================
    public function post_bank_reconcelation(Request $request)
    {

$s =$request->start_date;
$e =$request->end_date;

if($s && $e !== null)
{
   $bank_post_credit =BankPost::where('status',self::credit)
   ->whereDate('posted_date','>=',$s)->whereDate('posted_date','<=',$e)
   ->get();
  $bank_post_debit =BankPost::where('status',self::debit)
  ->whereDate('posted_date','>=',$s)->whereDate('posted_date','<=',$e)
  ->get();

  return view('home.display_bank_reconcelation')->withCr($bank_post_credit)->withDb($bank_post_debit)->withS($s)->withE($e);
}else
{
   Session::flash('warning','Please select a parameter to view your report');
    return back();
}
     
        
     }
//===================================drugs name=================================================

     public function drugsname()
    {
$drugsfamily =DrugsFamily::orderBy('drug_name','ASC')->get();

   return view('home.drugsname')->withD($drugsfamily);
    } 
//===============================post drugs name===================================================

     public function postdrugsname(Request $request)
    {
    $this->validate($request,array(
        'drugname'=>'required','drugfamily_id'=>'required',));
    $id =$request->drugfamily_id;
    $d_name =strtoupper($request->drugname);
$check =DrugsName::where([['drugsfamily_id',$id],['drugname',$d_name]])->first();
if(count($check) == 0)
{
    $drugsname =new DrugsName;
      $drugsname->drugname =$d_name;
      $drugsname->drugsfamily_id =$id;
   $drugsname->save();
   Session::flash('success',"success");
 }else
 {
   Session::flash('warning',"Please drugs name with the family name already exist !!! ");
 }
 return redirect()->action('HomeController@drugsname');
    }  
//===========================view drugs name ========================================
   public function view_drugsname()
    {
   $drugs =DrugsFamily::get();
    return view('home.view_drugsname')->withD($drugs);
    }
 //===========================edit drugs name ========================================
   public function edit_drugsname($id)
    {
   $drugs =DrugsName::find($id);
    return view('home.edit_drugsname')->withD($drugs);
    } 
 //===========================post edit drugs name ========================================
   public function post_edit_drugsname(Request $request,$id)
    {
   $drugs =DrugsName::find($id);
   if(count($drugs) == 0)
   {
      return redirect()->action('HomeController@view_drugsname');
   }
   $drugs->drugname = strtoupper($request->drugname);
   $drugs->save();
Session::flash('success',"success");
  return redirect()->action('HomeController@view_drugsname');
    }
 //===================================stock controll==============================================

     public function stockcontrol()
    {
$store =Store::get();
   return view('home.stockcontrol')->withS($store);
    } 
//============================================================================================================

     public function poststockcontrol(Request $request)
    {
     
    $this->validate($request,array(
        'store'=>'required','s_date'=>'required','e_date'=>'required',));
$store_id =$request->store;
$s_date =$request->s_date;
$e_date =$request->e_date;
 $store =Store::find($store_id);
    $drugs = DrugsName::get();

  return view('home.displaystockcontrol')->withS($store)->withD($drugs)->withSd($s_date)->withEd($e_date);
    } 
//===================================vat adjustment=============================================

     public function vatadjustment()
    {

   return view('home.vatadjustment');
    } 
//============================================================================================================

     public function postvatadjustment(Request $request)
    {
     
    $this->validate($request,array(
        'id'=>'required',));
$id =$request->id;
$order =Order::find($id);
if(count($order) > 0)
{
  return view('home.vatadjustment')->withO($order);
}
Session::flash('warning',"Please Check your invoice number");
return back();
    } 
    //==================================update vat adjustment ===================
  public function updatevat(Request $request,$id)
    {
     $this->validate($request,array('vat'=>'required',));
if(isset($id))
{
$order =Order::find($id); 
$order->vat =$request->vat;
$order->save(); 
Session::flash('success',"success");
  return redirect()->action('HomeController@vatadjustment');
}
Session::flash('warning',"Please Check your invoice number");
return back();
    } 

 //===================================vat report=============================================

     public function taxreport()
    {
return view('home.taxreport');
    } 
//=========================================vat report=========================================================

     public function posttaxreport(Request $request)
    {
      $this->validate($request,array(
        's_date'=>'required','e_date'=>'required',));
$s =$request->s_date;
$e =$request->e_date;
$s_year = date('Y',strtotime($s));
$s_month = date('F',strtotime($s));
$year = date('Y',strtotime($e));
$month = date('F',strtotime($e));


if($s && $e !== null)
{
   $vat_order =Order::whereDate('order_date','>=',$s)->whereDate('order_date','<=',$e)->get();
  $tax_salary =Payroll::whereIn('month',[$s_month,$month])->whereIn('year',[$s_year,$year])->get();

  return view('home.displaytaxreport')->withVo($vat_order)->withTs($tax_salary)->withSd($s)->withEd($e);
}else
{
   Session::flash('warning','Please select a parameter to view your report');
    return back();
}
     
}  

 //===================================personel account create=============================================

     public function createaccount()
    {
return view('home.createaccount');
    } 
//=========================================personel account post============================

     public function post_createaccount(Request $request)
    {
      $this->validate($request,array('account'=>'required','account_code'=>'required',));
$account =strtoupper($request->account);
$account_code =strtoupper($request->account_code);
//-------check if exist-----------------------------------
$check =PersonelAccount::where('account_code',$account_code)->first();
if(count($check) > 0)
{
  Session::flash('warning','account name already exist.');
    return back();
}

   $personelaccount =new PersonelAccount;
   $personelaccount->account_name =$account;
      $personelaccount->account_code =$account_code;
   $personelaccount->save();
   Session::flash('success','successfull');
    return back();
} 
//================================= view personale ==================================================

public  function viewaccount()
{
  $personelaccount =PersonelAccount::get();

  return view('home.viewaccount')->withP($personelaccount);
} 
//=====================edit personel account ===========================
public  function editpersonelaccount($id)
{
  $personelaccount =PersonelAccount::find($id);
  if(count($personelaccount) == 0)
  {
    Session::flash('warning','personel account does not exist');
    return back();
  }

  return view('home.editpersonelaccount')->withP($personelaccount);
} 
//=====================post edit personel account ===========================
public  function post_editpersonelaccount(Request $request ,$id)
{
  $personelaccount =PersonelAccount::find($id);
  if(count($personelaccount) == 0)
  {
    Session::flash('warning','personel account does not exist');
    return back();
  }
$personelaccount->account_name = strtoupper($request->account);
$personelaccount->account_code = $request->account_code;
$personelaccount->save();
 return redirect()->action('HomeController@viewaccount');
} 
//===================================Asset create=============================================

     public function createasset()
    {
return view('home.createasset');
    } 
//========================================= post asset============================

     public function post_createasset(Request $request)
    {
      $this->validate($request,array(
        'asset_name'=>'required',
        'cost_of_item'=>'required',
        'duration'=>'required',
        'asset_type'=>'required',
        'purchase_date'=>'required',
        'manufactured_date'=>'required',
        'depreciation_value'=>'required',
        'salvage_date'=>'required',));


   $asset =new Asset;
    $asset->user_id =Auth::user()->id;
   $asset->asset_name =strtoupper($request->asset_name);
   $asset->cost_of_item =$request->cost_of_item;
    $asset->duration =$request->duration;
   $asset->asset_type =$request->asset_type;
  $asset->purchase_date =$request->purchase_date;
   $asset->manufactured_date=$request->manufactured_date;
    $asset->depreciation_value =$request->depreciation_value;
   $asset->salvage_date =$request->salvage_date;
   $asset->save();
   Session::flash('success','successfull');
    return back();
} 
//================================= view asset ==================================================

public  function viewasset()
{
  $asset =Asset::orderBy('id','DESC')->paginate(50);

  return view('home.viewasset')->withAsset($asset);
} 
//=====================edit asset ===========================
public  function editasset($id)
{
  $asset =Asset::find($id);
  if(count( $asset) == 0)
  {
    Session::flash('warning','Asset  does not exist');
    return back();
  }

  return view('home.editasset')->withV($asset);
} 
//=====================post edit asset ===========================
public  function post_editasset(Request $request ,$id)
{
  $asset =Asset::find($id);
  if(count($asset) == 0)
  {
    Session::flash('warning','personel account does not exist');
    return back();
  }
 $asset->user_id =Auth::user()->id;
   $asset->asset_name =strtoupper($request->asset_name);
   $asset->cost_of_item =$request->cost_of_item;
    $asset->duration =$request->duration;
   $asset->asset_type =$request->asset_type;
  $asset->purchase_date =$request->purchase_date;
   $asset->manufactured_date=$request->manufactured_date;
    $asset->depreciation_value =$request->depreciation_value;
   $asset->salvage_date =$request->salvage_date;
   $asset->save();
 return redirect()->action('HomeController@viewasset');
} 
//=====================delete asset===========================
public  function deleteasset($id)
{
  $asset =Asset::find($id);
  if(count( $asset) == 0)
  {
    Session::flash('warning','Asset  does not exist');
    return back();
  }
 $asset->delete();
return redirect()->action('HomeController@viewasset');
} 

//===================================Asset print=============================================

     public function printasset()
    {
return view('home.printasset');
    } 
//========================================= post print asset============================

     public function post_printasset(Request $request)
    {
   
$view=$request->view;
if($view =="All")
{

$asset =Asset::get();
}elseif($view =="purchase_date")
{
  $s_date =$request->purchase_date;
  $e_date =$request->purchase_date1;
$asset =Asset::whereDate('purchase_date','>=',$s_date)->whereDate('purchase_date','<=',$e_date)->get();
}
elseif($view =="manufactured_date")
{
  $s_date =$request->manufactured_date;
  $e_date =$request->manufactured_date1;
$asset =Asset::whereDate('manufactured_date','>=',$s_date)->whereDate('manufactured_date','<=',$e_date)->get();
}

   return view('home.displayprintasset')->withAsset($asset)->withV($view);
} 

//===================================Asset print=============================================

     public function depreciation()
    {
return view('home.depreciation');
    } 
//========================================= post print asset============================

     public function post_depreciation(Request $request)
    {
   $this->validate($request,array(
        's_date'=>'required',
        'e_date'=>'required',
        ));
$asset_type=$request->asset_type;

  $s_date =$request->s_date;
  $e_date =$request->e_date;
  if($asset_type == null){
    $asset =Asset::whereDate('salvage_date','>=',$s_date)->whereDate('salvage_date','<=',$e_date)->get();
  }else{
$asset =Asset::where('asset_type',$asset_type)->whereDate('salvage_date','>=',$s_date)->whereDate('salvage_date','<=',$e_date)->get();
}
Session::flash('success','successfull');
return view('home.displaydepreciation')->withAsset($asset);
} 

//===================================Impress create=============================================

     public function impress()
    {
return view('home.impress');
    } 
//========================================= post asset============================

     public function postimpress(Request $request)
    {
      $this->validate($request,array(
        'amount'=>'required',
        'date'=>'required',
      ));

$impress =new Impress;
$impress->user_id =Auth::user()->id;
$impress->amount =floatval(preg_replace('/[^\d.]/', '',$request->amount));
$impress->date =$request->date;
$impress->save();
   Session::flash('success','successfull');
    return back();
} 
//================================= view asset ==================================================

public  function viewimpress()
{
  $impress =Impress::orderBy('id','DESC')->paginate(50);

  return view('home.viewimpress')->withImpress($impress);
} 
//=====================edit impress ===========================
public  function editimpress($id)
{
   $impress =Impress::find($id);
  if(count($impress) == 0)
  {
    Session::flash('warning',' Impress   does not exist');
    return back();
  }

  return view('home.editimpress')->withV($impress);
} 
//=====================post edit impress ===========================
public  function post_editimpress(Request $request ,$id)
{
  $impress =Impress::find($id);
  if(count($impress ) == 0)
  {
    Session::flash('warning','personel account does not exist');
    return back();
  }
  $impress->user_id =Auth::user()->id;
   $impress->amount =floatval(preg_replace('/[^\d.]/', '',$request->amount));
$impress->date =$request->date;

   $impress->save();
   Session::flash('success','successfull');
 return redirect()->action('HomeController@viewimpress');
}

//===================================running cost=============================================

     public function runningcost()
    { $store =Store::get();
      $pa =PersonelAccount::get();
return view('home.runningcost')->withPa($pa)->withS($store);
    } 
//========================================= post asset============================

     public function postrunningcost(Request $request)
    {
      $this->validate($request,array(
        'code'=>'required',
        'store_id'=>'required',
          'qty'=>'required',
        'amount'=>'required',
        'date'=>'required',
      ));

$runningcost=new RunningCost;
$runningcost->user_id =Auth::user()->id;
$runningcost->code =$request->code;
$runningcost->store_id =$request->store_id;
$runningcost->qty =$request->qty;
$runningcost->amount =floatval(preg_replace('/[^\d.]/', '',$request->amount));
$runningcost->date =$request->date;
$runningcost->remark =$request->remark;
$runningcost->save();
   Session::flash('success','successfull');
    return back();
} 
//================================= view asset ==================================================

public  function viewrunningcost()
{
 $store =Store::get();

  return view('home.viewrunningcost')->withS($store);
} 

public  function postviewrunningcost(Request $request)
{
   $store =Store::get();
   $this->validate($request,array(
     'store_id'=>'required',
      's_date'=>'required',
        'e_date'=>'required',
      ));

  $store_id = $request->store_id; 
  $s_date = $request->s_date; 
  $e_date = $request->e_date;

  if($store_id == "0")
  {
    $store_name = "Head Office"; 
  }else{
   $store_name =Store::find($store_id);
   $store_name =$store_name->store_name;
  }

 $runningcost =RunningCost::where('store_id',$store_id)->whereDate('date','>=',$s_date)->whereDate('date','<=',$e_date)->orderBy('id','DESC')->get();

  return view('home.viewrunningcost')->withRc($runningcost)->withS($store)->withSn($store_name);
}
//=====================edit running cost ===========================
public  function editrunningcost($id)
{
  $pa =PersonelAccount::get();
   $rc =RunningCost::find($id);
  if(count($rc) == 0)
  {
    Session::flash('warning',' Running Cost  does not exist');
    return back();
  }

  return view('home.editrunningcost')->withV($rc)->withPa($pa);
} 
//=====================post edit runningcost ===========================
public  function post_editrunningcost(Request $request ,$id)
{
   $this->validate($request,array(
        'code'=>'required',
          'qty'=>'required',
        'amount'=>'required',
        'date'=>'required',
      ));
 $runningcost=RunningCost::find($id);
  if(count($runningcost ) == 0)
  {
    Session::flash('warning','personel account does not exist');
    return back();
  }
$runningcost->code =$request->code;
$runningcost->user_id =Auth::user()->id;
$runningcost->qty =$request->qty;
$runningcost->amount =floatval(preg_replace('/[^\d.]/', '',$request->amount));
$runningcost->date =$request->date;
$runningcost->remark =$request->remark;
$runningcost->save();
Session::flash('success','successfull');
 return redirect()->action('HomeController@viewrunningcost');
}
//================================= view asset ==================================================

public  function expensesreport()
{
 return view('home.expensesreport');
} 

public  function postexpensesreport(Request $request)
{
   $store =Store::get();
   $this->validate($request,array(
     's_date'=>'required',
        'e_date'=>'required',
      ));


  $s_date = $request->s_date; 
  $e_date = $request->e_date;
$impress =Impress::whereDate('date','>=',$s_date)->whereDate('date','<=',$e_date)->orderBy('id','DESC')->get();
 
 $runningcost =RunningCost::whereDate('date','>=',$s_date)->whereDate('date','<=',$e_date)->orderBy('store_id','ASC')->orderBy('id','DESC')->get();

return view('home.displayexpensesreport')->withRc($runningcost)->withImprss($impress)->withS($s_date)->withE($e_date);
}

//===================================Ledger=============================================

     public function createledger()
    { $store =Store::get();
      
return view('home.createledger')->withS($store);
    } 
//========================================= post ledger============================

     public function postcreateledger(Request $request)
    {
    
      $this->validate($request,array(
       'store_id'=>'required',
        'customer'=>'required',
        'amount'=>'required',
        'date'=>'required',
        'transaction'=>'required',
      ));

$ledger =new Ledger;
$ledger->user_id =Auth::user()->id;
$ledger->customer =$request->customer;
$ledger->store_id =$request->store_id;
$ledger->status =1;
$ledger->amount =$request->amount;
$ledger->date =$request->date;
$ledger->transaction =$request->transaction;
$ledger->save();
   Session::flash('success','successfull');
    return back();
} 
//================================= view ledger ==================================================

public  function viewledger()
{
 $store =Store::get();

  return view('home.viewledger')->withS($store);
} 

public  function postviewledger(Request $request)
{
   $store =Store::get();
   $this->validate($request,array(
     'store_id'=>'required',
      's_date'=>'required',
        'e_date'=>'required',
      ));

  $store_id = $request->store_id; 
   $status = 1; 
  $s_date = $request->s_date; 
  $e_date = $request->e_date;

  if($store_id == "0")
  {
    $store_name = "Head Office"; 
  }else{
   $store_name =Store::find($store_id);
   $store_name =$store_name->store_name;
  }
if($status == self::credit)
{
  $s ="Creditor";
}
 $ledger =Ledger::where([['store_id',$store_id],['status',$status]])->whereDate('date','>=',$s_date)->whereDate('date','<=',$e_date)->orderBy('id','DESC')->get();

  return view('home.viewledger')->withL($ledger)->withS($store)->withSn($store_name)->withSt($s);
}
//=====================edit ledger ===========================
public  function editledger($id)
{
$store =Store::get();
   $ledger =Ledger::find($id);
  if(count($ledger) == 0)
  {
    Session::flash('warning',' Creditor  does not exist');
    return back();
  }

  return view('home.editledger')->withV($ledger)->withS($store);
} 
//=====================post edit ledger ===========================
public  function post_editledger(Request $request ,$id)
{
  $this->validate($request,array(
        'store_id'=>'required',
        'customer'=>'required',
        'amount'=>'required',
        'date'=>'required',
        'transaction'=>'required',
      ));



 $ledger=Ledger::find($id);
  if(count($ledger ) == 0)
  {
    Session::flash('warning','Creditor account does not exist');
    return back();
  }
$ledger->user_id =Auth::user()->id;
$ledger->customer =$request->customer;
$ledger->store_id =$request->store_id;
$ledger->amount =$request->amount;
$ledger->date =$request->date;
$ledger->transaction =$request->transaction;
$ledger->save();
Session::flash('success','successfull');
 return redirect()->action('HomeController@viewledger');
}

//=====================Pay creditor===========================
public  function paycreditor($id)
{

   $ledger =Ledger::find($id);
  if(count($ledger) == 0)
  {
    Session::flash('warning',' Creditor  does not exist');
    return back();
  }

  return view('home.paycreditor')->withV($ledger);
} 
//=====================post edit ledger ===========================
public  function postpaycreditor(Request $request)
{
  $this->validate($request,array(
        'amount'=>'required',
        'date'=>'required',
      ));
$ledger=new Ledger;
$ledger->user_id =Auth::user()->id;
$ledger->customer =$request->customer;
$ledger->store_id =$request->store_id;
$ledger->amount =$request->amount;
$ledger->date =$request->date;
$ledger->transaction ="payment";
$ledger->status =2;
$ledger->parent_id =$request->id;
$ledger->save();
Session::flash('success','successfull');
 return redirect()->action('HomeController@viewledger');
}
//========================== get debtor report ===================================================
public function debtors_report()
{
  $store =Store::where('storetype_id',1)->get();

  return view('home.debtors_report')->withS($store);
}

public  function postdebtors_report(Request $request)
{
   $store =Store::get();
   $this->validate($request,array(
     'store_id'=>'required',
      's_date'=>'required',
        'e_date'=>'required',
      ));

  $store_id = $request->store_id; 
  $s_date = $request->s_date; 
  $e_date = $request->e_date;


 $order =Order::where([['store_id',$store_id],['status',0],['payment_type','Debt']])->whereDate('order_date','>=',$s_date)->whereDate('order_date','<=',$e_date)->orderBy('id','DESC')->get();

 $deb_payment =Debtpayment::where('store_id',$store_id)->whereDate('created_at','>=',$s_date)->whereDate('created_at','<=',$e_date)->orderBy('id','DESC')->get();
  return view('home.displaydebtors_report')->withS($store)->withSd($s_date)->withEd($e_date)->withCr($deb_payment)->withDb($order);
}

public  function debtors()
{
 $order =Order::where([['status',0],['payment_type','Debt'],['payment_status',null]])->orderBy('id','DESC')->get();
 return view('home.displaydebtors')->withDb($order);
}
//================================= reportledger ==================================================

public  function ledgerreport()
{
 $store =Store::get();

  return view('home.ledgerreport')->withS($store);
} 

public  function postledgerreport(Request $request)
{
   $store =Store::get();
   $this->validate($request,array(
     'store_id'=>'required',
      's_date'=>'required',
        'e_date'=>'required',
      ));

  $store_id = $request->store_id; 
   $status = self::credit; 
  $s_date = $request->s_date; 
  $e_date = $request->e_date;

  if($store_id == "0")
  {
    $store_name = "Head Office"; 
  }else{
   $store_name =Store::find($store_id);
   $store_name =$store_name->store_name;
  }
if($status == self::credit)
{
  $s ="Creditor";
}else{
  $s ="Debtor";
}
 $ledger =Ledger::where([['store_id',$store_id],['status',$status]])->whereDate('date','>=',$s_date)->whereDate('date','<=',$e_date)->orderBy('id','DESC')->get();

  return view('home.displayledger')->withL($ledger)->withS($store)->withSn($store_name)->withSt($s)->withSd($s_date)->withEd($e_date);
}

//================================= reportledger ==================================================

public  function stockreorder()
{
 $store =Store::get();

  return view('home.stockreorder')->withS($store);
} 
public  function poststockreorder(Request $request)
{
  $date =date('Y-m-d');
  $store_id =$request->store_id;
  if($store_id == 0)
  {
$reorder = DB::table('drugs')
            //->join('drugs_qties', 'drugs.drugname_id', '=', 'drugs_qties.drugsname_id')
             ->join('drugs_qties', [['drugs.drugname_id', '=', 'drugs_qties.drugsname_id'],['drugs.store_id', '=', 'drugs_qties.store_id']])
             ->where('drugs.quantity','>',0)
             ->whereColumn('drugs.reorder_quantity','>=','drugs_qties.qty')
             ->get();
  }else
  {
    $reorder = DB::table('drugs')
            //->join('drugs_qties','drugs.drugname_id', '=', 'drugs_qties.drugsname_id')
              ->join('drugs_qties', [['drugs.drugname_id', '=', 'drugs_qties.drugsname_id'],['drugs.store_id', '=', 'drugs_qties.store_id']])
           ->where('drugs.quantity','>',0)
             ->whereColumn('drugs.reorder_quantity','>=','drugs_qties.qty')
             ->where('drugs.store_id', $store_id)
             ->get();
  }
  //dd($reorder);
 return view('home.displaystockreorder')->withR($reorder)->withSd($date);
          }
    //-------------------------------------------------------------------------------------------------------
public function getlga($id)
{
$sql =Lga::where('state_id',$id)->get();
return $sql;
}
public function getdrugname($id)
{
$sql =DrugsName::where('drugsfamily_id',$id)->get();
return $sql;
}
public function getstaff($id)
{
$sql =Staff::find($id);


return $sql;
}
public function getstaffbystoreid($id)
{
$sql =Staff::where('store_id',$id)->get();
return $sql;
}
public function getstorerole($id)
{
  if($id == 0)
  {
    $sql =Role::whereIn('id', [2, 5])->get();
  }else{
    $sql =Role::whereIn('id', [3, 4, 6])->get();
  }

return $sql;
}
public function getloan($id)
{

$sql =LoanAndCredit::where('staff_id',$id)->orderBy('id','desc')->first();
if($sql->balance > 0)
{
  return $sql;
}



}
public function getstore($id)
{
$sql =Store::where('storetype_id',$id)->get();
return $sql;
}
}
