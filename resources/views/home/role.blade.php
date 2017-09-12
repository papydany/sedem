@extends('layouts.admin')
@section('title','Store Department')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Create Department
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Department</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('role') }}">
                        {{ csrf_field() }}
                      

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="role_name" class="col-md-4 control-label">Department Name</label>

                            <div class="col-md-6">
                                <input id="role_name" type="text" class="form-control" name="role_name" value="{{ old('role_name') }}" required autofocus>

                                @if ($errors->has('role_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div></div>

@endsection