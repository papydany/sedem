@extends('layouts.admin')
@section('title','Create Asset')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Edit Asset
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 420px;">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Asset</div>
                <div class="panel-purchase_datey">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('edit_asset',$v->id) }}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('asset_name') ? ' has-error' : '' }}">
                            <label for="asset_name" class="col-md-4 control-label">Asset Name</label>

                            <div class="col-md-6">
                                <input id="asset_name" type="text" class="form-control" name="asset_name" value="{{$v->asset_name }}" required>

                                @if ($errors->has('asset_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asset_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cost_of_item') ? ' has-error' : '' }}">
                            <label for="cost_of_item" class="col-md-4 control-label">Cost Of Item</label>

                            <div class="col-md-6">
                                <input id="cost_of_item" type="text" class="form-control" name="cost_of_item" value="{{$v->cost_of_item }}" required>

                                @if ($errors->has('cost_of_item'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost_of_item') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Duration For use</label>

                            <div class="col-md-6">
                           <input id="duration" type="text" class="form-control" name="duration" value="{{ $v->duration}}" required>
                              
                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('asset_type') ? ' has-error' : '' }}">
                            <label for="asset_type" class="col-md-4 control-label">Select Asset Type</label>

                            <div class="col-md-6">
                            <select class="form-control" name="asset_type" id="storetype" value="{{ old('asset_type') }}" required>
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
                        <div class="form-group{{ $errors->has('purchase_date') ? ' has-error' : '' }}">
                            <label for="purchase_date" class="col-md-4 control-label">Purchase Date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="purchase_date" value="{{$v->purchase_date}}">

                                @if ($errors->has('purchase_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('purchase_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('manufactured_date') ? ' has-error' : '' }}">
                            <label for="manufactured_date" class="col-md-4 control-label">Manufactured Date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="manufactured_date" value="{{$v->manufactured_date}}">

                                @if ($errors->has('manufactured_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manufactured_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                  <div class="form-group{{ $errors->has('depreciation_value') ? ' has-error' : '' }}">
                            <label for="depreciation_value" class="col-md-4 control-label">Depreciation Value</label>

                            <div class="col-md-6">
                                <input id="depreciation_value" type="text" class="form-control" name="depreciation_value" value="{{$v->depreciation_value}}" required>

                                @if ($errors->has('depreciation_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('depreciation_value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('salvage_date') ? ' has-error' : '' }}">
                            <label for="salvage_date" class="col-md-4 control-label"> Date Of Salvage</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="salvage_date" value="{{$v->salvage_date}}">

                                @if ($errors->has('salvage_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salvage_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                  

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                 Update
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
 