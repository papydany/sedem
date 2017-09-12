@extends('layouts.display')
@section('title','Pay Roll')
@section('content')
<div class="row col-sm-10 col-sm-offset-1" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Pay Roll</p>

<p class="text-center">Date :&nbsp;&nbsp;{{$m}} &nbsp;&nbsp;&nbsp;  {{$y}}</p>
<p class="text-center"><strong>View By :</strong>&nbsp;&nbsp;{{$t}}</p>
<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	<th>Name</th>
	<th>Basic Salary(tax able)</th>
	<th>Bonus(No tax)</th>
	<th>Loan deduction</th>
	<th>Other deduction</th>
	<th>Tax</th>
	<th>Net pay</th>
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
	<td>&#8358;{{number_format($v->bonus)}}</td>
	<td>&#8358;{{number_format($v->loan_deduction)}}</td>
	<td>&#8358;{{number_format($v->other_deduction)}}</td>
	
	<td>&#8358;{{number_format($v->tax)}}</td>
	<td>&#8358;{{number_format($v->netpay)}}</td>
</tr>

@endforeach
<tr>
<th colspan="7" class="text-center">
Total
</th>
<th>&#8358;
{{number_format($p->sum('netpay'))}}
</th>
</tr>
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No records is available
    </div>

@endif		
</table>
</div>


@endsection