@extends('layouts.admin')
@section('title','Daily Sales')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Daily Sales
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Daily Sales</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('ao_dailysale') }}" target="_blank">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('cashier') ? ' has-error' : '' }}">
                            <label for="cashier" class="col-md-4 control-label">Select Cashier</label>

                            <div class="col-md-6">
                            <select class="form-control" name="cashier"  value="{{ old('cashier') }}" required>
                                <option value="">-- Select --</option>
                                @foreach($user as $v)
                            <option value="{{$v->id}}">{{$v->name}}l</option>
                                @endforeach
                                  
                             
                            </select>

                              
                                @if ($errors->has('cashier'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cashier') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('payment_type') ? ' has-error' : '' }}">
                            <label for="payment_type" class="col-md-4 control-label">Payment Type</label>

                            <div class="col-md-6">
                            <select class="form-control" name="payment_type"  value="{{ old('payment_type') }}" required>
                                <option value="">-- Select --</option>
                                  <option value="All">All</option>
                               <option value="Cash">Cash</option>
                               <option value="POS">POS</option>
                               <option value="Debt">Debt</option>
                            <option value="Bank">Bank</option>
                            </select>

                              
                                @if ($errors->has('payment_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                         <div class="form-group{{ $errors->has('s_date') ? ' has-error' : '' }}">
                            <label for="s_date" class="col-md-4 control-label">Start date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="s_date">

                                @if ($errors->has('s_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('s_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('e_date') ? ' has-error' : '' }}">
                            <label for="e_date" class="col-md-4 control-label">End Date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="e_date">

                                @if ($errors->has('e_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('e_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Generate Report
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div></div>

@endsection
