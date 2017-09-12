@extends('layouts.admin')
@section('title','Print Asset')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Print Asset
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Asset Report</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('printasset') }}" target="_blank">
                        {{ csrf_field() }}
                      

 
  
                        <div class="form-group{{ $errors->has('drug_name') ? ' has-error' : '' }}">
                            <label for="drug_name" class="col-md-4 control-label">Select All</label>

                            <div class="col-md-6">
                            <input type="radio" name="view" value="All" checked> 
                                
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('purchase_date') ? ' has-error' : '' }}">
                            <label for="purchase_date" class="col-md-4 control-label">Select By Purchase Date</label>

                            <div class="col-md-6">
                             <input type="radio" name="view" value="purchase_date" id="purchase_date"> <br>
                              <input class="date form-control" type="text" name="purchase_date" id="p_d" placeholder="Start Purchase Date"><br>
                               <input class="date form-control" type="text" name="purchase_date1" id="p_d1" placeholder="End Purchase Date">

                                @if ($errors->has('purchasmanufactured_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('purchasmanufactured_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('manufactured_date') ? ' has-error' : '' }}">
                            <label for="manufactured_date" class="col-md-4 control-label">Select By Manufactured Date</label>

                            <div class="col-md-6">
                            <input type="radio" name="view" value="manufactured_date" id="manufactured_date"> <br/>
                               <input class="date form-control" type="text" name="manufactured_date" id="m_d" placeholder="Start manufactured date">
                               <br/>
                               <input class="date form-control" type="text" name="manufactured_date1" id="m_d1" placeholder="End manufactured date">
                                @if ($errors->has('manufactured_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manufactured_date') }}</strong>
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