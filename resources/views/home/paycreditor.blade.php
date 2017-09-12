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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('paycreditor') }}"  data-parsley-validate>
                        {{ csrf_field() }}
                         
                       <input  type="hidden" class="form-control" name="id" value="{{$v->id}}">
                        <input  type="hidden" class="form-control" name="store_id" value="{{$v->store_id}}"> 
 <br/>
  <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="date" value="">

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
                                <input id="customer" type="text" class="form-control" name="customer" value="{{ $v->customer}}" readonly>

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
                                <input id="amount" type="text" class="form-control" name="amount" value="" required>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
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
 