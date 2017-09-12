@extends('layouts.admin')
@section('title','New Store')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> New Store
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 520px;">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Store</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('newstore') }}" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="store_name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('storetype_id') ? ' has-error' : '' }}">
                            <label for="storetype_id" class="col-md-4 control-label">Store Type</label>

                            <div class="col-md-6">
                            <select class="form-control" name="storetype_id" value="{{ old('storetype_id') }}" required>
                            	<option value="">-- Select --</option>
                            	@foreach($st as $v)
                            	<option value="{{$v->id}}">{{$v->storetype_name}}</option>

                            	@endforeach
                            </select>
                              
                                @if ($errors->has('storetype_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('storetype_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                           <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">
                            <label for="state_id" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                            <select class="form-control" name="state_id" id="state" value="{{ old('state_id') }}" required>
                            	<option value="">-- Select --</option>
                            	@foreach($state as $v)
                            	<option value="{{$v->id}}">{{$v->state_name}}</option>

                            	@endforeach
                            </select>
                              
                                @if ($errors->has('state_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">LGA</label>

                             <div class="col-sm-6">
                              
                              <select class="form-control" name="lga_id" id="lga" required>
                        
                          
                         </select>

                               
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="address" value="{{ old('address') }}" required></textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
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
        </div>
    </div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body text-danger text-center">
          <p>... processing ...</p>
        </div>
       
      </div>
      
    </div>
  </div>
@endsection
@section('script')
<script src="{{URL::to('js/main.js')}}"></script>
@endsection
