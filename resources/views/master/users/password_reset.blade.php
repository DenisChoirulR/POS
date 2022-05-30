@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Reset Password {{$user->name}}
                            <small>Please make sure to enter a valid data!</small>
                        </h2>
                    </div>
                    <form method="post" action="{{route('user.password-reset.update',$user->id)}}" accept-charset="UTF-8">
                    	@csrf
                        @method('PUT')
	                    <div class="body">
	                        <div class="row clearfix">
	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="password" name="password" class="form-control" value="" placeholder="Password"/>
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