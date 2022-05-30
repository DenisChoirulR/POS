@extends('layouts.app_master')

@section('content')
    <div class="row clearfix" style="margin-top:-30px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="row">
            	<a href="{{route('discount-events.create')}}" class="btn btn-primary waves-effect" style="margin:15px; float:right;"><i class="material-icons">add</i><span>Add Discount Event</span></a>
	    	</div>
            <div class="card">
                <div class="header">
                    <h2>
                        Discount Event Data
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="discount-events" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Discount</th>
                                    <th width="105px;">Start Date</th>
                                    <th width="105px;">End Date</th>
                                    <th>Phone Number</th>
                                    <th>Messages</th>
                                    <th width="180px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($discount_events as $discount_event)
                                <tr>
                                    <td>{{$discount_event->code}}</td>
                                    <td>{{$discount_event->name}}</td>
                                    <td>Rp {{number_format($discount_event->discount,0,'.','.')}}</td>
                                    <td>{{$discount_event->start_date}}</td>
                                    <td>{{$discount_event->end_date}}</td>
                                    <td>{{$discount_event->phone_number}}</td>
                                    <td>{{$discount_event->messages}}</td>
                                    <td>
                                    	<a href="{{route('discount-events.show',$discount_event->id)}}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
		                                    <i class="material-icons">remove_red_eye</i>
		                                </a>
                                    	<a href="{{route('discount-events.edit',$discount_event->id)}}" class="btn bg-amber btn-circle waves-effect waves-circle waves-float">
		                                    <i class="material-icons">mode_edit</i>
		                                </a>
		                                <a href="" class="btn bg-red btn-circle waves-effect waves-circle waves-float delete delete-button" data-id="{{$discount_event->id}}" data-name="{{$discount_event->name}}">
		                                	<i class="material-icons">delete</i>
		                                </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Sweetalert Css -->
    <link href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
	<!-- SweetAlert Plugin Js -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>

@endsection

@push('scripts')  
    <script type="text/javascript">
    	$(document).on('click', '.delete-button', function (e) {
		    e.preventDefault();
		    var id = $(this).data('id');
		    var name = $(this).data('name');
		    swal({
		            title: "Are you sure want to delete "+name+"?",
		            type: "error",
		            confirmButtonClass: "btn-danger",
		            confirmButtonText: "Yes!",
		            showCancelButton: true,
		        },

		        function() {
		            $.ajax({
					    url: '/discount-events/'+id,
					    type: 'POST',
					    data: {
		                	"_token": "{{ csrf_token() }}",
		                	id:id,
		                	"_method" : "DELETE"
		                },  
					    success: function(result) {
					        // Do something with the result
					        location.reload();
					    }
					});
		    });
		});
    </script>
    
    <script type="text/javascript">
        $(document).ready(function() {
             $(document).ready( function () {
                $('#discount-events').DataTable();
            } );
        });
    </script>
@endpush