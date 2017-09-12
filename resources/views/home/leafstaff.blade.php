@extends('layouts.admin')
@section('title','Staff On Leaf')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Staff On Leaf
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Staff On Leaf</div>
                <div class="panel-body">
                 @inject('r','App\R')


@if(count($s) > 0)
<table class="table table-bordered">
<tr>
<th>S/N</th>
<th>Staff Name</th>

<th>Staff ID</th>
<th>Store</th>
<th>Phone</th>
<th>Leaf Started</th>
<th>Leaf End</th>
<th>Action</th>
</tr>
{{!!$i = 0}}
@foreach($s as $v)
  <?php $result= $r->getstorename($v->store_id);
$date = $r->getleafdate($v->id);

  ?>
<tr>
<td>{{++ $i}}</td>
<td>{{$v->staff_name}}</td>

<td>{{$v->id}}</td>
<th>{{$result}}</th>
<td>{{$v->phone}}</td>
<td>{{date('F j , Y',strtotime($date->start_date))}}</td>
<td>{{date('F j , Y',strtotime($date->end_date))}}</td>

<td><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
   
    <li><a href="{{url('back_from_leaf',$v->id)}}">Back From leaf</a></li>
  
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
            </div>
        </div></div>

@endsection
