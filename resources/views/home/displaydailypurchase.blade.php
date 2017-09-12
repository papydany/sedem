@extends('layouts.display')
@section('title','Daily Purchase')
@section('content')
<div class="row col-sm-10 col-sm-offset-1" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Daily Purchase Report</p>
<p class="text-center">{{$s->store_name}}</p>
<p class="text-center">{{$s->address}}</p>
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($sd))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($ed))}}</p>
<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	<th>Date</th>
	<th>Drug Name</th>
	<th>Quantity</th>
	<th>Unit Price</th>
	<th>Amount</th>
</tr>
@if(count($d) > 0)
{{!! $c = 0}}
{{!! $total = ''}}
@foreach($d as $v)
<tr>
	<td>{{++$c}}</td>
	<td>{{date('F j , Y',strtotime($v->purchase_date))}}</td>
	<td>{{$v->drug_name}}</td>
	<td>{{$v->openingqty}}</td>
	<td>&#8358;{{number_format($v->price)}}</td>
	<td>&#8358;{{number_format($v->openingqty * $v->price)}}</td>
</tr>
<?php $total += $v->openingqty * $v->price; ?>
@endforeach
<tr><td colspan="5">Total</td><td>{{number_format($total)}}</td></tr>
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No Purchase Report is available for the period selected
    </div>

@endif		
</table>
</div>


@endsection