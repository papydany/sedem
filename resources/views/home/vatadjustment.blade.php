@extends('layouts.admin')
@section('title','Bank Adjustment')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Vat Adjustment
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 520px;">

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Vat Adjustment</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('vatadjustment') }}"  data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">Invoice Number</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="id" value="{{ old('id') }}" required>

                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Display Vat
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@if(isset($o))
        <div class="col-sm-6" style="background: #cce;padding-bottom: 10px;padding-top: 20px;border-radius: 4px;">
  
    <p>Invoice Number : {{$o->id}}</p>    
    <p>Customer Name : {{$o->customer}}</p> 

<form class="form-horizontal" role="form" method="POST" action="{{url('updatevat',$o->id) }}"  data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('vat') ? ' has-error' : '' }}">
                            <label for="vat" class="col-md-4 control-label">Enter New Vat Value</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="vat" value="{{ $o->vat }}" required>

                                @if ($errors->has('vat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Update Vat
                                </button>
                            </div>
                        </div>
                    </form>

        </div>
@endif

    </div>

@endsection

 