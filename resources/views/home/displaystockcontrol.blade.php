@extends('layouts.display')
@section('title','Stock Control')
@section('content')
<div class="row col-sm-10 col-sm-offset-1" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Stock Control Report</p>
<p class="text-center">{{$s->store_name}}</p>
<p class="text-center">{{$s->address}}</p>
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($sd))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($ed))}}</p>
 @inject('r','App\R')


<table class="table table-bordered table-stripe">
<tr>
	<th>S/N</th>
	
	<th>Drug Name</th>
	<th>Open Qty</th>
	<th>Sold Qty</th>
	<th>Closing Qty</th>
</tr>
@if(count($d) > 0)
{{!! $c = 0}}
@foreach($d as $v)
<?php $drugqty= $r->getdrugsqty($s->id,$v->id);
$drug= $r->getdrug($s->id,$v->id,$sd,$ed);
if(count($drug) > 0)
{
	$soldqty = $drug->sum('openingqty') -$drugqty->qty;
 ?>

<tr>
	<td>{{++$c}}</td>
	
	<td>{{$v->drugname}}</td>
	<td>{{$drug->sum('openingqty')}}</td>
	<td>{{$soldqty}}</td>
	<td>{{$drugqty->qty}}</td>
</tr>
<?php } ?>
@endforeach
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No Purchase Report is available for the period selected
    </div>

@endif		
</table>
</div>


@endsection