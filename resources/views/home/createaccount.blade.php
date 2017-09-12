@extends('layouts.admin')
@section('title','Create Acccount')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Create Account
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Account</div>
                <div class="panel-body">
                

                    <form class="form-horizontal" role="form" method="POST" action="{{url('createaccount')}}">
                        {{ csrf_field() }}
                      
                           
                         <div class="form-group{{ $errors->has('account') ? 'has-error' : '' }}">
                            <label for="account" class="col-md-4 control-label">Enter Account type</label>

                            <div class="col-md-6">
                               <input class="form-control" type="text" name="account" placeholder="impress">

                                @if ($errors->has('account'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('account_code') ? 'has-error' : '' }}">
                            <label for="account_code" class="col-md-4 control-label">Enter Account Code</label>

                            <div class="col-md-6">
                               <input class="form-control" type="text" name="account_code" placeholder="S001">

                                @if ($errors->has('account_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_code') }}</strong>
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
