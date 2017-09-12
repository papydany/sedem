@extends('layouts.admin')
@section('title','Set Vat')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Set Vat
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set Vat</div>
                <div class="panel-body">
                

                    <form class="form-horizontal" role="form" method="POST" action="{{url('setvat')}}">
                        {{ csrf_field() }}
                      
                           
                         <div class="form-group{{ $errors->has('tax') ? 'has-error' : '' }}">
                            <label for="tax" class="col-md-4 control-label">Set Vat</label>

                            <div class="col-md-6">
                               <input class="form-control" type="text" name="tax" placeholder="5">

                                @if ($errors->has('tax'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tax') }}</strong>
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
