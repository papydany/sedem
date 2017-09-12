@extends('layouts.admin')
@section('title','Drugs Name')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Create Drugs Name
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Drugs Name</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('drugsname') }}">
                        {{ csrf_field() }}

                           <div class="form-group{{ $errors->has('drugfamily_id') ? ' has-error' : '' }}">
                            <label for="drugfamily_id" class="col-md-4 control-label">Drugs  Name</label>

                            <div class="col-md-6">
                            <select class="form-control" name="drugfamily_id" required>
                            <option> --select --</option>
                            
                            @foreach($d as $v)
                            <option value="{{$v->id}}">{{$v->drug_name}}</option>
                           


                            @endforeach
                                
                            </select>
                                
                            </div>
                        </div>
                      

                        <div class="form-group{{ $errors->has('drugname') ? ' has-error' : '' }}">
                            <label for="drug_name" class="col-md-4 control-label">Drugs  Name</label>

                            <div class="col-md-6">
                                <input id="drugname" type="text" class="form-control" name="drugname" value="{{ old('drugname') }}" required autofocus>

                                @if ($errors->has('drugname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('drugname') }}</strong>
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