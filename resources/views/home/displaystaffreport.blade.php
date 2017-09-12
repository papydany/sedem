@extends('layouts.display')
@section('title','Staff Report')
@section('content')
@inject('r','App\R')
<style type="text/css">
.row {
    margin-right: 0px;
    margin-left: 0px;
}
</style>
<div class="row" style="min-height: 520px;">
<div class="col-sm-12">
<p class="text-center" style="font-weight: bolder;font-size:16px;text-transform: uppercase;">Staff Report</p>

<p class="text-center"><strong>View By :</strong>&nbsp;&nbsp;{{$v}}</p>


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

</tr>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records of staff found
    </div>
@endif
</div>
</div>
</div>


@endsection