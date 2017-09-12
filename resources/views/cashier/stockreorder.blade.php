@extends('layouts.display')
@section('title','stock reorder')
@section('content')
@inject('d','App\R')

<div class="row col-sm-10 col-sm-offset-1" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center" style="font-weight: bolder;">Minimum Reordering Quantity Report</p>
<?php  $store =$d->getstorename(Auth::user()->store_id) ?>
<p class="text-center" style="font-weight: bolder;">{{$store}}</p>
<p class="text-center">Date:&nbsp;&nbsp;{{date('F j , Y',strtotime($sd))}}</p>

<table class="table table-bordered table-stripe">
<tr>
    <th>S/N</th>
    <th>Drug Name</th>
    <th>Quantity</th>
    <th>MRQ</th>
    
</tr>
@if(count($r) > 0)
{{!! $c = 0}}
@foreach($r as $v)

<tr>
    <td>{{++$c}}</td>
    <td>{{$v->drug_name}}</td>
    <td>{{$v->qty}}</td>
    <td>{{$v->reorder_quantity}}</td>
   
</tr>

@endforeach
@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
      No records is avalable 
    </div>

@endif  
</table>
</div>


@endsection