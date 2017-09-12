@extends('layouts.display')
@section('title','Report')
@section('content')
@inject('r','App\R')
<div class="row" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<div class="col-sm-12">
<p class="text-center">{{$sn}}</p>
@if(isset($sd) && isset($ed))
<p class="text-center">From :&nbsp;&nbsp;{{date('F j , Y',strtotime($sd))}} &nbsp;&nbsp;&nbsp; To :&nbsp;&nbsp;{{date('F j, Y',strtotime($ed))}}</p>
@endif
<div class="col-sm-12">
<h4 class="text-center">{{$st}} Ledger</h4>
        @if(isset($l))
        @if(count($l) > 0)


<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Customer </th>
<th>Transaction</th>
<th> Date</th>
<th> Amount</th>
<th> Paid</th>
<th> Balance</th>
</tr> 
 {{!!$i = 0}}
 {{!! $paid_total_2 =''}}
@foreach($l as $v)

<tr>
<td>{{++ $i}}</td>
<td>{{$v->customer}}</td>
<td>{{$v->transaction}}</td>
<td>{{date('F j , Y',strtotime($v->date))}}</td>
<td>&#8358;{{number_format($v->amount)}}</td>
<td colspan="2"></td>

</tr>

<?php $paid =$r->get_paidcreditor($v->id);
?>
@if(count($paid) > 0)
{{!! $paid_total =''}}
@foreach($paid as $p)
<tr>
<td colspan="2"></td>

<td>{{$p->transaction}}</td>
<td>{{date('F j , Y',strtotime($p->date))}}</td>
<td></td>
<td colspan="2">&#8358;{{number_format($p->amount)}}</td>


</tr>
<?php $paid_total +=$p->amount; 

?>
@endforeach
<tr>
<?php $paid_total_2 += $paid_total ?>
<td colspan="6">Balance</td>
<td>&#8358;{{number_format($v->amount -$paid_total)}}</td>
</tr>
@endif
@endforeach
<tr>

<th colspan="4">Total</th>
<th>&#8358;{{number_format($l->sum('amount'))}}</th>
<th>&#8358;{{number_format($paid_total_2)}}</th>
<th>&#8358;{{number_format($l->sum('amount') - $paid_total_2)}}</th>
</tr>    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records is available
    </div>
@endif
 
@endif


@endsection