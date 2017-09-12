@extends('layouts.admin')
@section('title','Generate payroll')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Generate payroll
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate payroll</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('generatepayroll') }}" target="_blank">
                        {{ csrf_field() }}
                       <div class="form-group{{ $errors->has('drug_name') ? ' has-error' : '' }}">
                            <label for="drug_name" class="col-md-4 control-label">Select Store All</label>

                            <div class="col-md-6">
                            <input type="radio" name="view" value="All" checked> 
                                
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
                            <label for="password-confirm" class="col-md-4 control-label"> Select Year</label>

                             <div class="col-sm-6">
                              
                                <select class="form-control" name="year"  required>
                              <option value=""> - - Select Year- -</option>
                               
                                  @for ($year = (date('Y')); $year >= 2016; $year--)
                                
                                  <option value="{{$year}}">{{$year}}</option>
                                  @endfor
                                
                              </select>
                        
                          
                         </select>

                               
                            </div>
                        </div>
 <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
                            <label for="month" class="col-md-4 control-label">Select Month</label>

                            <div class="col-md-6">
                            <select class="form-control" name="month" id="month" value="{{ old('month') }}" required>
                                <option value="">-- Select Month-</option>
                                <option value="January">January</option>
                                <option value="Febuary">Febuary</option>
                                <option value="March">March</option>
                              <option value="April">April</option>
                                <option value="May">May</option>
                                 <option value="June">June</option>
                                <option value="July">July</option>
                              <option value="August">August</option>
                                
                                 <option value="September">September</option>
                                <option value="October">October</option>
                              <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                              
                                @if ($errors->has('month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
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