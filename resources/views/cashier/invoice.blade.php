@extends('layouts.admin')
@section('title','Process')
@section('content')
 <div class="row" style="min-height: 520px;">
 <div class="col-sm-10 col-sm-offset-1">
 
@if(isset(Cart::content()))
@if(count(Cart::content()) > 0)

<div class="col-sm-12" style="min-height: 350px;">
<table class="table table-stripe table-bordered">
<tr>
<th>Drugs Name</th>
<th>Price</th>
<th>QTY</th>
<th>Amount</th>
</tr>
{{!!$i = 0}}
@foreach(Cart::content() as $v)
{{!++$i}}
<tr>
<td>
{{$v->name}}</td>
<td> &#8358;&nbsp;{{number_format($v->price)}}</td>
<td>{{$v->qty}}</td>
<td>&#8358;&nbsp;{{number_format($v->qty * $v->price)}}</td>
</tr>
@endforeach

<tr>

<td colspan="3">Sub - Total</td><td>&#8358;&nbsp;{{Cart::subtotal()}}</td></tr>
<tr>
{{!$parsed = floatval(preg_replace('/[^\d.]/', '', Cart::subtotal()))}}
	
	@if(isset($d))
	<tr>
	
<td colspan="3">Discount<span class="pull-center">%</span></td>
<td>&#8358;&nbsp;{{number_format($d)}}</td></tr>	
	{{! $total = $parsed  - $d}}
	@else
	{{! $total = $parsed  }}
	@endif
	

<td colspan="3">Total </td><td>&#8358;&nbsp;{{number_format($total)}}</td></tr>
 
 </table>
 


 @endif
@endif
</div>

 </div> 

@endsection
@section('script')

<script src="{{URL::to('js/main.js')}}"></script>
@endsection