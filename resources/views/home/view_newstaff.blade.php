@extends('layouts.admin')
@section('title','Admin')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Staff
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 420px;">
   @inject('r','App\R')


@if(count($s) > 0)
<table class="table table-bordered">
<tr>
<th>S/N</th>
<th>Staff Name</th>

<th>Staff ID</th>
<th>Store</th>
<th>Phone</th>
<th>job Title</th>
<th>Job Type</th>
<th>Status</th>
<th>Action</th>
</tr>
{{!!$i = 0}}
@foreach($s as $v)
  <?php $result= $r->getstorename($v->store_id);

$st= $r->getstatus($v->status);

   ?>
<tr>
<td>{{++ $i}}</td>
<td>{{$v->staff_name}}</td>

<td>{{$v->id}}</td>
<th>{{$result}}</th>
<td>{{$v->phone}}</td>
<td>{{$v->jobTitle}}</td>
<td>{{$v->jobType}}</td>
<td class="text-danger">{{$st}}</td>
<td><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
   <!-- <li><a href="{{url('edit_staff',$v->id)}}">Edit</a></li>-->
    <li><a href="{{url('set_leaf',$v->id)}}">Set leaf</a></li>
    <li><a href="{{url('profile',$v->id)}}" target="_blank">Profile</a></li>
    <li><a href="{{url('back_from_leaf',$v->id)}}">Back From leaf</a></li>
    <li><a href="{{url('increase_salary',$v->id)}}">Increase Salary</a></li>
    <li><a href="{{url('takeloan',$v->id)}}">Take Loan</a></li>
    <li><a href="{{url('terminate',$v->id)}}">Terminate Appointment</a></li>
  </ul>
</div></td>
</tr>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records of staff found
    </div>
@endif
</div>

@endsection
