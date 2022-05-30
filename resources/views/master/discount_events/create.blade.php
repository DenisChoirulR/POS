@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ isset($discount_event->id) ? "Edit" : "Create" }} Discount Event Data
                            <small>Please make sure to enter a valid data!</small>
                        </h2>
                    </div>
                    <form method="post" action="{{ isset($discount_event->id) ? route('discount-events.update',$discount_event->id) : route('discount-events.store') }}" accept-charset="UTF-8">
                    	@csrf
                        @method( isset($discount_event->id) ? 'PUT' : 'POST' )
	                    <div class="body">
	                        <div class="row clearfix">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="code" class="form-control" value="{{ isset($discount_event->code)?$discount_event->code:'' }}" placeholder="Code Event" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="name" class="form-control" value="{{ isset($discount_event->name)?$discount_event->name:'' }}" placeholder="Discount Event Name"/>
	                                    </div>
	                                </div>
	                            </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div class="form-line">
                                            <input type="date" name="start_date" class="form-control" value="{{ isset($discount_event->start_date)?$discount_event->start_date:'' }}" placeholder="Start Date"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div class="form-line">
                                            <input type="date" name="end_date" class="form-control" value="{{ isset($discount_event->end_date)?$discount_event->end_date:'' }}" placeholder="End Date"/>
                                        </div>
                                    </div>
                                </div>
	                        </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="discount" class="form-control" value="{{ isset($discount_event->discount)?$discount_event->discount:'' }}" placeholder="The Amount of Event Discount"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="phone_number" class="form-control" value="{{ isset($discount_event->phone_number)?$discount_event->phone_number:'' }}" placeholder="Phone Number ex. (628765435424)"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="messages" class="form-control no-resize" placeholder="Type your message here..."/>{{ isset($discount_event->messages)?$discount_event->messages:'' }}</textarea>
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