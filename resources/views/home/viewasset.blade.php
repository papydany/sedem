@extends('layouts.admin')
@section('title','View Asset')
@section('content')

                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Asset
                            </li>
                        </ol>
                    </div>
                </div>
               <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-sm-12">
@if(count($asset) > 0)


<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Asset Name</th>
<th>Purchase Date</th>
<th>Manufactured date</th>
<th>Cost of Item</th>
<th>Duration</th>
<th>Depreciation </th>

<th>Action</th>


</tr> 
 {{!!$i = 0}}
@foreach($asset as $v)
<tr>
<td>{{++ $i}}</td>
<td>{{$v->asset_name}}</td>
<td>{{$v->purchase_date}}</td>
<td>{{$v->manufactured_date}}</td>
<td>{{$v->cost_of_item}}</td>
<td>{{$v->duration}}</td>

<td>{{$v->depreciation_value}}</td>
<td><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{url('edit_asset',$v->id)}}">Edit</a></li>
     <li><a href="{{url('delete_asset',$v->id)}}">Delete</a></li>
  </ul>
</div></td>
</tr>
@endforeach
    
</table>
{{ $asset->links() }}

@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records is available
    </div>
@endif
</div>
</div>

@endsection
