@extends('layouts.admin')
@section('title','Admin')
@section('content')
  @inject('r','App\R')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Store Admin
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

<th>Store Name</th>
<th>username</th>
<th>password</th>
<th>status</th>
<th>Role</th>
<th>Action</th>
</tr>


  
{{!!$i = 0}}
@foreach($u as $v)

  <?php $result= $r->getstorename($v->store_id);
  $role= $r->getrolename($v->user_id) ?>
<tr>
<th>{{++ $i}}</th>
<th>{{$v->name}}</th>

<th>{{$result}}</th>
<th>{{$v->username}}</th>
<th>{{$v->plain_password}}</th>
<th>@if($v->status == 0)
<span class="text-success">Active</span>
@elseif($v->status == 1)
<span class="text-danger">Deactivated</span>
@endif</th>
<th>{{isset($role) ?$role:''}}</th>
<th><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{url('activate',$v->user_id)}}">Activate</a></li>
     <li><a href="{{url('deactivate',$v->user_id)}}">Dactivate</a></li> 
  </ul>
</div></th>
</tr>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records of stores admins found
    </div>
@endif
</div>

@endsection
