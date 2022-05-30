@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ isset($customer->id) ? "Edit" : "Create" }} Customer Data
                            <small>Please make sure to enter a valid data!</small>
                        </h2>
                    </div>
                    <form method="post" action="{{ isset($customer->id) ? route('customers.update',$customer->id) : route('customers.store') }}" accept-charset="UTF-8">
                    	@csrf
                        @method( isset($customer->id) ? 'PUT' : 'POST' )
	                    <div class="body">
	                        <div class="row clearfix">
		                        <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="name" class="form-control" value="{{ isset($customer->name)?$customer->name:'' }}" placeholder="Name"/>
	                                    </div>
	                                </div>
	                            </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="phone_number" class="form-control" value="{{ isset($customer->phone_number)?$customer->phone_number:'' }}" placeholder="Phone Number"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control" value="{{ isset($customer->email)?$customer->email:'' }}" placeholder="E-mail"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div>
                                        @if(isset($customer->id))
                                            <input name="is_reseller" type="checkbox" value="1" id="md_checkbox2" class="filled-in chk-col-cyan" {{$customer->is_reseller == 1 ? 'checked' : ''}}>
                                            <label for="md_checkbox2">Reseller</label>
                                        @else
                                            <input name="is_reseller" type="checkbox" value="1" id="md_checkbox2" class="filled-in chk-col-cyan">
                                            <label for="md_checkbox2">Reseller</label>
                                        @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
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