<?php

namespace App;
use DB;
use App\Store;
use App\Leaf;
use App\Staff;
use App\DrugsName;
use App\Drug;
use App\DrugsQty;
use App\PersonelAccount;
use App\User;
class R
{


   public function getrolename($id){
        $user = DB::table('roles')
            ->join('user_roles', 'roles.id', '=', 'user_roles.role_id')
            ->where('user_roles.user_id',$id)
            ->first();
            return $user->role_name;    
   }

   public function getstorename($id){
    if($id == 0)
    {
      return "Head Office";
    }
        $user = Store::find($id);
        return $user->store_name; 
    
}
public function getstoredetail($id){
        $user = Store::find($id);
        return $user; 
    
}
public function getPersonelAccount($id){
        $pa = PersonelAccount::where('account_code',$id)->first();
        return $pa->account_name; 
    
}
public function getuser($id){
        $user = Staff::find($id);
        return $user; 
    
}
public function g_user($id){
        $user = User::find($id);
        return $user; 
    
}
public function getleafdate($id){
        $date = leaf::where('staff_id',$id)->orderBy('start_date','dsc')->first();
        return $date; 
    
}
   public function getrole($id){
        $user = Role::find($id);
            
      return $user->role_name; 
    
} 
   public function getstatus($id){
     switch($id) {
       
      case $id == 1:
              return "Active";
                 break;
            case $id == 2:
               return "On Leaf";
                break;
            case $id == 3:
                
                  return "Terminated";
                break;
                
            
            
        }
    
} 
 
   public function drugsname($id)
    {

  $drugs =DrugsName::where('drugsfamily_id',$id)->get();

    return $drugs;
    }
 public function getdrugsqty($store_id,$drugname_id)
    {

  $drugqty =DrugsQty::where([['store_id',$store_id],['drugsname_id',$drugname_id]])->first();

    return $drugqty;
    }

  public function getdrug($store_id,$drugname_id,$s_date,$e_date)
    {

  $drugs = Drug::where([['store_id',$store_id],['drugname_id',$drugname_id]])->whereDate('purchase_date','>=',$s_date)->whereDate('purchase_date','<=',$e_date)->get();

    return $drugs;
    }  


 public function get_latestdrug($store_id,$drugname_id)
    {

  $drugs = Drug::where([['store_id',$store_id],['drugname_id',$drugname_id]])->orderBy('id','DESC')->first();

    return $drugs;
    } 

    public function get_paidcreditor($id)
    {

  $paid = Ledger::where('parent_id',$id)->orderBy('id','DESC')->get();

    return $paid;
    }
}	