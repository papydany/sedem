  @inject('r','App\R')
  <?php $store =$r->getstorename(Auth::user()->store_id)?>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
      
    </div>
    <!-- Top Menu Items -->
    <div class="nav navbar-left top-nav col-sm-4">
     <a class="navbar-brand" href="{{url('/')}}"><img id="logo" src="{{asset('img/staff/logo.jpg')}}" alt="Logo"></a>
    </div>
    <div class="nav navbar-center top-nav col-sm-4 text-center" style="color: #fff;">
   <h4 class="text-center"><b >SEDEM PHARMATICEUTICAL NIG LTD</b></h4>
    {{$store}}
    </div>
    <ul class="nav navbar-right top-nav">
    
        @if (!Auth::guest())

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li class="divider"></li>
                 <li>
                 <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
             
            </ul>
        </li>
        @endif
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse" >
        <ul class="nav navbar-nav side-nav" style="margin-top: 10px;">
   <li class="active">
<a href="{{url('/')}}"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
</li>      
       

  <?php $result= $r->getrolename(Auth::user()->id) ?>
  @if($result =="supperadmin" || $result =="admin" )

<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-edit"></i>Store<i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo5" class="collapse">
<li><a href="{{url('newstore')}}">Create Store</a></li>
<li><a href="{{url('view_newstore')}}">View Store</a></li>
<li><a href="{{url('storeadmin')}}">Create  Store Admin </a></li>
<li><a href="{{url('view_storeadmin')}}">View Store Admin</a></li>
<!--<li><a href="{{url('headadmin')}}">Create  Headoffice Admin</a></li>
<li><a href="{{url('view_headadmin')}}">View Headoffice Admin</a></li>-->
</ul>
</li>


<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-edit"></i>Staff<i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo4" class="collapse">
<li><a href="{{url('newstaff')}}">Create Staff</a></li>
<li><a href="{{url('view_newstaff')}}">View Staff</a></li>
<li><a href="{{url('leafstaff')}}">Staff On Leaf</a></li>
<li><a href="{{url('staffreport')}}">Staff Report</a></li>
<li><a href="{{url('preparesalary')}}">Prepare Salary</a></li>
<li><a href="{{url('generatepayroll')}}">Generate Payroll</a></li>
<li><a href="{{url('generatepayslip')}}">generate Pay Slip</a></li>


</ul>
</li>
<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo6"><i class="fa fa-fw fa-edit"></i>COE Account<i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo6" class="collapse">
<li><a href="{{url('investedamount')}}">Enter Amount Invested</a></li>
<li><a href="{{url('drawnamount')}}">Enter Amount Drawn</a></li>
<li><a href="{{url('ceo_account_report')}}">Report</a></li>
</ul>
</li>
<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo7"><i class="fa fa-fw fa-edit"></i>Bank Reconcelation<i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo7" class="collapse">
<li><a href="{{url('bank_adjustment')}}">Post Adjustment </a></li>
<li><a href="{{url('bank_credit')}}">Post Credit</a></li>
<li><a href="{{url('bank_debit')}}">Post Debit </a></li>
<li><a href="{{url('bank_reconcelation')}}">View Report</a></li>
<li><a href="{{url('setbankaccount')}}">Set bank Account </a></li>
<li><a href="{{url('viewbankaccount')}}">View Bank Account</a></li>
</ul>
</li>

<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-edit"></i>Drugs<i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo3" class="collapse">
<li><a href="{{url('drugsfamily')}}">Create  drugs Family </a></li>
<li><a href="{{url('view_drugsfamily')}}">View Drugs family</a></li>
<li><a href="{{url('drugsname')}}">Create  Drugs Name </a></li>
<li><a href="{{url('view_drugsname')}}">View Drugs Name</a></li>
</ul>
</li>

<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo9"><i class="fa fa-fw fa-edit"></i>Tax<i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo9" class="collapse">
<li><a href="{{url('settax')}}">Setup Salary Tax </a></li>
<li><a href="{{url('viewtax')}}">View Salary Tax </a></li>
<li><a href="{{url('setvat')}}">Setup Vat </a></li>
<li><a href="{{url('viewvat')}}">View Vat</a></li>
<li><a href="{{url('vatadjustment')}}">Vat Adjustment Form </a></li>
<li><a href="{{url('taxreport')}}">Tax Report</a></li>
</ul>
</li>

<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo11"><i class="fa fa-fw fa-edit"></i>Personal Account<i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo11" class="collapse">
<li><a href="{{url('createaccount')}}">Create Account</a> </li>
<li> <a href="{{url('viewaccount')}}">View Account</a> </li>
<li><a href="{{url('impress')}}">Create Impress </a></li>
<li><a href="{{url('viewimpress')}}">View Impress </a></li>
<li><a href="{{url('runningcost')}}">Running Cost(per store)</a></li>
<li><a href="{{url('viewrunnningcost')}}">View Running Cost(per store)</a></li>
<li><a href="{{url('expensesreport')}}">Expenses Report </a></li>

</ul>
</li>
<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo12"><i class="fa fa-fw fa-edit"></i>Asset<i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo12" class="collapse">
<li><a href="{{url('createasset')}}">Create Asset</a> </li>
<li> <a href="{{url('viewasset')}}">View Asset</a> </li>
<li> <a href="{{url('printasset')}}">Print Asset</a> </li>
<li><a href="{{url('depreciation')}}">View Depreciation Value </a></li>

</ul>
</li>
<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo13"><i class="fa fa-fw fa-edit"></i>Creditor<i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo13" class="collapse">
<li><a href="{{url('createledger')}}">Create  Creditor</a> </li>
<li> <a href="{{url('viewledger')}}">View Creditor</a> </li>
<li> <a href="{{url('ledgerreport')}}">Ledger Report</a> </li>
<!--<li><a href="{{url('viewdebtor')}}">View Debtors </a></li>-->

</ul>
</li>

      @elseif($result =="Manager")
      <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-edit"></i>Drugs<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo5" class="collapse">
                    <li>
                        <a href="{{url('drugs')}}">Create  Drugs</a>
                    </li>
                    <li>
                        <a href="{{url('view_drugs')}}">View Drugs</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{url('storepurchase')}}">Daily Purchase</a></li>
<li><a href="{{url('ao_dailysale')}}">Daily Sales</a></li>
<li><a href="{{url('canceldailysale')}}">Daily Sales Canceled</a></li>
<li><a href="{{url('store_stockreorder')}}" target="_blank">Stock Reordering</a></li>
<li><a href="{{url('storestockcontrol')}}">Stock Control</a></li>
<li><a href="{{url('stockavailable')}}" target="_blank">Stock Avalible</a></li>
<li><a href="{{url('cashier')}}">Sale</a></li>          

 @elseif($result =="AccountOfficer")
<li><a href="{{url('storepurchase')}}">Daily Purchase</a></li>
<li><a href="{{url('ao_dailysale')}}">Daily Sales</a></li>
<li><a href="{{url('canceldailysale')}}">Daily Sales Canceled</a></li>
<li><a href="{{url('store_stockreorder')}}" target="_blank">Stock Reordering</a></li>
<li><a href="{{url('storestockcontrol')}}">Stock Control</a></li>
<li><a href="{{url('stockavailable')}}" target="_blank">Stock Avalible</a></li>

@elseif($result =="cashier")
<li><a href="{{url('cashier')}}">Sale</a></li>
@endif        



           
            
         
          
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>