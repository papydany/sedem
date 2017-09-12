@extends('layouts.admin')
@section('title','Prepare Salary')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Prepare Staff Salary
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 420px;">
 <div class="col-md-3">
   <p id="s_id"> </p>
                <p id="job_type"> </p>
                <p id="type_staff"></p>
                
                <p id="loan"></p>
                
 </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Prepare Staff Salary</div>
                <div class="panel-body">
              
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('preparesalary') }}"  data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('staff_name') ? ' has-error' : '' }}">
                            <label for="staff_name" class="col-md-4 control-label">Staff Name</label>

                             <div class="col-md-6">
                            <select class="form-control" name="staff_id" id="staff" value="" required>
                                <option value="">-- Select --</option>
                             
                                @foreach($s as $v)
                                <option value="{{$v->id}}">{{$v->staff_name}}</option>

                                @endforeach
                            </select>
                              
                                @if ($errors->has('staff_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                         
                    
                           <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label"> Select Year</label>

                             <div class="col-sm-6">
                              
                                <select class="form-control" name="year"  required>
                              <option value=""> - - Select Year- -</option>
                               
                                  @for ($year = (date('Y')); $year >= 2016; $year--)
                                
                                  <option value="{{$year}}">{{$year}}</option>
                                  @endfor
                                
                              </select>
                        
                          
                         </select>

                               
                            </div>
                        </div>
 <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
                            <label for="month" class="col-md-4 control-label">Select Month</label>

                            <div class="col-md-6">
                            <select class="form-control" name="month" id="month" value="{{ old('month') }}" required>
                                <option value="">-- Select Month-</option>
                                <option value="January">January</option>
                                <option value="Febuary">Febuary</option>
                                <option value="March">March</option>
                              <option value="April">April</option>
                                <option value="May">May</option>
                                 <option value="June">June</option>
                                <option value="July">July</option>
                              <option value="August">August</option>
                                
                                 <option value="September">September</option>
                                <option value="October">October</option>
                              <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                              
                                @if ($errors->has('month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                   
  <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-4 control-label">Salary</label>

                            <div class="col-md-6">
                                <input id="salary" type="text" class="form-control" name="salary" value="" readonly required>

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
  <div class="form-group{{ $errors->has('loan_deduction') ? ' has-error' : '' }}">
                            <label for="loan_deduction" class="col-md-4 control-label">Bonus</label>

                            <div class="col-md-6">
                                <input id="bonus" type="text" class="form-control" name="bonus"  value="{{ old('bonus') }}" >

                                @if ($errors->has('bonus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bonus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('loan_deduction') ? ' has-error' : '' }}">
                            <label for="loan_deduction" class="col-md-4 control-label">Loan Deduction</label>

                            <div class="col-md-6">
                                <input id="loan_deduction" type="text" class="form-control" name="loan_deduction"  value="{{ old('loan_deduction') }}" readonly>

                                @if ($errors->has('loan_deduction'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loan_deduction') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

  <div class="form-group{{ $errors->has('other_deduction') ? ' has-error' : '' }}">
                            <label for="other_deduction" class="col-md-4 control-label">Other Deduction</label>

                            <div class="col-md-6">
                               <input class="form-control" type="text" name="other_deduction">

                                @if ($errors->has('other_deduction'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('other_deduction') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                       
                         
                        <div class="form-group{{ $errors->has('tax') ? ' has-error' : '' }}">
                            <label for="tax" class="col-md-4 control-label">Tax</label>

                            <div class="col-md-6">
                                <input id="tax" type="text" class="form-control" name="tax" value="{{isset($t) ?$t->tax :''}}" readonly>

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
 