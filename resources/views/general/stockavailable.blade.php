@extends('layouts.display')
@section('title','Available Stock')
@section('content')
<div class="row col-sm-10 col-sm-offset-1" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Stock Control Report</p>
<p class="text-center">{{$s->store_name}}</p>
<p class="text-center">{{$s->address}}</p>
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime(date('Y-m-d')))}}</p>
 @inject('r','App\R')


<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	
	<th>Drug Name</th>
	<th>Unit Price</th>
	<th>Qty</th>
	<th>Value</th>
</tr>
@if(count($d) > 0)
{{!! $c = 0}}
{{!!$total = ''}}
@foreach($d as $v)
<?php $drugqty= $r->getdrugsqty($s->id,$v->id);
if(count($drugqty)> 0){
	
$drug= $r->get_latestdrug($s->id,$v->id);

if(count($drug) > 0)
{

 ?>

<tr>
	<td>{{++$c}}</td>
	
	<td>{{$v->drugname}}</td>
	<td>&#8358;{{number_format($drug->price)}}</td>
	
	<td>{{$drugqty->qty}}</td>
	<td>&#8358;{{number_format($drug->price * $drugqty->qty)}}</td>

</tr>
<?php
$total += $drug->price * $drugqty->qty;

 } }?>
@endforeach
<tr><td colspan="4">Total</td><td>&#8358;{{number_format($total)}}</td></tr>
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No Purchase Report is available for the period selected
    </div>

@endif		
</table>
</div>


@endsection