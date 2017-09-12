@extends('layouts.admin')
@section('title','View Drugs')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Drugs
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
@if(count($d) > 0)
<table class="table table-bordered">
<tr>
<th>S/N</th>
<th>Drugs</th>
<th>Code</th>
<th>Purchase Price</th>
<th>Selling price</th>
<th>Quantity</th>
<th>Expired Date</th>
<th>more</th>

</tr>


  
{{!!$i = 0}}
@foreach($d as $v)

<tr>
<td>{{++ $i}}</td>
<td>{{$v->drug_name}}</td>

<th>{{$v->code}}</th>
<th>{{$v->price}}</th>
<th>{{$v->selling_price}}</th>
<th>{{$v->quantity}}</th>
<th>{{$v->es_date}}</th>
<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal{{$i}}">View More</button></td>



</tr>

<div id="myModal{{$i}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$v->drug_name.'('.$v->code.')'}}</h4>

      </div>
      <div class="modal-body">
      <p><strong>Drugs Family </strong>&nbsp;&nbsp;&nbsp;{{$v->drugfamily_id}}</p>
        <p><strong>Manufacture by</strong>&nbsp;&nbsp;&nbsp;{{$v->produced_by}}</p>
        <p><strong>Bought from</strong>&nbsp;&nbsp;&nbsp;{{$v->bought_from}}</p>
        <p><strong>Reordering Quantity </strong>&nbsp;&nbsp;&nbsp;{{$v->reorder_quantity}}</p>
         <p><strong>Purchase Date </strong>&nbsp;&nbsp;&nbsp;{{$v->purchase_date}}</p>
        <p><strong>Manufacture Date </strong>&nbsp;&nbsp;&nbsp;{{$v->m_date}}</p>
         
   
        <p><strong>Selling Vat </strong>&nbsp;&nbsp;&nbsp;{{$v->selling_vat}}</p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records  found
    </div>
@endif
</div>

@endsection
