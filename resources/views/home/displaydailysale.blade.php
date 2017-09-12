@extends('layouts.display')
@section('title','Daily Sale')
@section('content')
<div class="row col-sm-10 col-sm-offset-1" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Daily Sale Report</p>
<p class="text-center">{{$s->store_name}}</p>
<p class="text-center">{{$s->address}}</p>
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($sd))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($ed))}}</p>
<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	<th>Date</th>
	<th>Invoice ID</th>
	<th>Drug Name</th>
	<th>Quantity</th>
	<th>Unit Price</th>
	<th>Amount</th>
</tr>
@if(count($o) > 0)
{{!! $c = 0}}
@foreach($o as $v)
<tr>
	<td>{{++$c}}</td>
	<td>{{date('F j , Y',strtotime($v->order_date))}}</td>
	<td>{{$v->order_id}}</td>
	<td>{{$v->drug_name}}</td>
	<td>{{$v->qty}}</td>
	<td>&#8358;{{number_format($v->price)}}</td>
	<td>&#8358;{{number_format($v->amount)}}</td>
</tr>

@endforeach
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No Sales Report is available for the period selected
    </div>

@endif	
</table>
</div>


@endsection