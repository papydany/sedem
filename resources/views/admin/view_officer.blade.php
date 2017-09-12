@extends('layouts.admin')
@section('title','Admin')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Officer
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
@if(count($u) > 0)
<table class="table table-bordered">
<tr>
<th>S/N</th>
<th>Name</th>
<th>Roles</th>
<th>username</th>
<th>password</th>
<th>phone</th>
<th>Action</th>
</tr>
@inject('r','App\R')

  
{{!!$i = 0}}
@foreach($u as $v)
  <?php $result= $r->getrole($v->role_id) ?>
<tr>
<th>{{++ $i}}</th>
<th>{{$v->name}}</th>

<th>{{$result}}</th>
<th>{{$v->username}}</th>
<th>{{$v->plain_password}}</th>
<th>{{$v->phone}}</th>
<th></th>
</tr>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records  found
    </div>
@endif
</div>

@endsection
