@extends('layouts.admin')
@section('title','Drugs Family')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Edit Drugs Family
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Drugs Family</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('edit_drugsfamily',$d->id) }}">
                        {{ csrf_field() }}

                      
                      

                        <div class="form-group{{ $errors->has('drugname') ? ' has-error' : '' }}">
                            <label for="drug_name" class="col-md-4 control-label">Drugs  Family</label>

                            <div class="col-md-6">
                                <input id="drugname" type="text" class="form-control" name="drugname" value="{{$d->drug_name}}" required autofocus>

                            </div>
                        </div>
 

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div></div>

@endsection