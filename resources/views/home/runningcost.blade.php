@extends('layouts.admin')
@section('title','Running Cost')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Running Cost
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 520px;">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Running Cost</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('runningcost') }}"  data-parsley-validate>
                        {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Select Personel Cost</label>

                            <div class="col-md-6">
                            <select class="form-control" name="code"  required>
                                <option value="">-- Select --</option>
                                @foreach($pa as $v)
                                <option value="{{$v->account_code}}">{{$v->account_name}}</option>

                                @endforeach
                            </select>
                              
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('store_id') ? ' has-error' : '' }}">
                            <label for="store_id" class="col-md-4 control-label">Select Store</label>

                            <div class="col-md-6">
                            <select class="form-control" name="store_id"  value="{{ old('store_id') }}" required>
                            	<option value="">-- Select --</option>
                                <option value="0">Head Office</option>
                            	@foreach($s as $v)
                            	<option value="{{$v->id}}">{{$v->store_name}}</option>

                            	@endforeach
                            </select>
                              
                                @if ($errors->has('store_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('store_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group">
                            <label for="qty" class="col-md-4 control-label"> Quantity</label>
 <div class="col-md-6">
                                <input  type="text" class="form-control" name="qty" value="{{ old('qty') }}" required>

                            <span class="text-danger" style="font-size: 12px;">Enter Number Of staff in case of Salary</span>
                                @if ($errors->has('qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
  

  <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" required>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input type="text" class="date form-control" name="date" value="{{ old('date') }}" required>

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                            <label for="remark" class="col-md-4 control-label">remark</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="remark" value="{{ old('remark') }}">

                                @if ($errors->has('remark'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remark') }}</strong>
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
 