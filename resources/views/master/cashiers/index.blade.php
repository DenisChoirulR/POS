@extends('layouts.app_master')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="row">
            	<!-- <a href="{{route('cashiers.create')}}" class="btn btn-primary waves-effect" style="margin:15px; float:right;"><i class="material-icons">add</i><span>Add Cashier</span></a> -->
	    	</div>
            <div class="card">
                <div class="header">
                    <h2>
                        Cashier Data
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="cashiers" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>  
                                    <th width="120px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($cashiers as $cashier)
                                <tr>
                                    <td>{{$cashier->name}}
                                    {{--<td>
                                    	<a href="{{route('categories.show',$category->id)}}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
		                                    <i class="material-icons">remove_red_eye</i>
		                                </a>
                                    </td>--}}
                                    <td>
                                    	{{--<a href="{{route('cashiers.edit',$cashier->id)}}" class="btn bg-amber btn-circle waves-effect waves-circle waves-float">
		                                    <i class="material-icons">mode_edit</i>
		                                </a>--}}
		                                <a href="{{route('cashiers.destroy',$cashier->id)}}" class="btn bg-red btn-circle waves-effect waves-circle waves-float delete delete-button" data-id="{{$cashier->id}}" data-name="{{$cashier->name}}">
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
                        url: '/cashiers/'+id,
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
                $('#cashiers').DataTable();
            } );
        });
    </script>
@endpush