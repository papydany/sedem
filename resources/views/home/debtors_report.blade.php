@extends('layouts.admin')
@section('title','Debtor Report')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Debtor Report
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 520px;">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Debtor Report</div>
                <div class="panel-datey">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('debtors_report') }}" enctype="multipart/form-data" data-parsley-validate target="_blank">
                        {{ csrf_field() }}

                        

                       

                         <div class="form-group{{ $errors->has('store_id') ? ' has-error' : '' }}">
                            <label for="store_id" class="col-md-4 control-label">Select Store </label>

                            <div class="col-md-6">
                            <select class="form-control" name="store_id"  value="{{ old('store_id') }}" required>
                            	<option value="">-- Select --</option>
                               
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
                        
 
  <div class="form-group{{ $errors->has('s_date') ? ' has-error' : '' }}">
                            <label for="s_date" class="col-md-4 control-label">Start Date</label>

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
                            <label for="date" class="col-md-4 control-label">End Date</label>

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
 