@extends('layouts.admin')
@section('title','Edit Ledger')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Edit Ledger
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 520px;">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Ledger</div>
                <div class="panel-datey">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('edit_ledger',$v->id) }}"  data-parsley-validate>
                        {{ csrf_field() }}
                         
                         <div class="form-group{{ $errors->has('store_id') ? ' has-error' : '' }}">
                            <label for="store_id" class="col-md-4 control-label">Select Store </label>

                            <div class="col-md-6">
                            <select class="form-control" name="store_id"  value="{{ old('store_id') }}" required>
                            	<option value="">-- Select --</option>
                                <option value="0">Head Office</option>
                            	@foreach($s as $vv)
                            	<option value="{{$vv->id}}">{{$vv->store_name}}</option>

                            	@endforeach
                            </select>
                              
                                @if ($errors->has('store_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('store_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
 
  <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="date" value="{{$v->date}}">

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                 
  <div class="form-group{{ $errors->has('customer') ? ' has-error' : '' }}">
                            <label for="customer" class="col-md-4 control-label">Customer</label>

                            <div class="col-md-6">
                                <input id="customer" type="text" class="form-control" name="customer" value="{{ $v->customer}}" required>

                                @if ($errors->has('customer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                         <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{$v->amount}}" required>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      
                     
                      
                       
                          <div class="form-group{{ $errors->has('transaction ') ? ' has-error' : '' }}">
                            <label for="transaction " class="col-md-4 control-label">Transaction Details</label>

                            <div class="col-md-6">
                                <input id="transaction " type="text" class="form-control" name="transaction" value="{{$v->transaction}}" required >

                                @if ($errors->has('transaction '))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('transaction ') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                   
                    

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                              Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
<script src="{{URL::to('js/main.js')}}"></script>
@endsection
 