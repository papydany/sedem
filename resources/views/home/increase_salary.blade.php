@extends('layouts.admin')
@section('title','Increase Salary')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Increase Salary
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Increase Salary</div>
                <div class="panel-body">
                <p>Name : <strong>{{$id->staff_name}}</strong></p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('increase_salary',$id->id)}}">
                        {{ csrf_field() }}
                      
                           
                         <div class="form-group">
                            <label for="last_salary" class="col-md-4 control-label"> Last Salary</label>

                            <div class="col-md-6">
                            <input class="form-control" type="text" name="last_salary" value="{{$id->salary}}" disabled>

                               
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('new_salary') ? ' has-error' : '' }}">
                            <label for="new_salary" class="col-md-4 control-label">New Salary</label>

                            <div class="col-md-6">
                               <input class="form-control" type="text" name="new_salary">

                               
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
