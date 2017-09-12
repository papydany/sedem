@extends('layouts.admin')
@section('title','Vat')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Vat
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-sm-8">
@if(count($t))
<p>Vat on Product</p>

<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Vat On percentage</th>

</tr>  

  
<tr>
<th>1</th>
<th>{{$t->tax}}</th>

</tr>

    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records  found
    </div>
@endif
</div>
</div>

@endsection
