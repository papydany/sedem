@extends('layouts.admin')
@section('title','Store Admin')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Create User
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create User</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('storeadmin') }}">
                        {{ csrf_field() }}
                       <div class="form-group{{ $errors->has('storetype_id') ? ' has-error' : '' }}">
                            <label for="store_id" class="col-md-4 control-label">Store </label>

                            <div class="col-md-6">
                            <select class="form-control" name="store_id" id="store_id" value="{{ old('store_id') }}" required>
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
                            <label for="name" class="col-md-4 control-label">Name</label>

                             <div class="col-sm-6">
                              
                              <select class="form-control" name="name" id="name" required>
                        
                          
                         </select>

                               
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Role</label>

                             <div class="col-sm-6">
                              
                              <select class="form-control" name="role" id="role" required>
                        
                          
                         </select>

                               
                            </div>
                        </div>
   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                    
                         <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
        </div><div class="modal fade" id="myModal" role="dialog">
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