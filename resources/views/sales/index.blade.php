@extends('layouts.app_customer')

@section('content')

<!-- <div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	    <div class="card">
	    	<div class="header">
	            <h2>DETAIL ITEM</h2>
	        </div>
	        {{--<div class="body"style="text-align:center;">
	        	@if(empty($item->photos))
	        	<img src="{{ asset($item->photos[0]) }}" width="100%">
	        	@else
	        	<img src="{{asset('images/image.jpg')}}" width="100%">
	        	@endif
	        </div>--}}
	    </div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
</div> -->

<div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	    <div class="card" style="margin-top:-15px;">
	        <div class="body"style="text-align:center;">
	        	<h4><b>{{strtoupper($item->category->name)}} - {{strtoupper($item->brand->name)}}</b></h4></b></h4>
	        	<p>{{$item->remark}}</p>
	        </div>
	    </div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
</div>

<div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	    <div class="card" style="margin-top:-15px;">
	        <div class="body"style="text-align:center;">
				<h4><b>Rp.{{strtoupper(number_format($item->price))}}</b></h4>
	        </div>
	    </div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
</div>

<!-- <div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	    <div class="card" style="margin-top:-15px;">
	        <div class="body">
	        	<h4><b>{{$item->code}}</b></h4>
	        	<p>{{$item->remark}}</p>
	        </div>
	    </div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
</div> -->

{{--<div class="row clearfix" style="margin-top:25px;margin-bottom:25px;">
	<div class="col-sm-3"></div>
		<div class="col-sm-6">
		    <center>
		      <a href="{{route('sales.index')}}" class="btn btn-danger click-modal waves-effect" style="border-radius:2px;">
		          <i class="material-icons">cancel</i>
		          <span>Back</span>
		      </a>
		    </center>  
  	  	</div>
    <div class="col-sm-3"></div>
</div>--}}

@endsection