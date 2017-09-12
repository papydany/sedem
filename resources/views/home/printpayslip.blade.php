@extends('layouts.display')
@section('title','Pay Slip')
@section('content')
   @inject('r','App\R')
   <?php $result= $r->getuser($p->staff_id) ?>
<div class="row" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<div class="col-sm-6 col-sm-offset-3">
<h4 class="text-center">{{$result->staff_name}}</h4>
<p class="text-center">Pay Slip</p>

<p class="text-center">Date :&nbsp;&nbsp;{{$p->month}} &nbsp;&nbsp;&nbsp;  {{$p->year}}</p>
<table class="table table-bordered table-stripe">
<tr>
	
	<th>Basic Salary(tax able)</th>  <td>&#8358;{{number_format($p->salary)}}</td>
	</tr>
	<tr><th>Bonus(No tax)</th>
	<td>&#8358;{{number_format($p->bonus)}}</td></tr>
	<tr><th>Loan deduction</th>
	<td>&#8358;{{number_format($p->loan_deduction)}}</td></tr>
	<tr><th>Other deduction</th>
	<td>&#8358;{{number_format($p->other_deduction)}}</td></tr>
	<tr>
	
	
	
	<th>Tax</th><td>&#8358;{{number_format($p->tax)}}</td></tr>
	<tr><th>Net pay</th>
	<td>&#8358;{{number_format($p->netpay)}}</td>
	
</tr>
		
</table>
</div>
</div>


@endsection