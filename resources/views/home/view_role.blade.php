@extends('layouts.admin')
@section('title','Store Department')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Store Department
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-sm-8">
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
<th>{{++ $i}}</th>
<th>{{$v->role_name}}</th>
<th></th>
</tr>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records of stores Department found
    </div>
@endif
</div>
</div>

@endsection
