@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ isset($category->id) ? "Edit" : "Create" }} Categories Data
                            <small>Please make sure to enter a valid data!</small>
                        </h2>
                    </div>
                    <form method="post" action="{{ isset($category->id) ? route('categories.update',$category->id) : route('categories.store') }}" accept-charset="UTF-8">
                    	@csrf
                        @method( isset($category->id) ? 'PUT' : 'POST' )
	                    <div class="body">
	                        <div class="row clearfix">
	                            {{--<div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="code" class="form-control" value="{{ isset($category->code)?$category->code:'' }}" placeholder="Code" />
	                                    </div>
	                                </div>
	                            </div>--}}
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="name" class="form-control" value="{{ isset($category->name)?$category->name:'' }}" placeholder="Name"/>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                   		<button type="submit" class="btn bg-light-green waves-effect"> Simpan </button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection