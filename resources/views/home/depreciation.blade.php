@extends('layouts.admin')
@section('title','Asset Depreciation')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Asset Depreciation
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Asset Depreciation Report</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('depreciation') }}" target="_blank">
                        {{ csrf_field() }}
                      

 
  
                    
                         <div class="form-group{{ $errors->has('s_date') ? ' has-error' : '' }}">
                            <label for="s_date" class="col-md-4 control-label">Select Start Date</label>

                            <div class="col-md-6">
                          
                              <input class="date form-control" type="text" name="s_date"  placeholder="Start depriciation Date"><br>
                              

                                @if ($errors->has('s_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('s_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('e_date') ? ' has-error' : '' }}">
                            <label for="e_date" class="col-md-4 control-label">Select End Date</label>

                            <div class="col-md-6">
                         
                               <input class="date form-control" type="text" name="e_date"  placeholder="End depriciation date">
                                @if ($errors->has('e_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('e_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('asset_type') ? ' has-error' : '' }}">
                            <label for="asset_type" class="col-md-4 control-label">Select Asset Type</label>

                            <div class="col-md-6">
                            <select class="form-control" name="asset_type" id="storetype" value="{{ old('asset_type') }}">
                                <option value="">-- Select --</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Current">Current</option>
                            </select>
                              
                                @if ($errors->has('asset_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asset_type') }}</strong>
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
