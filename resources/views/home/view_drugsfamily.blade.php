@extends('layouts.admin')
@section('title','Drugs Family')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Drugs family
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-sm-10">
@if(count($u) > 0)

<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Name</th>
<th>Action</th>
</tr>  
{{!!$i = 0}}
@foreach($u as $v)
  
<tr>
<td>{{++ $i}}</td>
<td>{{$v->drug_name}}</td>
<th><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{url('edit_drugsfamily',$v->id)}}">Edit</a></li>
    
  </ul>
</div></th>
</tr>
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
