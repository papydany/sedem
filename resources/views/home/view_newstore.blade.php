@extends('layouts.admin')
@section('title','Admin')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Store
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
@if(count($s) > 0)
<table class="table table-bordered">
<tr>
<th>S/N</th>
<th>Store Name</th>

<th>Store Type</th>
<th>Phone</th>
<th>email</th>
<th>Store Address</th>
</tr>
{{!!$i = 0}}
@foreach($s as $v)
<tr>
<th>{{++ $i}}</th>
<th>{{$v->store_name}}</th>

<th>{{$v->storetype->storetype_name}}</th>
<th>{{$v->phone}}</th>
<th>{{$v->email}}</th>
<th>{{$v->address}}</th>
</tr>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records of stores found
    </div>
@endif
</div>

@endsection
