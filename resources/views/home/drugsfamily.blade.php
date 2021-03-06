@extends('layouts.admin')
@section('title','Drugs Family')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Create Drugs family
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Drugs family</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('drugsfamily') }}">
                        {{ csrf_field() }}
                      

                        <div class="form-group{{ $errors->has('drug_name') ? ' has-error' : '' }}">
                            <label for="drug_name" class="col-md-4 control-label">Drugs family Name</label>

                            <div class="col-md-6">
                                <input id="drug_name" type="text" class="form-control" name="drug_name" value="{{ old('drug_name') }}" required autofocus>

                                @if ($errors->has('drugs_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('drugs_name') }}</strong>
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