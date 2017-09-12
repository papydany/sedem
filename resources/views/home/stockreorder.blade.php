@extends('layouts.admin')
@section('title','Stock Reorder')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Stock Reorder
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 520px;">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Stock Reorder</div>
                <div class="panel-datey">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('stockreorder') }}" target="_blank" data-parsley-validate>
                        {{ csrf_field() }}
<br/>
                        <div class="form-group{{ $errors->has('store_id') ? ' has-error' : '' }}">
                           
                          <label for="store_id" class="col-md-4 control-label">Select Store </label>
                        

                            <div class="col-md-5">
                            
                            <select class="form-control" name="store_id"  value="{{ old('store_id') }}" required>
                                <option value="">-- Select --</option>
                                <option value="0">All Stores</option>
                                @foreach($s as $v)
                                <option value="{{$v->id}}">{{$v->store_name}}</option>

                                @endforeach
                            </select>
                              
                                @if ($errors->has('store_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('store_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        <div class="form-group">
                          
                              <div class="col-md-2 col-md-offset-4"><br/>
                                <button type="submit" class="btn btn-primary">
                           Generate
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>

    </div>


@endsection
@section('script')
<script src="{{URL::to('js/main.js')}}"></script>
@endsection
 