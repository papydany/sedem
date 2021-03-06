@extends('layouts.admin')
@section('title','Ledger')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>View Ledger
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="row" style="min-height: 520px;">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">View Ledger</div>
                <div class="panel-datey">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('viewledger') }}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                           

                          

                            <div class="col-md-3">
                             <label for="store_id" class="control-label">Select Store </label>
                            <select class="form-control" name="store_id"  value="{{ old('store_id') }}" required>
                                <option value="">-- Select --</option>
                                <option value="0">Head Office</option>
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
                                <div class="col-md-3">
                             <label for="s_date" class="control-label">Start Date</label>
                               <input class="date form-control" type="text" name="s_date">

                                @if ($errors->has('s_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('s_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <div class="col-md-3">
                             <label for="e_date" class="control-label">End Date</label>
                               <input class="date form-control" type="text" name="e_date">

                                @if ($errors->has('e_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('e_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                              <div class="col-md-2"><br/>
                                <button type="submit" class="btn btn-primary">
                              Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>
        @if(isset($l))
        @if(count($l) > 0)

<p>Store Name :<strong>{{$sn}}</strong> &nbsp;&nbsp;&nbsp; {{$st}} Ledger</p>
<table class="table table-bordered table-striped">
<tr>
<th>S/N</th>
<th>Customer </th>
<th>Transaction</th>
<th> Date</th>
<th> Amount</th>

<th>Action</th>


</tr> 
 {{!!$i = 0}}
@foreach($l as $v)

<tr>
<td>{{++ $i}}</td>
<td>{{$v->customer}}</td>
<td>{{$v->transaction}}</td>
<td>{{date('F j , Y',strtotime($v->date))}}</td>
<td>&#8358;{{number_format($v->amount)}}</td>


<td><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{url('edit_ledger',$v->id)}}">Edit</a></li>
   <li><a href="{{url('paycreditor',$v->id)}}">Pay Creditor</a></li>
  </ul>
</div></td>
</tr>
@endforeach
    
</table>


@else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert" >
No records is available
    </div>
@endif
 
@endif
    </div>


@endsection
@section('script')
<script src="{{URL::to('js/main.js')}}"></script>
@endsection
 