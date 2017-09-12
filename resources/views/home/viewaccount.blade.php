@extends('layouts.admin')
@section('title','Personel Account')
@section('content')

                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Personel Account
                            </li>
                        </ol>
                    </div>
                </div>
               <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-sm-8">
@if(count($p) > 0)


<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Account Name</th>
<th>Account Code</th>
<th>Action</th>
</tr> 
 {{!!$i = 0}}
@foreach($p as $v)
<tr>
<td>{{++ $i}}</td>
<td>{{$v->account_name}}</td>
<td>{{$v->account_code}}</td>
<td><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{url('edit_personelaccount',$v->id)}}">Edit</a></li>
   
  </ul>
</div></td>
</tr>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records is available
    </div>
@endif
</div>
</div>

@endsection
