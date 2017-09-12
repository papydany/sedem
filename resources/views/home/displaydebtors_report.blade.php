@extends('layouts.display')
@section('title','Report')
@section('content') 
@inject('r','App\R')

<style type="text/css">

	@media print{
    .sm {width: 50%;padding: 0px;}
    .fl {float: left;}

	}
</style>
<div class="row" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<div class="col-sm-12">
<p class="text-center">Debtor Reconcelation Report</p>
@if(isset($s) && isset($e))
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($s))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($e))}}</p>
@endif
<div class="col-sm-7 sm fl" style="padding-right: 0px;">
<h4 class="text-center">CREDIT</h4>
<table class="table table-bordered table-stripe">
<tr>
	
	<th>Date</th>
	<th>OrderId</th>
	<th>Amount</th>
	
</tr>
@if(count($cr) > 0)
{{!! $c = 0}}
@foreach($cr as $v)

<tr>
	
	<td>{{date('F j , Y',strtotime($v->created_at))}}</td>
  <td>{{$v->order_id}}</td>
	<td>&#8358;{{number_format($v->amount)}}</td>
</tr>

@endforeach
<tr>
<td colspan="2">Total</td>
<td>&#8358;{{number_format($cr->sum('amount'))}}</td>
</tr>
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No  Report is available for the period selected
    </div>

@endif		
</table>
</div>

<div class="col-sm-5 sm fl" style="padding-left: 0px;">
<h4 class="text-center">DEBIT</h4>
<table class="table table-bordered table-stripe">
<tr>
	
	<th>Date</th>
	<th>Order Id</th>
	<th>Amount</th>
	
</tr>
@if(count($db) > 0)
{{!! $c = 0}}
@foreach($db as $v)
<tr>
	
	<td>{{date('F j , Y',strtotime($v->order_date))}}</td>
	<td>{{$v->id}}</td>
	<td>&#8358;{{number_format($v->total )}}</td>
</tr>

@endforeach
<tr>
<td colspan="2">Total</td>
<td>&#8358;{{number_format($db->sum('total'))}}</td>
</tr>
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No  Report is available for the period selected
    </div>

@endif		
</table>
</div>
</div>
</div>


@endsection