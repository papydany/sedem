@extends('layouts.admin')
@section('title','Take Loan')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Take Loan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Take Loan</div>
                <div class="panel-body">
                <p>Name : <strong>{{$id->staff_name}}</strong></p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('takeloan',$id->id)}}">
                        {{ csrf_field() }}
                      
                           
                         <div class="form-group{{ $errors->has('loan') ? ' has-error' : '' }}">
                            <label for="loan" class="col-md-4 control-label">Loan Amount</label>

                            <div class="col-md-6">
                               <input class="form-control" type="text" name="loan" placeholder="100000">

                                @if ($errors->has('loan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('e_date') ? ' has-error' : '' }}">
                            <label for="e_date" class="col-md-4 control-label">Select number of month to pay</label>

                            <div class="col-md-6">
                                <select class="form-control" name="number"  required>
                              <option value=""> - - Select - -</option>
                               
                                  @for ($i = 1; $i <= 12; $i++)
                                
                                  <option value="{{$i}}">{{$i}}</option>
                                  @endfor
                                
                              </select>
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
