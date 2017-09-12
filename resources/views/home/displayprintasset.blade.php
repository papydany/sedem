@extends('layouts.display')
@section('title','Asset')
@section('content')
<style type="text/css">
.row {
    margin-right: 0px;
    margin-left: 0px;
}
</style>
<div class="row" style="min-height: 520px;">
<div class="col-sm-12">
<p class="text-center" style="font-weight: bolder;font-size:16px;text-transform: uppercase;">Asset Report</p>

<p class="text-center"><strong>View By :</strong>&nbsp;&nbsp;{{$v}}</p>
<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Asset Name</th>
<th>Purchase Date</th>
<th>Manufactured date</th>
<th>Cost of Item</th>
<th>Duration</th>
<th>Depreciation Value </th>
</tr> 
@if(count($asset) > 0)
 {{!!$i = 0}}
@foreach($asset as $v)
<tr>
<td>{{++ $i}}</td>
<td>{{$v->asset_name}}</td>
<td>{{date('F j , Y',strtotime($v->purchase_date))}}</td>
<td>{{date('F j , Y',strtotime($v->manufactured_date))}}</td>
<td>&#8358;{{number_format($v->cost_of_item)}}</td>
<td>{{$v->duration}}</td>

<td>&#8358;{{number_format($v->depreciation_value)}}</td>

</tr>
@endforeach
    

@else
<tr>
<td colspan="7">
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records is available
    </div>
    </td>
    </tr>
@endif

</table>
</div>
</div>


@endsection