@extends('layouts.admin')
@section('title','View Impress')
@section('content')

                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Impress
                            </li>
                        </ol>
                    </div>
                </div>
               <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-sm-12">
@if(count($impress) > 0)


<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Amount</th>
<th> Date</th>


<th>Action</th>


</tr> 
 {{!!$i = 0}}
@foreach($impress as $v)
<tr>
<td>{{++ $i}}</td>
<td>&#8358;{{number_format($v->amount)}}</td>
<td>{{date('F j , Y',strtotime($v->date))}}</td>
<td><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{url('edit_impress',$v->id)}}">Edit</a></li>
   
  </ul>
</div></td>
</tr>
@endforeach
    
</table>
{{ $impress->links() }}

@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records is available
    </div>
@endif
</div>
</div>

@endsection
