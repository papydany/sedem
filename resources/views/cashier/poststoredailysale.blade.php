@extends('layouts.admin')
@section('title','Daily Sale')
@section('content')
<div class="row col-sm-12" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Daily Sale Report</p>

<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($sd))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($ed))}}</p>
<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	<th>Date</th>
	<th>Invoice ID</th>

	<th>Pament</th>
	<th>Discount</th>
	<th>Sub Total</th>
	<th>Total</th>
	<th>Action</th>
</tr>
@if(count($o) > 0)
{{!! $c = 0}}
@foreach($o as $v)
<tr>
	<td>{{++$c}}</td>
	<td>{{date('F j , Y',strtotime($v->order_date))}}</td>
	<td>{{$v->id}}</td>

	<td>{{$v->payment_type}}</td>
	<td>&#8358;{{number_format($v->discountamount)}}</td>
	<td>&#8358;{{number_format($v->subtotal)}}</td>
	<td>&#8358;{{number_format($v->total)}}</td>
	<td><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  @if($v->payment_type =="Debt" || $v->payment_type=="Bank")

  <li><a href="{{url('printref',$v->id)}}" target="_blank">Print Bank Ref</a></li>
   <li class="divider"></li>
  @endif
  <li><a href="{{url('orderdetail',$v->id)}}" target="_blank">View Order Details</a></li>
   <li class="divider"></li>
    <li><a href="{{url('cancelorder',$v->id)}}" target="_blank">Cancel Order</a></li>
   
  </ul>
</div></td>
</tr>

@endforeach

<tr><th colspan="6">Sub Total</th><th colspan="2">&#8358;{{number_format($o->sum('subtotal'))}}</th></tr>
<tr><th colspan="6">Discount </th><th colspan="2">&#8358;{{number_format($o->sum('discountamount'))}}</th></tr>
<tr><th colspan="6">Total</th><th colspan="2">&#8358;{{number_format($o->sum('total'))}}</th></tr>
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No Sales Report is available for the period selected
    </div>

@endif	
</table>
</div>


@endsection