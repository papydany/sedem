@extends('layouts.admin')
@section('title','Store Admin')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Create Drugs
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 420px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Drugs</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('drugs') }}">
                        {{ csrf_field() }}
                      
                

                        
  <div class="form-group{{ $errors->has('drugsfamily') ? ' has-error' : '' }}">
                            <label for="store_id" class="col-md-4 control-label">Drugs family </label>

                            <div class="col-md-6">
                            <select class="form-control" id="drugfamily_id" name="drugfamily_id" value="{{ old('drugsfamily') }}" required>
                                <option value="">-- Select --</option>
                                @foreach($df as $v)
                                <option value="{{$v->id}}">{{$v->drug_name}}</option>

                                @endforeach
                            </select>

                              
                                @if ($errors->has('drugsfamily'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('drugsfamily') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group{{ $errors->has('drug_name') ? ' has-error' : '' }}">
                            <label for="drug_name" class="col-md-4 control-label">Drugs Name</label>

                            <div class="col-md-6">
                                 <select class="form-control" name="drug_name" value="{{ old('drug_name') }}" id="drug_name" required>
                               
                             
                            </select>
                            </div>
                        </div>    
                  <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label"> Barcode</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>       
                       
                        <div class="form-group{{ $errors->has('produced_by') ? ' has-error' : '' }}">
                            <label for="produced_by" class="col-md-4 control-label">Manufactured By</label>

                            <div class="col-md-6">
                                <input id="produced_by" type="text" class="form-control" name="produced_by" value="{{ old('produced_by') }}" required>

                                @if ($errors->has('produced_by'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('produced_by') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control" name="quantity" value="{{ old('quantity') }}" required>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('reorder_quantity') ? ' has-error' : '' }}">
                            <label for="reorder_quantity" class="col-md-4 control-label">Reorder Quantity</label>

                            <div class="col-md-6">
                                <input id="reorder_quantity" type="text" class="form-control" name="reorder_quantity" value="{{ old('reorder_quantity') }}" required>

                                @if ($errors->has('reorder_quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reorder_quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">purchase Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
                            <label for="selling_price" class="col-md-4 control-label">Selling Price</label>

                            <div class="col-md-6">
                                <input id="selling_price" type="text" class="form-control" name="selling_price" required>

                                @if ($errors->has('selling_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('selling_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      @if(Auth::user()->storetype_id == 1)
                      <div class="form-group">
                            <label for="bought_from" class="col-md-4 control-label">Purchase From</label>

                            <div class="col-md-6">
                                <input id="bought_from" type="text" class="form-control" name="bought_from">
                            </div>
                        </div>
   <div class="form-group">
                            <label for="receive_discount" class="col-md-4 control-label">Receive Discount</label>

                            <div class="col-md-6">
                                <input id="receive_discount" type="text" class="form-control" name="receive_discount">
                            </div>
                        </div>

                       
                        @else
                  <div class="form-group">
                            <label for="bought_from" class="col-md-4 control-label">Purchase From</label>

                            <div class="col-md-6">
                                  <select class="form-control" name="bought_from">
                                  <option value="">--  Select --</option>
                                <option value="1">Sedem Pharmacy</option>
                                <option value="2">Other</option>    
                                </select>
                            </div>
                        </div>


                      @endif
                        <div class="form-group">
                            <label for="given_discount" class="col-md-4 control-label">Discount</label>

                            <div class="col-md-6">
                                <input id="given_discount" type="text" class="form-control" name="given_discount">
                            </div>
                        </div>

                        
                         <div class="form-group{{ $errors->has('purchase_date') ? ' has-error' : '' }}">
                            <label for="purchase_date" class="col-md-4 control-label">Phurchase Date</label>

                            <Div class="col-md-6">
                               <input class="date form-control" type="text" name="purchase_date">

                                @if ($errors->has('purchase_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('purchase_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('m_date') ? ' has-error' : '' }}">
                            <label for="m_date" class="col-md-4 control-label">Manufactured date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="m_date">

                                @if ($errors->has('m_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('m_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Expired Date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="es_date">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
               
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body text-danger text-center">
          <p>... processing ...</p>
        </div>
       
      </div>
      
    </div>
  </div>
@endsection

@section('script')
<script src="{{URL::to('js/main.js')}}"></script>
@endsection