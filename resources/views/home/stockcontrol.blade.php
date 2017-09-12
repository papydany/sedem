@extends('layouts.admin')
@section('title','Stock Control')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Stock Control
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Stock Control</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('stockcontrol') }}" target="_blank">
                        {{ csrf_field() }}
                      

                        <div class="form-group{{ $errors->has('drug_name') ? ' has-error' : '' }}">
                            <label for="drug_name" class="col-md-4 control-label">Select Store</label>

                            <div class="col-md-6">
                            <select class="form-control" name="store" required>
                            <option value="">-- select --</option>
                            @foreach($s as $v)
                            <option value="{{$v->id}}">{{$v->store_name}}</option>

                            @endforeach
                                
                            </select>
                                
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
