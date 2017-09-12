@extends('layouts.admin')
@section('title','Drugs Name')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Drugs Name
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-sm-12">
@if(count($d) > 0)
@inject('r','App\R')

  
<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Drugs Family</th>
<th>drugs Name</th>

<th>Action</th>
</tr>

{{!!$i = 0}}

@foreach($d as $v)
<tr style="background: #cce;font-weight: bolder;">
    <td>{{++ $i}}</td>
    <td colspan="3" >{{$v->drug_name}}</td>
</tr>
 <?php $result= $r->drugsname($v->id) ?>
 
 @if(count($result) > 0) 
 @foreach ($result as $drg)
<tr>
<td></td>
<td></td>
<td>{{$drg->drugname}}</td>
<th><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{url('edit_drugsname',$drg->id)}}">Edit</a></li>
    
  </ul>
</div></th>

</tr>

 @endforeach


@endif


@endforeach

</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records of Drugs family found
    </div>
@endif
</div>
</div>

@endsection
