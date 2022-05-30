@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ isset($item->id) ? "Edit" : "Create" }} Categories Data
                            <small>Please make sure to enter a valid data!</small>
                        </h2>
                    </div>
                    <form method="post" action="{{ isset($item->id) ? route('items.update',$item->id) : route('items.store') }}" accept-charset="UTF-8">
                    	@csrf
                        @method( isset($item->id) ? 'PUT' : 'POST' )
	                    <div class="body">
	                        <div class="row clearfix">
	                            <div class="col-sm-6">
                                    <b>Code</b>
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="code" class="form-control" value="{{ isset($item->code)?$item->code:'' }}" placeholder="Code"/>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                                <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control show-tick">
                                                @foreach($categories as $key => $category)
                                                    <option value="{{$category->id}}" {{$category->id == $item->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Grade</label>
                                            <select class="form-control show-tick" name="grade_id">
                                                @foreach($grades as $key => $grade)
                                                    <option value="{{$grade->id}}" {{$grade->id == $item->grade_id ? 'selected' : ''}}>{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Brand</label>
                                            <select class="form-control show-tick" name="brand_id">
                                                @foreach($brands as $key => $brand)
                                                    <option value="{{$brand->id}}" {{$brand->id == $item->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Colour</label>
                                            <input type="text" name="colour" class="form-control" value="{{ isset($item->colour) ? $item->colour:'' }}" placeholder="Colour"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Size</label>
                                            <select class="form-control show-tick" name="size">
                                                <option value="">-- Please select Size--</option>
                                                <option value="XXS" {{$item->size == 'XXS'? 'selected' : ''}}>XXS</option>
                                                <option value="XS" {{$item->size == 'XS'? 'selected' : ''}}>XS</option>
                                                <option value="S LEDIES" {{$item->size == 'S LEDIES'? 'selected' : ''}}>S LEDIES</option>
                                                <option value="S" {{$item->size == 'S'? 'selected' : ''}}>S</option>
                                                <option value="M" {{$item->size == 'M'? 'selected' : ''}}>M</option>
                                                <option value="38/M" {{$item->size == '38/M'? 'selected' : ''}}>38/M</option>
                                                <option value="L" {{$item->size == 'L'? 'selected' : ''}}>L</option>
                                                <option value="LL" {{$item->size == 'LL'? 'selected' : ''}}>LL</option>
                                                <option value="3L" {{$item->size == '3L'? 'selected' : ''}}>3L</option>
                                                <option value="XL" {{$item->size == 'XL'? 'selected' : ''}}>XL</option>
                                                <option value="XXL" {{$item->size == 'XXL'? 'selected' : ''}}>XXL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Remark</label>      
                                            <input type="text" name="remark" class="form-control" value="{{ isset($item->remark)?$item->remark:'' }}" placeholder="Remark"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Price</label>      
                                            <input type="text" name="price" class="form-control" value="{{ isset($item->price)?$item->price:'' }}" placeholder="Price"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Reseller Price</label>      
                                            <input type="text" name="reseller_price" class="form-control" value="{{ isset($item->reseller_price)?$item->reseller_price:'' }}" placeholder="Reseller Price"/>
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