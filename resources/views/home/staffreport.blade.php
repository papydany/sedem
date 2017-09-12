@extends('layouts.admin')
@section('title','Staff Report')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Staff Report
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Staff Report</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('staffreport') }}" target="_blank">
                        {{ csrf_field() }}
                      

 
  
                        <div class="form-group{{ $errors->has('drug_name') ? ' has-error' : '' }}">
                            <label for="drug_name" class="col-md-4 control-label">Select  All</label>

                            <div class="col-md-6">
                            <input type="radio" name="view" value="All" checked> 
                                
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('drug_name') ? ' has-error' : '' }}">
                            <label for="drug_name" class="col-md-4 control-label">Select  Terminated staff</label>

                            <div class="col-md-6">
                            <input type="radio" name="view" value="terminated"> 
                                
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('purchase_date') ? ' has-error' : '' }}">
                            <label for="purchase_date" class="col-md-4 control-label">Select Staff Type</label>

                            <div class="col-md-6">
 <input type="radio" name="view" value="purchase_date" id="purchase_date"> <br>
                            <select class="form-control" name="jobType" id="p_d" value="{{ old('JobType') }}">
                                <option value="">-- Select Job Type--</option>
                                <option value="Contract">Contract</option>
                                <option value="Permanent">Permanent</option>
                             
                            </select>
                              
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                             
                      

                          <div class="form-group{{ $errors->has('manufactured_date') ? ' has-error' : '' }}">
                            <label for="manufactured_date" class="col-md-4 control-label">Select By Store </label>

                            <div class="col-md-6">
                              <input type="radio" name="view" value="manufactured_date" id="manufactured_date"> <br/>
                            <select class="form-control" name="store_id" id="m_d" value="{{ old('store_id') }}">
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
@section('script')
<script src="{{URL::to('js/main.js')}}"></script>
@endsection