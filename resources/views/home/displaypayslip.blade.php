@extends('layouts.admin')
@section('title','Generate payroll')
@section('content')
<div class="row col-sm-12" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Pay Slips</p>

<p class="text-center">Date :&nbsp;&nbsp;{{$m}} &nbsp;&nbsp;&nbsp;  {{$y}}</p>
<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	<th>Name</th>
	<th>Basic Salary(tax able)</th>
	
	<th>Net pay</th>
	<th>Action</th>
</tr>
@if(count($p) > 0)
    @inject('r','App\R')


{{!! $c = 0}}
@foreach($p as $v)
<?php $result= $r->getuser($v->staff_id) ?>
<tr>
	<td>{{++$c}}</td>
	<td>{{$result->staff_name}}</td>
	
	<td>&#8358;{{number_format($v->salary)}}</td>

	<td>&#8358;{{number_format($v->netpay)}}</td>
	<td><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Print<span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{url('printpayslip',$v->id)}}" target="_blank">Print Pay Slip</a></li>
    
  </ul>
</div></td>
</tr>

@endforeach
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No records is available
    </div>

@endif		
</table>
</div>


@endsection