@extends('layouts.display')
@section('title','Report')
@section('content')
<style type="text/css">

	@media print{
    .sm {width: 50%;padding: 0px;}
    .fl {float: left;}

	}
</style>
<div class="row" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<div class="col-sm-12">
<p class="text-center">Bank Reconcelation</p>
@if(isset($s) && isset($e))
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($s))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($e))}}</p>
@endif
<div class="col-sm-6 sm fl" style="padding-right: 0px;">
<h4 class="text-center">CREDIT</h4>
<table class="table table-bordered table-stripe">
<tr>

	<th>Date</th>
	<th>Detail</th>
	<th>Amount</th>
	
</tr>
@if(count($cr) > 0)
{{!! $c = 0}}
@foreach($cr as $v)
<tr>

	<td>{{date('F j , Y',strtotime($v->posted_date))}}</td>
	<td>{{$v->trans_detail }}</td>
	<td>&#8358;{{number_format($v->credit)}}</td>
</tr>

@endforeach
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No  Report is available for the period selected
    </div>

@endif		
</table>
</div>

<div class="col-sm-6 sm fl" style="padding-left: 0px;">
<h4 class="text-center">DEBIT</h4>
<table class="table table-bordered table-stripe">
<tr>

	<th>Date</th>
	<th>Detail</th>
	<th>Amount</th>
	
</tr>
@if(count($db) > 0)
{{!! $c = 0}}
@foreach($db as $v)
<tr>

	<td>{{date('F j , Y',strtotime($v->posted_date))}}</td>
	<td>{{$v->trans_detail }}</td>
	<td>&#8358;{{number_format($v->debit)}}</td>
</tr>

@endforeach
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No  Report is available for the period selected
    </div>

@endif		
</table>
</div>
</div>
<div class="clear"></div>
<div class="col-sm-12">
<table class="table table-stripe table-bordered ">
<tr>
<td>Credit Total</td>
<td>&#8358;{{number_format($cr->sum('credit'))}}</td>
</tr>
<tr>
<td>Debit Total</td>
<td>&#8358;{{number_format($db->sum('debit'))}}</td>
</tr>
<tr>
<td>Balance</td>
<?php  $total = $cr->sum('credit') - $db->sum('debit');       ?>
<td>&#8358;{{number_format($total)}}</td>
</tr>	
</table>
</div>
</div>


@endsection