@extends('layouts.display')
@section('title','Daily Vat')
@section('content')
<div class="row col-sm-10 col-sm-offset-1" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Vat Computation</p>
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($sd))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($ed))}}</p>
<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	<th>Date</th>
	<th>Vat / Tax Type</th>
	<th>Invoice</th>
	<th>Amount</th>
</tr>
@if(count($vo) > 0)
{{!! $c = 0}}
@foreach($vo as $v)
<tr>
	<td>{{++$c}}</td>
	<td>{{date('F j , Y',strtotime($v->order_date))}}</td>
	<td>Sale To {{$v->customer}}</td>
	<td>{{$v->id}}</td>

	<td>&#8358;{{number_format($v->vat)}}</td>
</tr>

@endforeach
@if(count($ts) > 0)


<tr>
	<td></td>
	<td>{{date('F j , Y',strtotime($ed))}}</td>
	<td>Tax On Staff Salaries</td>
	<td>pr00001</td>

	<td>&#8358;{{number_format($ts->sum('tax'))}}</td>
</tr>
<tr>
<td colspan="4">Total</td>
<td>&#8358;{{number_format($vo->sum('vat') + $ts->sum('tax'))}}</td>
</tr>
@else
<tr>
<td colspan="4">Total</td>
<td>&#8358;{{number_format($vo->sum('vat'))}}</td>
</tr>
@endif
@else
@if(count($ts) > 0)


<tr>
	<td>1</td>
	<td>{{date('F j , Y',strtotime($ed))}}</td>
	<td>Tax On Staff Salaries</td>
	<td>pr00001</td>

	<td>&#8358;{{number_format($ts->sum('tax'))}}</td>
</tr>
<tr>
<td colspan="4">Total</td>
<td>&#8358;{{number_format($ts->sum('tax'))}}</td>
</tr>
@else


 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No Vat Report is available for the period selected
    </div>
@endif	
@endif		
</table>
</div>


@endsection