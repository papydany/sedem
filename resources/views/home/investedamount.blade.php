@extends('layouts.admin')
@section('title','Investment Amount')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Investment Amount
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Investment Amount</div>
                <div class="panel-body">
                

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('investedamount')}}">
                        {{ csrf_field() }}
                              <div class="form-group{{ $errors->has('storetype_id') ? ' has-error' : '' }}">
                            <label for="store_id" class="col-md-4 control-label">Store </label>

                            <div class="col-md-6">
                            <select class="form-control" name="store_id" id="store_id" value="{{ old('store_id') }}" required>
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
                                <div class="form-group{{ $errors->has('storetype_id') ? ' has-error' : '' }}">
                            <label for="invest_type" class="col-md-4 control-label">Investement Type </label>

                            <div class="col-md-6">
                            <select class="form-control" name="invest_type"  value="{{ old('invest_type') }}" required>
                                <option value="">-- Select --</option>
                                  <option value="1">Personal Saving</option>
                                 <option value="2">Loan</option>
                            </select>

                              
                                @if ($errors->has('invest_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('invest_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           
                         <div class="form-group">
                            <label for="posted_date" class="col-md-4 control-label"> Date</label>

                            <div class="col-md-6">
                            <input class="date form-control" type="text" name="posted_date" value="">

                               
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('credit') ? ' has-error' : '' }}">
                            <label for="credit" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                               <input class="form-control" type="text" name="credit">

                               
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                            <label for="detail" class="col-md-4 control-label">Detail</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="detail" value="{{ old('detail') }}" required></textarea>

                                @if ($errors->has('detail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('detail') }}</strong>
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
        </div></div>

@endsection
