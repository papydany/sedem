@extends('layouts.display')
@section('title','Profile')
@section('content')
@inject('r','App\R')
  <?php $result= $r->getstorename($p->store_id);


   ?>
<div class="row col-sm-10 col-sm-offset-1" style="min-height: 520px;padding-right: 0px;padding-left: 0px;">
<p class="text-center">Staff Profile</p>
<p class="text-center">{{$result}}</p>
<p class="text-center">{{$p->phone}}</p>
<p class="text-center">{{$p->address}}</p>
<hr/>
<div class="col-sm-6">
<table class="table  table-stripe">
<tr>
<th>Name</th>
<td>{{$p->staff_name}}</td>
</tr>
<tr>
<th>Job Title </th>
<td>{{$p->jobTitle}}</td>
</tr>
<tr>
<th>Job Type</th>
<td>{{$p->jobType}}</td>
</tr>
<tr>
<th>gender</th>
<td>{{$p->gender}}</td>
</tr>
<tr>
<th>Qualification</th>
<td>{{$p->qualification}}</td>
</tr>
<th>salary </th>
<td>{{$p->salary}}</td>
</tr>
</table>
</div>
<div class="col-sm-6">
<table class="table  table-stripe">

<tr>
<th>LGA / State of Origin</th>
<td>{{$p->lga->lga_name .",". $p->state->state_name}}</td>
</tr>
<tr>
<th>Date Of Birth</th>
<td>{{date('F j , Y',strtotime($p->bod))}}</td>
</tr>
<tr>
<th>Parent / Guardian</th>
<td>{{$p->parent_name}}</td>
</tr>
<tr>
<th>Phone </th>
<td>{{$p->parent_phone}}</td>
</tr>
<tr>
<th>Address</th>
<td>{{$p->parent_address}}</td>
</tr>

</table>
</div>


</div>


@endsection