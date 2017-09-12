@extends('layouts.display')
@section('title','Daily Sale')
@section('content')
<div class="row" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<div class="col-sm-10 col-sm-offset-1">
<p class="text-center">Details Sale Order</p>
<p>Order Id: {{$o->id}}
<br/>{{date('F j , Y',strtotime($o->order_date))}}</p>

<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
   <th>Drugs Name</th>
	<th>Quantity</th>
	<th>Price</th>
	<th>Amount</th>
	
</tr>
@if(count($oi) > 0)
{{!! $c = 0}}
@foreach($oi as $v)
<tr>
	<td>{{++$c}}</td>
	<td>{{$v->drug_name}}</td>
	<td>{{$v->qty}}</td>
	<td>{{$v->price}}</td>
	<td>&#8358;{{number_format($v->amount)}}</td>
	
	
</tr>

@endforeach

<tr><th colspan="4">Sub Total</th><th colspan="2">&#8358;{{number_format($o->subtotal)}}</th></tr>
<tr><th colspan="4">Discount </th><th colspan="2">&#8358;{{number_format($o->discountamount)}}</th></tr>
<tr><th colspan="4">Total</th><th colspan="2">&#8358;{{number_format($o->total)}}</th></tr>
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No Sales Report is available for the period selected
    </div>

@endif	
</table>

@if(isset($b))
@if(count($b) > 0)
<p>Bank Details</p>
<table class="table table-bordered">
<tr><td>Bank Name</td><td>Account Number</td><td>Account Name</td><td>Account Type</td></tr>
@foreach($b as $v)
<tr><td>{{$v->bank_name}} </td><td>{{$v->account_number}}</td><td>{{$v->account_name}}</td><td>{{$v->account_type}}</td></tr>
@endforeach
	
</table>
@endif
@endif
</div>


@endsection