@extends('layouts.display')
@section('title','Report')
@section('content')
 @inject('r','App\R')
<div class="row" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<div class="col-sm-12">
<p class="text-center">Expenses Report</p>
@if(isset($s) && isset($e))
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($s))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($e))}}</p>
@endif
<div class="col-sm-4">
<h4 class="text-center">Impress</h4>
<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	<th>Date</th>
	<th>Amount</th>
	
</tr>
@if(count($imprss) > 0)
{{!! $c = 0}}
@foreach($imprss as $v)

<tr>
	<td>{{++$c}}</td>
	<td>{{date('F j , Y',strtotime($v->date))}}</td>
	<td>&#8358;{{number_format($v->amount)}}</td>
</tr>

@endforeach
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No Impress was given this period
    </div>

@endif		
</table>
</div>

<div class="col-sm-8">
<h4 class="text-center">Expenses</h4>
<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	<th>Date</th>
	<th>Store</th>
	<th>Items</th>
	<th>Amount</th>
	
</tr>
@if(count($rc) > 0)
{{!! $c = 0}}
@foreach($rc as $v)
<?php $result =$r->getPersonelAccount($v->code);

$store =$r->getstorename($v->store_id)?>
<tr>
	<td>{{++$c}}</td>
	<td>{{date('F j , Y',strtotime($v->date))}}</td>
	<td>{{$store}}</td>
	<td>{{$result}}</td>
	<td>&#8358;{{number_format($v->amount)}}</td>
</tr>

@endforeach
<tr>
<td colspan="3"></td>
<th>Expenses Total</th>
<th>&#8358;{{number_format($rc->sum('amount'))}}</th>
</tr>
<tr>
<td colspan="3"></td>
<th>Impress Total</th>
<th>&#8358;{{number_format($imprss->sum('amount'))}}</th>
</tr>
<tr>
<td colspan="3"></td>
<th>Balance</th>
<?php  $total = $imprss->sum('amount') - $rc->sum('amount');?>
<th>&#8358;{{number_format($total)}}</th>
</tr>
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No  Expenses is available
    </div>

@endif		
</table>
</div>
</div>
</div>


@endsection