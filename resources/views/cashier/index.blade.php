@extends('layouts.admin')
@section('title','Cashier')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<style type="text/css">
   .dropdown-menu  { margin-top: 20; }
</style>

                


<div class="row" style="min-height: 420px;">
<div class="col-sm-5">
<form method="POST" action="{{url('search')}}">
<div class="form-group">
    <input type="text" placeholder="Search By Name" name="search" class="typeahead form-control">
        {{ csrf_field() }}
    </div>
    @if(Auth::user()->storetype_id == 1)    
<div class="form-group" style="margin-top: 100px;margin-bottom: 50px;">    
 <input type="text" placeholder="Search By bar code"  name="search_code" class="typeahead_code form-control">
   </div>   
  @endif
    <div class="form-group col-sm-10 col-sm-offset-1">
    <input type="submit" id="sddd" value="Continue" class="btn btn-danger btn-block">
    </div>
    </form>
</div>

<div class="col-sm-7 thumbnail">
<form  method="POST"  action="{{url('process')}}">
 {{ csrf_field() }}
<div class="col-sm-12" style="min-height: 350px;">
@if(isset($c))
@if(count($c) > 0)
<p>
<span class="pull-center col-sm-7"><strong>Drugs Name</strong></span>
<span class="pull-center col-sm-2"> <strong>Price</strong></span>
<span class=" col-sm-2"><strong>QTY</strong></span>
<span class=" col-sm-1"><strong>Remove</strong></span>

</p><hr>
{{!!$i = 0}}
@foreach($c as $v)
{{!++$i}}
<p>
<span class="pull-center col-sm-7"><strong>{{$v->name}}</strong></span>
<span class="pull-center col-sm-2"> &#8358;&nbsp;{{number_format($v->price)}}</span>
<input type="text" class="form-control col-sm-2" style="width: 12%;" name="qty[{{$i}}]" value="{{$v->qty}}">
<a  href="{{url('remove',$v->rowId)}}" class="btn btn-danger btn-xs pull-right col-sm-1">Remove</a>
<input type="hidden" name="id[{{$i}}]" value="{{$v->rowId}}">
<input type="hidden" name="drugsname_id[{{$i}}]" value="{{$v->options->drugname_id}}">
</p><br/><hr>
@endforeach
@endif
@endif
</div>

<div class="col-sm-12">
<p><strong>Discount </strong>&nbsp;&nbsp;&nbsp;<span class="pull-center">%</span>
<input type="text" name="discount" id="" placeholder="0" value="" class="form-control pull-right"  style="width: 20%;">
</p>
<br/>
<p><strong>Sub - Total</strong><span class="pull-right">&#8358;&nbsp;{{Cart::subtotal()}}</span></p>
<p><strong>Total </strong><span class="pull-right">&#8358;&nbsp;{{Cart::subtotal()}}</span></p>
<p><input type="submit" value="PROCEED" class="btn btn-block btn-success"></p>
</div>  
</form>  
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

<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });

     var path1 = "{{ route('autocomplete_code') }}";
    $('input.typeahead_code').typeahead({
        source:  function (query, process) {
        return $.get(path1, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endsection
@section('script')
<script src="{{URL::to('js/main.js')}}"></script>
@endsection
