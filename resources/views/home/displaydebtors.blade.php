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
<p class="text-center">Debtors</p>



<div class="col-sm-12 sm fl" style="padding-left: 0px;">
<h4 class="text-center">DEBIT</h4>
<table class="table table-bordered table-stripe">
<tr>
	<th>Sn</th>
	<th>Order Id</th>
	<th>Date</th>
	<th>Store</th>
	<th>Customer Name</th>
	<th>Amount</th>
	
</tr>
@if(count($db) > 0)
{{!! $c = 0}}
@foreach($db as $v)
<?php $store =$r->getstorename($v->store_id)?>
<tr><td>{{++$c}}</td>
	<td>{{$v->id}}</td>
	<td>{{date('F j , Y',strtotime($v->order_date))}}</td>
	<td>{{$store}}</td>
	<td>{{$v->customer }}</td>
	<td>&#8358;{{number_format($v->total)}}</td>
</tr>

@endforeach
<tr>
<td colspan="5">Total</td>
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