@extends('layouts.admin')
@section('title','Drawn Amount')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Drawn Amount
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Drawn Amount</div>
                <div class="panel-body">
                

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('drawnamount')}}">
                        {{ csrf_field() }}
                      
                           
                         <div class="form-group">
                            <label for="posted_date" class="col-md-4 control-label"> Date</label>

                            <div class="col-md-6">
                            <input class="date form-control" type="text" name="posted_date" value="">

                               
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('debit') ? ' has-error' : '' }}">
                            <label for="debit" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                               <input class="form-control" type="text" name="debit">

                               
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                            <label for="detail" class="col-md-4 control-label">Detail</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="detail" value="{{ old('detail') }}" required></textarea>

                                @if ($errors->has('detail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                  Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div></div>

@endsection
