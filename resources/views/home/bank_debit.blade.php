@extends('layouts.admin')
@section('title','Bank Debit')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Bank Debit
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 520px;">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bank Debit</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('bank_debit') }}"  data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('customer_detail') ? ' has-error' : '' }}">
                            <label for="customer_detail" class="col-md-4 control-label">customer Detail</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="customer_detail" value="{{ old('customer_detail') }}" required>

                                @if ($errors->has('customer_detail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="jobtitle" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="amount" value="{{ old('amount') }}" required>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                   
                        
                   
  <div class="form-group{{ $errors->has('trans_detail') ? ' has-error' : '' }}">
                            <label for="trans_detail" class="col-md-4 control-label">Transaction Detail</label>

                            <div class="col-md-6">
                                <input id="trans_detail" type="text" class="form-control" name="trans_detail" value="{{ old('trans_detail') }}" required>

                                @if ($errors->has('trans_detail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trans_detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<div class="form-group{{ $errors->has('teller_number') ? ' has-error' : '' }}">
                            <label for="teller_number" class="col-md-4 control-label">Tell Number(optional)</label>

                            <div class="col-md-6">
                                <input id="teller_number" type="text" class="form-control" name="teller_number" value="{{ old('teller_number') }}" >

                                @if ($errors->has('teller_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('teller_number') }}</strong>
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
    </div>

@endsection

 