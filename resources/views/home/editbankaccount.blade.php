@extends('layouts.admin')
@section('title','Setup Bank')
@section('content')
@inject('r','App\R')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Setup Bank Account
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Setup Bank Account</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('editbankaccount',$b->id) }}">
                        {{ csrf_field() }}
                        <?php $store = $r->getstorename($b->store_id) ?>
                       <div class="form-group{{ $errors->has('storetype_id') ? ' has-error' : '' }}">
                            <label for="store_id" class="col-md-4 control-label">Store </label>

                            <div class="col-md-6">
                            <input type="text" class="form-control" name="store_id" id="store_id" value="{{ $store}}" readonly>
                         
                                @if ($errors->has('store_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('store_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                            <label for="account_name" class="col-md-4 control-label">Account Name</label>

                            <div class="col-md-6">
                                <input id="account_name" type="text" class="form-control" name="account_name" value="{{$b->account_name}}" required>

                                @if ($errors->has('account_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="account_type" class="col-md-4 control-label">Account Type</label>

                             <div class="col-sm-6">
                              
                              <select class="form-control" name="account_type"  required>
                               <option value=""> --- Select -- </option>
                              <option value="Current">Current</option>
                            <option value="Savings">Savings</option>
                          
                         </select>

                               
                            </div>
                        </div>
                        
   <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                            <label for="bank_name" class="col-md-4 control-label">Bank Name</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{$b->bank_name}}" required>

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                    
                         <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                            <label for="account_number" class="col-md-4 control-label">account Number</label>

                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control" name="account_number" value="{{$b->account_number}}" required>

                                @if ($errors->has('account_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
