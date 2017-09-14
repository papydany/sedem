@extends('layouts.display')
@section('title','Profit And loss')
@section('content')
@inject('r','App\R')
<div class="row col-sm-10 col-sm-offset-1" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Profit And Loss</p>
<p class="text-center">{{$s->store_name}}</p>
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($sd))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($ed))}}</p>
<div class="col-sm-6" style="padding-right: 0px;">
DEBIT
<table class="table table-bordered table-striped">
<tr>
	<th>Items</th>
	<th>Amount</th>
	
</tr>
@if(count($ex) > 0)


@foreach($ex as $k => $v)

  <?php $store =$r->grtpersonalaccount($k)?>
<tr>

	<td>{{$store->account_name}}</td>
	<td>&#8358;{{number_format($v->sum('amount'))}}</td>

</tr>

@endforeach

 

@endif		
</table>
</div>
<div class="col-sm-6" style="padding-left: 0px;">
CREDIT
<table class="table table-bordered table-striped">
<tr>
	<th>Items</th>
	<th>Amount</th>
	
</tr>
<tr><td>Gross profit from sales</td>
<td>&#8358;{{number_format($p)}}</td></tr>
<tr><td>Discount Received</td>
<td>&#8358;{{number_format($p)}}</td></tr>
<tr><td>Profit From sale Of Assest</td>
<td>&#8358;{{number_format($p)}}</td></tr>
</div>
</div>


@endsection