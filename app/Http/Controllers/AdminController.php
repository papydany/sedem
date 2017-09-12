<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        return view('admin.index');
    }
//============================ create officer==============
     public function officer()
    {
    	$role =Role::whereNotIn('id', [1, 2])->get();
        return view('admin.officer')->withR($role);
    }
//============================ post create officer==============
     public function postofficer(Request $request)
    {
    $this->validate($request,array(
        
        'phone'=>'required',
        'address'=>'required',
         'role'=>'required',
        'name' => 'required|string|max:255',
        'username' => 'required|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',));

    $user =new User;
     $user->name =$request->name;
     $user->email = $request->email;
     $user->username = $request->username;
     $user->store_id =Auth::user()->store_id;
     $user->storetype_id = Auth::user()->storetype_id;
     $user->phone = $request->phone;
     $user->address = $request->address;
     $user->plain_password = $request->password;
     $user->password = bcrypt($request->password);
     $user->save();
     $role =Role::find($request->role); // get admin role
$user_role =DB::table('user_roles')->insert(['user_id' => $user->id, 'role_id' => $role->id]);
 Session::flash('success','success');
   return redirect()->action('AdminController@officer');
    }  
//============================== view officer ==================================
    public function viewofficer()
    {
   $user =DB::table('users')
    ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
    ->where('users.store_id',Auth::user()->store_id)
    ->whereNotIn('user_roles.role_id', [1, 2])
     ->get();    
   
        return view('admin.view_officer')->withU($user);
    }
}
