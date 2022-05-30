@extends('layouts.app_master')

@section('content')
    <div class="row clearfix" style="margin-top:-30px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="row">
            	<!-- a href="" class="btn btn-primary waves-effect" style="margin:15px; float:right;"><i class="material-icons">add</i><span>Add Category</span></a> -->
	    	</div>
            <div class="card">
                <form method="GET" action="" accept-charset="UTF-8">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Category</label>
                                        <select name="category" class="form-control show-tick">
                                            <option value="" selected>-- All --</option>
                                            @foreach($categories as $key => $category)
                                                <option value="{{$category->id}}" {{$category->id == (isset($_GET['category']) ? $_GET['category'] : '') ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Grade</label>
                                        <select class="form-control show-tick" name="grade">
                                            <option value="">-- All --</option>
                                            @foreach($grades as $key => $grade)
                                                <option value="{{$grade->id}}" {{$grade->id == (isset($_GET['grade']) ? $_GET['grade'] : '') ? 'selected' : ''}}>{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Brand</label>
                                        <select class="form-control show-tick" name="brand">
                                            <option value="" selected>-- All --</option>
                                            @foreach($brands as $key => $brand)
                                                <option value="{{$brand->id}}" {{$brand->id == (isset($_GET['brand']) ? $_GET['brand'] : '') ? 'selected' : ''}}>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Status</label>
                                        <select class="form-control show-tick" name="is_sold">
                                            <option value="" selected>-- All --</option>
                                            <option value="0" {{"0" == (isset($_GET['is_sold']) ? $_GET['is_sold'] : '') ? 'selected' : ''}}>Unsold</option>
                                            <option value="1" {{"1" == (isset($_GET['is_sold']) ? $_GET['is_sold'] : '') ? 'selected' : ''}}>Sold</option>
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
                        Items
                    </h2>
                </div>
                <form action="{{route('items.print')}}" method="GET">
                <div class="body">
                    <div class="table-responsive">
                        <table id="items" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Grade</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Colour</th>
                                    <th>Created at</th>
                                    <th>Sold</th>
                                    <th>Sold at</th>
                                    <th width="120px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($items as $key => $item)
                                <tr>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->grade->name}}</td>
                                    <td>{{$item->brand->name}}</td>
                                    <td>Rp {{number_format($item->price,0,'.','.')}}</td>
                                    <td>{{$item->size}}</td>
                                    <td>{{$item->colour}}</td>
                                    <td>{{date('d F Y', strtotime($item->created_at))}}</td>
                                    <td><span class="label {{$item->is_sold == 1 ? 'bg-green' : 'bg-deep-orange'}}">{{$item->is_sold == 1 ? 'Yes' : 'No'}}</span></td>
                                    <td>{{isset($item->invoice_item->created_at) ? date('d F Y', strtotime($item->invoice_item->created_at)) : '-'}}</td>
                                    <td>
                                        <a href="{{route('items.edit',$item->id)}}" class="btn bg-amber btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">mode_edit</i>
                                        </a>
                                        <a href="" class="btn bg-red btn-circle waves-effect waves-circle waves-float delete delete-button" data-id="{{$item->id}}" data-name="{{$item->name}}">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <div class="col-sm-12">
                            <button type="submit" class="btn bg-light-blue waves-effect pull-right"> Print </button>
                        </div> -->
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>    

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
                        url: '/items/'+id,
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
       function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
             $(document).ready( function () {
                $('#items').DataTable();
            } );
        });
    </script>
@endpush