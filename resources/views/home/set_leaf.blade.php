@extends('layouts.admin')
@section('title','Set Leaf')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Set Leaf
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row" style="min-height: 520px;">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set leaf</div>
                <div class="panel-body">
                <p>Name : <strong>{{$id->staff_name}}</strong></p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('set_leaf',$id->id)}}">
                        {{ csrf_field() }}
                      
                           
                         <div class="form-group{{ $errors->has('s_date') ? ' has-error' : '' }}">
                            <label for="s_date" class="col-md-4 control-label">Start Leaf date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="s_date">

                                @if ($errors->has('s_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('s_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('e_date') ? ' has-error' : '' }}">
                            <label for="e_date" class="col-md-4 control-label">End leaf Date</label>

                            <div class="col-md-6">
                               <input class="date form-control" type="text" name="e_date">

                                @if ($errors->has('e_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('e_date') }}</strong>
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
<script type="text/javascript">

   // $('.date').datepicker();  
 $('.date').datetimepicker({
        format: "YYYY-MM-DD"
    });
</script>