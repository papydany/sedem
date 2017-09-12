@extends('layouts.admin')
@section('title','Process')
@section('content')
<style type="text/css">

  @media print{
    .sm {width: 50%;}
    .fl {float: left;}

  }
</style>
    <div class="row ccc">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
 <div class="row ccc" style="min-height: 520px;">
 <div class="col-sm-7">
 
@if(isset($c))
@if(count($c) > 0)
<form  method="POST"  onsubmit="window.print();>
 {{ csrf_field() }}
<div class="col-sm-12" style="min-height: 350px;">
@if(Auth::user()->storetype_id == 1)
<table class="table table-bordered">

<tr>
<td><input type="text" name="customer" value="" class="form-control" placeholder="Customer Name" ></td>
<td><input type="text" name="phone" value="" class="form-control" placeholder="Customer Phone" ></td>
</tr>
</table>
@endif
<table class="table table-stripe table-bordered">
<tr>
<th>Drugs Name</th>
<th>Price</th>
<th>QTY</th>
<th>Amount</th>
</tr>
{{!!$i = 0}}
@foreach($c as $v)
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
	<input type="hidden" name="discount"  value="{{number_format($d)}}">
<td colspan="3">Discount<span class="pull-center">%</span></td>
<td>&#8358;&nbsp;{{number_format($d)}}</td></tr>	
	{{! $total = $parsed  - $d}}
	@else
	{{! $total = $parsed  }}
	@endif
	<input type="hidden" name="subtotal"  value="{{$parsed}}">
	<input type="hidden" name="total"  value="{{$total}}">

<td colspan="3">Total </td><td>&#8358;&nbsp;{{number_format($total)}}</td></tr>
 
 </table>
 <div class="form-group">
 	<span class="pull-left text-danger">
 	<input type="radio" name="payment_type" value="Cash" checked>&nbsp;&nbsp;&nbsp;&nbsp;Cash
 	</span>
@if(Auth::user()->storetype_id == 1)
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="pull-center text-danger">
  <input type="radio" name="payment_type" value="Debt">&nbsp;&nbsp;&nbsp;&nbsp;Sell On Credit
  </span>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="pull-center text-danger">
  <input type="radio" name="payment_type" value="Bank">&nbsp;&nbsp;&nbsp;&nbsp;Bank
  </span>
  @endif
  <span class="pull-right text-danger">
  <input type="radio" name="payment_type" value="POS" id="pos">&nbsp;&nbsp;&nbsp;&nbsp; Card Payment(POS)
  </span><br/>
  
 </div>
<div class="form-group">
<input type="text" name="card_number" class="form-control" value="" id="card_number" placeholder="Card Number">
</div>
<hr>
<div class="form-group">
<input type="submit" name="" id="complete" value="Complete" class="btn btn-success">
</div>
 </div>
 </form>

 @endif
@endif
</div>
<div class="col-sm-5">
 </div>
 </div> 


<div class="row" style="min-height: 520px;" id="invoice">
 <div class="col-sm-10 col-sm-offset-1">
 <h4 class="text-center">SEDEM PHARMATICEUTICAL NIG LTD</h4>
  @inject('r','App\R')

  <?php $result= $r->getstoredetail(Auth::user()->store_id) ?>

@if(isset($c))
@if(count($c) > 0)
<div class="col-sm-6 sm fl">  
 <p>{{$result->store_name}}
<br/>{{$result->address}}
<br/>Tel : {{$result->phone}}</p>
</div>
<div class="col-sm-6 sm fl">
<p class="invoice"></p>
<p class="payment"></p>
<p>Cahier :{{strtoupper(Auth::user()->name)}}
<br/><?php echo date('F j , Y',strtotime(date("Y-m-d"))); ?> </p>
</div>
<div class="col-sm-12" style="min-height: 350px;">
<table class="table table-stripe table-bordered">
<tr>
<th>Description</th>
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
  

<td colspan="3">Total </td><td>&#8358;&nbsp;{{number_format($total)}}</td>

</tr>
<tr>
<td colspan="4"><p class="balance"></p>
</td>
</tr>
 
 </table>
 


 @endif
@endif
</div>

 </div> 

</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body text-danger text-center">
          <p>... processing ...</p>
        </div>
       
      </div>
      
    </div>
  </div>
@endsection





@section('script')

<script src="{{URL::to('js/main.js')}}"></script>
@endsection