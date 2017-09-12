@extends('layouts.admin')
@section('title','Edit Staff')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Edit Staff
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 420px;">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit  Staff</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('newstaff') }}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('staff_name') ? ' has-error' : '' }}">
                            <label for="staff_name" class="col-md-4 control-label">Staff Name</label>

                            <div class="col-md-6">
                                <input id="staff_name" type="text" class="form-control" name="staff_name" value="{{ old('staff_name') }}" required>

                                @if ($errors->has('staff_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('staff_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jobTitle') ? ' has-error' : '' }}">
                            <label for="jobtitle" class="col-md-4 control-label">Job Title</label>

                            <div class="col-md-6">
                                <input id="jobtitle" type="text" class="form-control" name="jobTitle" value="{{ old('jobTitle') }}" required>

                                @if ($errors->has('jobTitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jobTitle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('JobType') ? ' has-error' : '' }}">
                            <label for="JobType" class="col-md-4 control-label">Job Type</label>

                            <div class="col-md-6">
                            <select class="form-control" name="jobType" id="JobType" value="{{ old('JobType') }}" required>
                                <option value="">-- Select Job Type--</option>
                                <option value="Contract">Contract</option>
                                <option value="Permanent">Permanent</option>
                             
                            </select>
                              
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('storetype_id') ? ' has-error' : '' }}">
                            <label for="storetype_id" class="col-md-4 control-label">Select Store Type</label>

                            <div class="col-md-6">
                            <select class="form-control" name="storetype_id" id="storetype" value="{{ old('storetype_id') }}" required>
                            	<option value="">-- Select --</option>
                                <option value="0">Head Office</option>
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
                           <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label"> Select Store</label>

                             <div class="col-sm-6">
                              
                              <select class="form-control" name="store_id" id="store" required>
                        
                          
                         </select>

                               
                            </div>
                        </div>
 <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Select Gender</label>

                            <div class="col-md-6">
                            <select class="form-control" name="gender" id="gender" value="{{ old('gender') }}" required>
                                <option value="">-- Select Gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                             
                            </select>
                              
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
  <div class="form-group{{ $errors->has('bod') ? ' has-error' : '' }}">
                            <label for="bod" class="col-md-4 control-label">Birthday date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="bod">

                                @if ($errors->has('bod'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bod') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('qualification') ? ' has-error' : '' }}">
                            <label for="qualification" class="col-md-4 control-label">Highest Qualification</label>

                            <div class="col-md-6">
                            <select class="form-control" name="qualification" id="qualification" value="{{ old('qualification') }}" required>
                                <option value="">-- Select Highest Qualification--</option>

                                <option value="SSCE">SSCE</option>
                                <option value="OND/NCE/DIPLOMA">OND/NCE/DIPLOMA</option>
                             <option value="HND/BSC/OTHERS">HND/BSC/OTHERS</option>
                                <option value="MASTERS/PHD">MASTERS/PHD</option>
                                   <option value="OTHERS">OTHERS</option>
                            </select>
                              
                                @if ($errors->has('qualification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qualification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
  <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-4 control-label">Salary</label>

                            <div class="col-md-6">
                                <input id="salary" type="text" class="form-control" name="salary" value="{{ old('salary') }}" required>

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
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
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                              <label for="image" class="col-md-4  control-label">Passport </label>
                            <div class="col-md-6">  
                             <span class="text-danger">(Max size 200 * 200)</span>
                            <input type="file" name="image" class="form-control">
                            </div>
                             
                            </div>
                              <hr/>
                        <p class="text-center">Parent / Guardian information</p>
                       
                          <div class="form-group{{ $errors->has('parent_name') ? ' has-error' : '' }}">
                            <label for="staff_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="parent_name" type="text" class="form-control" name="parent_name" value="{{ old('staff_name') }}" required autofocus>

                                @if ($errors->has('parent_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parent_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('parent_phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="parent_phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('parent_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parent_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('parent_address') ? ' has-error' : '' }}">
                            <label for="parent_address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="parent_address" value="{{ old('parent_address') }}" required></textarea>

                                @if ($errors->has('parent_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parent_address') }}</strong>
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
 