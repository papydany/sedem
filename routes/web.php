<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('getlga/{id}', 'HomeController@getlga');
Route::get('/getdrugname/{id}', 'HomeController@getdrugname');
Route::get('/getstaff/{id}', 'HomeController@getstaff');
Route::get('/getstaffbystoreid/{id}', 'HomeController@getstaffbystoreid');
Route::get('/getstorerole/{id}', 'HomeController@getstorerole');
Route::get('/getloan/{id}', 'HomeController@getloan');
Route::get('/getstore/{id}', 'HomeController@getstore');
Route::get('/supperadmin', ['uses' =>'HomeController@home','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//------------------------ store --------------------------------------------------------------
Route::get('/newstore', ['uses' =>'HomeController@newstore','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/newstore', ['uses' =>'HomeController@postnewstore','middleware' => 'roles','roles'=>['supperadmin','admin']])->name('newstore');
Route::get('/view_newstore', ['uses' =>'HomeController@view_newstore','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/storeadmin', ['uses' =>'HomeController@storeadmin','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/storeadmin', ['uses' =>'HomeController@poststoreadmin','middleware' => 'roles','roles'=>['supperadmin','admin']])->name('storeadmin');
Route::get('/view_storeadmin', ['uses' =>'HomeController@view_storeadmin','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/role', ['uses' =>'HomeController@role','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/role', ['uses' =>'HomeController@postrole','middleware' => 'roles','roles'=>['supperadmin','admin']])->name('role');
Route::get('/view_role', ['uses' =>'HomeController@view_role','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//================= bank account setup =========================
Route::get('/setbankaccount', ['uses' =>'HomeController@setbankaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/setbankaccount', ['uses' =>'HomeController@postsetbankaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/viewbankaccount', ['uses' =>'HomeController@viewbankaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/editbankaccount/{id}', ['uses' =>'HomeController@editbankaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/editbankaccount/{id}', ['uses' =>'HomeController@post_editbankaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//------------------------------------- staff---------------------------------------------------------
Route::get('/newstaff', ['uses' =>'HomeController@newstaff','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/newstaff', ['uses' =>'HomeController@postnewstaff','middleware' => 'roles','roles'=>['supperadmin','admin']])->name('newstaff');
Route::get('/view_newstaff', ['uses' =>'HomeController@view_newstaff','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/set_leaf/{id}', ['uses' =>'HomeController@set_leaf','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/set_leaf/{id}', ['uses' =>'HomeController@post_set_leaf','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/back_from_leaf/{id}', ['uses' =>'HomeController@back_from_leaf','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/terminate/{id}', ['uses' =>'HomeController@terminate','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/profile/{id}', ['uses' =>'HomeController@profile','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/edit_staff/{id}', ['uses' =>'HomeController@edit_staff','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/increase_salary/{id}', ['uses' =>'HomeController@increase_salary','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/increase_salary/{id}', ['uses' =>'HomeController@post_increase_salary','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/takeloan/{id}', ['uses' =>'HomeController@takeloan','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/takeloan/{id}', ['uses' =>'HomeController@post_takeloan','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/leafstaff', ['uses' =>'HomeController@leafstaff','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/preparesalary', ['uses' =>'HomeController@preparesalary','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/preparesalary', ['uses' =>'HomeController@post_preparesalary','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/staffreport', ['uses' =>'HomeController@staffreport','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/staffreport', ['uses' =>'HomeController@poststaffreport','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/activate/{id}', ['uses' =>'HomeController@activate','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/deactivate/{id}', ['uses' =>'HomeController@deactivate','middleware' => 'roles','roles'=>['supperadmin','admin']]);

//---------------------------------------------tax---------------------------------------------
Route::get('/viewtax', ['uses' =>'HomeController@viewtax','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/settax', ['uses' =>'HomeController@settax','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/settax', ['uses' =>'HomeController@post_settax','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/setvat', ['uses' =>'HomeController@setvat','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/setvat', ['uses' =>'HomeController@post_setvat','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/viewvat', ['uses' =>'HomeController@viewvat','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/vatadjustment', ['uses' =>'HomeController@vatadjustment','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/vatadjustment', ['uses' =>'HomeController@postvatadjustment','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/updatevat/{id}', ['uses' =>'HomeController@updatevat','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/taxreport', ['uses' =>'HomeController@taxreport','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/taxreport', ['uses' =>'HomeController@posttaxreport','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//-------------------------------payroll-----------------------------------------------------------------
Route::get('/generatepayroll', ['uses' =>'HomeController@generatepayroll','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/generatepayroll', ['uses' =>'HomeController@post_generatepayroll','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/generatepayslip', ['uses' =>'HomeController@generatepayslip','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/generatepayslip', ['uses' =>'HomeController@post_generatepayslip','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('printpayslip/{id}', ['uses' =>'HomeController@printpayslip','middleware' => 'roles','roles'=>['supperadmin','admin']]);

Route::get('/investedamount', ['uses' =>'HomeController@investedamount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/investedamount', ['uses' =>'HomeController@post_investedamount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/drawnamount', ['uses' =>'HomeController@drawnamount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/drawnamount', ['uses' =>'HomeController@post_drawnamount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//------------------------------ ceo account ----------------------------------------------
Route::get('/ceo_account_report', ['uses' =>'HomeController@ceo_account_report','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/ceo_account_report', ['uses' =>'HomeController@post_ceo_account_report','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//--------------------------------- bank adjustment ------------------------------------------
Route::get('/bank_adjustment', ['uses' =>'HomeController@bank_adjustment','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/bank_adjustment', ['uses' =>'HomeController@post_bank_adjustment','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/bank_credit', ['uses' =>'HomeController@bank_credit','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/bank_credit', ['uses' =>'HomeController@post_bank_credit','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/bank_debit', ['uses' =>'HomeController@bank_debit','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/bank_debit', ['uses' =>'HomeController@post_bank_debit','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/bank_reconcelation', ['uses' =>'HomeController@bank_reconcelation','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/bank_reconcelation', ['uses' =>'HomeController@post_bank_reconcelation','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//------------------------------------ drugs ----------------------------------------------------
Route::get('/drugsname', ['uses' =>'HomeController@drugsname','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/drugsname', ['uses' =>'HomeController@postdrugsname','middleware' => 'roles','roles'=>['supperadmin','admin']])->name('drugsname');
Route::get('/view_drugsname', ['uses' =>'HomeController@view_drugsname','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/edit_drugsname/{id}', ['uses' =>'HomeController@edit_drugsname','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/edit_drugsname/{id}', ['uses' =>'HomeController@post_edit_drugsname','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/drugsfamily', ['uses' =>'HomeController@drugsfamily','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/drugsfamily', ['uses' =>'HomeController@postdrugsfamily','middleware' => 'roles','roles'=>['supperadmin','admin']])->name('drugsfamily');
Route::get('/view_drugsfamily', ['uses' =>'HomeController@view_drugsfamily','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/edit_drugsfamily/{id}', ['uses' =>'HomeController@edit_drugsfamily','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/edit_drugsfamily/{id}', ['uses' =>'HomeController@post_edit_drugsfamily','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//---------------------------------- reports ----------------------------------------------------------
Route::get('/dailypurchase', ['uses' =>'HomeController@dailypurchase','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/dailypurchase', ['uses' =>'HomeController@postdailypurchase','middleware' => 'roles','roles'=>['cashier','Manager','admin','supperadmin','AccountOfficer']])->name('dailypurchase');
Route::get('/dailysale', ['uses' =>'HomeController@dailysale','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/dailysale', ['uses' =>'HomeController@postdailysale','middleware' => 'roles','roles'=>['supperadmin','admin']])->name('dailysale');
Route::get('/stockcontrol', ['uses' =>'HomeController@stockcontrol','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/stockcontrol', ['uses' =>'HomeController@poststockcontrol','middleware' => 'roles','roles'=>['cashier','Manager','admin','supperadmin','AccountOfficer']]);
Route::get('/stockreorder', ['uses' =>'HomeController@stockreorder','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/stockreorder', ['uses' =>'HomeController@poststockreorder','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/debtors_report', ['uses' =>'HomeController@debtors_report','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/debtors_report', ['uses' =>'HomeController@postdebtors_report','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/debtors', ['uses' =>'HomeController@debtors','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/profit_loss', ['uses' =>'HomeController@profit_loss','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/profit_loss', ['uses' =>'HomeController@postprofit_loss','middleware' => 'roles','roles'=>['supperadmin','admin']]);
// --------------------create account route-------------------------------------------------------------
Route::get('/createaccount', ['uses' =>'HomeController@createaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/createaccount', ['uses' =>'HomeController@post_createaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/viewaccount', ['uses' =>'HomeController@viewaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/edit_personelaccount/{id}', ['uses' =>'HomeController@editpersonelaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/edit_personelaccount/{id}', ['uses' =>'HomeController@post_editpersonelaccount','middleware' => 'roles','roles'=>['supperadmin','admin']]);
// --------------------create asset route-------------------------------------------------------------
Route::get('/createasset', ['uses' =>'HomeController@createasset','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/createasset', ['uses' =>'HomeController@post_createasset','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/viewasset', ['uses' =>'HomeController@viewasset','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/edit_asset/{id}', ['uses' =>'HomeController@editasset','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/edit_asset/{id}', ['uses' =>'HomeController@post_editasset','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/delete_asset/{id}', ['uses' =>'HomeController@deleteasset','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/printasset', ['uses' =>'HomeController@printasset','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/printasset', ['uses' =>'HomeController@post_printasset','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/depreciation', ['uses' =>'HomeController@depreciation','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/depreciation', ['uses' =>'HomeController@post_depreciation','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//--------------------------create impress------------------------------------------------------
Route::get('/impress', ['uses' =>'HomeController@impress','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/impress', ['uses' =>'HomeController@postimpress','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/viewimpress', ['uses' =>'HomeController@viewimpress','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/edit_impress/{id}', ['uses' =>'HomeController@editimpress','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/edit_impress/{id}', ['uses' =>'HomeController@post_editimpress','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//--------------------------running cost------------------------------------------------------
Route::get('/runningcost', ['uses' =>'HomeController@runningcost','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/runningcost', ['uses' =>'HomeController@postrunningcost','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/viewrunnningcost', ['uses' =>'HomeController@viewrunningcost','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/viewrunnningcost', ['uses' =>'HomeController@postviewrunningcost','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/edit_runningcost/{id}', ['uses' =>'HomeController@editrunningcost','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/edit_runningcost/{id}', ['uses' =>'HomeController@post_editrunningcost','middleware' => 'roles','roles'=>['supperadmin','admin']]);

//-------------------------------expenses report-------------------------------------------
Route::get('/expensesreport', ['uses' =>'HomeController@expensesreport','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/expensesreport', ['uses' =>'HomeController@postexpensesreport','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//--------------------------Ledger-----------------------------------------------------
Route::get('/createledger', ['uses' =>'HomeController@createledger','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/createledger', ['uses' =>'HomeController@postcreateledger','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/viewledger', ['uses' =>'HomeController@viewledger','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/viewledger', ['uses' =>'HomeController@postviewledger','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/edit_ledger/{id}', ['uses' =>'HomeController@editledger','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/edit_ledger/{id}', ['uses' =>'HomeController@post_editledger','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/ledgerreport', ['uses' =>'HomeController@ledgerreport','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/ledgerreport', ['uses' =>'HomeController@postledgerreport','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::get('/paycreditor/{id}', ['uses' =>'HomeController@paycreditor','middleware' => 'roles','roles'=>['supperadmin','admin']]);
Route::post('/paycreditor', ['uses' =>'HomeController@postpaycreditor','middleware' => 'roles','roles'=>['supperadmin','admin']]);
//=============================================================================
// Admin
Route::get('/admin', ['uses' =>'AdminController@index','middleware' => 'roles','roles'=>'admin']);
Route::get('/officer', ['uses' =>'AdminController@officer','middleware' => 'roles','roles'=>'admin']);
Route::post('/officer', ['uses' =>'AdminController@postofficer','middleware' => 'roles','roles'=>'admin'])->name('officer');;
Route::get('/view_officer', ['uses' =>'AdminController@viewofficer','middleware' => 'roles','roles'=>'admin']);

//==========================================================================================================================
//Sale
Route::get('/cashier', ['uses' =>'CashierController@index','middleware' => 'roles','roles'=>['cashier','Manager','admin']]);
Route::post('/cashier', ['uses' =>'CashierController@index','middleware' => 'roles','roles'=>['cashier','Manager','admin']]);
//==================================================================================================================
//Sale
Route::get('/Manager', ['uses' =>'ManagerController@index','middleware' => 'roles','roles'=>'Manager']);
Route::get('/drugs', ['uses' =>'ManagerController@drugs','middleware' => 'roles','roles'=>['Manager','admin']]);
Route::post('/drugs', ['uses' =>'ManagerController@postdrugs','middleware' => 'roles','roles'=>['Manager','admin']])->name('drugs');
Route::get('/view_drugs', ['uses' =>'ManagerController@view_drugs','middleware' => 'roles','roles'=>['Manager','admin']]);


//======================================cashier ========================================================
Route::get('autocomplete_code',array('as'=>'autocomplete_code','uses'=>'CashierController@autocomplete_code'));
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'CashierController@autocomplete'));
Route::post('search',array('as'=>'search','uses'=>'CashierController@search'));
//Route::get('search',array('as'=>'search','uses'=>'CashierController@search'));
Route::get('remove/{rowId}',array('as'=>'remove/{rowId}','uses'=>'CashierController@remove'));
Route::post('process',array('as'=>'process','uses'=>'CashierController@process'));
Route::get('process',array('as'=>'process','uses'=>'CashierController@process'));
Route::post('order',array('as'=>'order','uses'=>'CashierController@order'));
Route::get('/storedailysale', ['uses' =>'CashierController@storedailysale','middleware' => 'roles','roles'=>['cashier','supperadmin','admin']]);
Route::post('/storedailysale', ['uses' =>'CashierController@poststoredailysale','middleware' => 'roles','roles'=>['cashier','Manager','admin']]);
Route::get('/cancelorder/{id}', ['uses' =>'CashierController@cancelorder','middleware' => 'roles','roles'=>['cashier','AccountOfficer','Manager']]);
Route::get('/orderdetail/{id}', ['uses' =>'CashierController@orderdetail','middleware' => 'roles','roles'=>['cashier','AccountOfficer','Manager']]);
Route::get('/printref/{id}', ['uses' =>'CashierController@printref','middleware' => 'roles','roles'=>['cashier','AccountOfficer','Manager']]);
Route::get('/store_stockreorder', ['uses' =>'CashierController@stockreorder','middleware' => 'roles','roles'=>['cashier','AccountOfficer','Manager']]);
Route::post('/store_stockreorder', ['uses' =>'CashierController@poststockreorder','middleware' => 'roles','roles'=>['cashier','Manager','Manager']]);
//===========================================account officer ============================
Route::get('/ao_dailysale', ['uses' =>'ManagerController@ao_dailysale','middleware' => 'roles','roles'=>['AccountOfficer','Manager']]);
Route::post('/ao_dailysale', ['uses' =>'ManagerController@post_ao_dailysale','middleware' => 'roles','roles'=>['AccountOfficer','Manager']]);
Route::get('/canceldailysale', ['uses' =>'ManagerController@canceldailysale','middleware' => 'roles','roles'=>['AccountOfficer','Manager']]);
Route::post('/canceldailysale', ['uses' =>'ManagerController@post_canceldailysale','middleware' => 'roles','roles'=>['AccountOfficer','Manager']]);
//===============================generally ==================================================
Route::get('/storepurchase', ['uses' =>'GeneralController@storepurchase','middleware' => 'roles','roles'=>['cashier','Manager','AccountOfficer']]);
Route::get('/storestockcontrol', ['uses' =>'GeneralController@storestockcontrol','middleware' => 'roles','roles'=>['cashier','Manager','AccountOfficer']]);
Route::get('/stockavailable', ['uses' =>'GeneralController@stockavailable','middleware' => 'roles','roles'=>['cashier','Manager','AccountOfficer']]);
Route::get('/storesale', ['uses' =>'GeneralController@storesale','middleware' => 'roles','roles'=>['cashier','Manager','admin']]);

