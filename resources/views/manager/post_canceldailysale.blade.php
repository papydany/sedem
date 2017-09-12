@extends('layouts.display')
@section('title','Daily Sale')
@section('content')
@inject('d','App\R')
<div class="row" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<div class="col-sm-10 col-sm-offset-1">
<p class="text-center">Daily Sale Report</p>

<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($sd))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($ed))}}</p>
<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	<th>Order Date</th>
		<th>Canceled Date</th>
	<th>Invoice ID</th>
<th>Canceled By</th>
	<th>Pament</th>
	<th>Discount</th>
	<th>Sub Total</th>
	<th>Total</th>

</tr>
@if(count($o) > 0)
{{!! $c = 0}}
@foreach($o as $v)
<?php $staff =$d->g_user($v->user_id);?>
<tr>
	<td>{{++$c}}</td>
	<td>{{date('F j , Y',strtotime($v->order_date))}}</td>
	<td>{{date('F j , Y',strtotime($v->return_date))}}</td>
	<td>{{$v->id}}</td>
<th>{{$staff->name}}</th>
	<td>{{$v->payment_type}}</td>
	<td>&#8358;{{number_format($v->discountamount)}}</td>
	<td>&#8358;{{number_format($v->subtotal)}}</td>
	<td>&#8358;{{number_format($v->total)}}</td>
	
</tr>

@endforeach

<tr><th colspan="6">Sub Total</th><th colspan="3">&#8358;{{number_format($o->sum('subtotal'))}}</th></tr>
<tr><th colspan="6">Discount </th><th colspan="3">&#8358;{{number_format($o->sum('discountamount'))}}</th></tr>
<tr><th colspan="6">Total</th><th colspan="3">&#8358;{{number_format($o->sum('total'))}}</th></tr>
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No Sales Report is available for the period selected
    </div>

@endif	
</table>
</div>
</div>


@endsection