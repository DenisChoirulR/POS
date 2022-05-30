@extends('layouts.app_master')

@section('content')
    <div class="row clearfix" style="margin-top:-30px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="row">
            	<a href="{{route('customers.create')}}" class="btn btn-primary waves-effect" style="margin:15px; float:right;"><i class="material-icons">add</i><span>Add Customer</span></a>
	    	</div>
            <div class="card">
                <form method="GET" action="" accept-charset="UTF-8">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Type</label>
                                        <select name="is_reseller" class="form-control show-tick">
                                            <option value="" selected>-- All --</option>           
                                            <option value="1" {{'1' == (isset($_GET['is_reseller']) ? $_GET['is_reseller'] : '') ? 'selected' : ''}}>Reseller</option>
                                            <option value="0" {{'0' == (isset($_GET['is_reseller']) ? $_GET['is_reseller'] : '') ? 'selected' : ''}}>Regular</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn bg-light-green waves-effect"> Filter </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="header">
                    <h2>
                        Customer Data
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="customers" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Join Date</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Point</th>
                                    <th width="120px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->name}}
                                        @if($customer->is_reseller == 1)
                                            <sup><span class="label bg-deep-orange">reseller</span></sup>
                                        @endif
                                        {{--<span class="label {{$item->is_sold == 1 ? 'bg-green' : 'bg-deep-orange'}}">--}}
                                    </td>
                                    <td>{{$customer->join_date ?? '-'}}</td>
                                    <td>{{$customer->phone_number}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{number_format($customer->point,0,'.','.')}}</td>
                                    {{--<td>
                                    	<a href="{{route('categories.show',$category->id)}}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
		                                    <i class="material-icons">remove_red_eye</i>
		                                </a>--}}
                                    <td>
                                    	<a href="{{route('customers.edit',$customer->id)}}" class="btn bg-amber btn-circle waves-effect waves-circle waves-float">
		                                    <i class="material-icons">mode_edit</i>
		                                </a>
		                                <a href="{{route('customers.destroy',$customer->id)}}" class="btn bg-red btn-circle waves-effect waves-circle waves-float delete delete-button" data-id="{{$customer->id}}" data-name="{{$customer->name}}">
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
                        url: '/customers/'+id,
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
                $('#customers').DataTable();
            } );
        });
    </script>
@endpush