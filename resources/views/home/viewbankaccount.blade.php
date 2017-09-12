@extends('layouts.admin')
@section('title','Bank Account')
@section('content')
@inject('r','App\R')
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Bank Account
                            </li>
                        </ol>
                    </div>
                </div>
               <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-sm-12">
@if(count($b) > 0)


<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Account Name</th>
<th>Bank Name</th>
<th>Account Number</th>
<th>Account Type</th>
<th>Store</th>
<th>Action</th>
</tr> 
 {{!!$i = 0}}
@foreach($b as $v)
<?php $store = $r->getstorename($v->store_id) ?>
<tr>
<td>{{++ $i}}</td>
<td>{{$v->account_name}}</td>
<td>{{$v->bank_name}}</td>
<td>{{$v->account_number}}</td>
<td>{{$v->account_type}}</td>
<td>{{$store}}</td>

<td><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{url('editbankaccount',$v->id)}}">Edit</a></li>
   
  </ul>
</div></td>
</tr>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records is available
    </div>
@endif
</div>
</div>

@endsection
