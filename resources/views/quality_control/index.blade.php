@extends('layouts.app_home')

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>
                          Input Data
                      </h2>
                  </div>
                	<form action="{{route('qc.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-3 col-xs-12">
                                <select name="category" class="form-control show-tick">
                                    <option value="">-- Please select Category--</option>
                                    @foreach($categories as $key => $category)
                                        <option value="{{$category->id}}">{{$category->code}} - {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <select class="form-control show-tick" name="grade">
                                    <option value="">-- Please select Grade--</option>
                                    @foreach($grades as $key => $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <select class="form-control show-tick" name="brand">
                                    <option value="">-- Please select Brand--</option>
                                    @foreach($brands as $key => $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <select class="form-control show-tick" name="colour_id">
                                    <option value="">-- Please select Colour--</option>
                                    @foreach($colours as $key => $colour)
                                        <option value="{{$colour->id}}">{{$colour->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="code" class="form-control" placeholder="Code" />
                                  </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="price" class="form-control" placeholder="Price" />
                                  </div>
                              </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control show-tick" name="size">
                                    <option value="">-- Please select Size--</option>
                                    <option value="XXS">XXS</option>
                                    <option value="XS">XS</option>
                                    <option value="S LEDIES">S LEDIES</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="38/M">38/M</option>
                                    <option value="L">L</option>
                                    <option value="LL">LL</option>
                                    <option value="3L">3L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-sm-8">
                              <div class="form-group">
                                  <div class="form-line">
                                      <textarea name="remark" rows="4" class="form-control no-resize" placeholder="Remark..."></textarea>
                                  </div>
                              </div>
                          </div>
                        </div>

                        <!-- Dinamis Form -->
                        <div class="input-group hdtuto control-group lst increment" >
                          <input type="file" name="photos[]" class="myfrm form-control">
                          <div class="input-group-btn"> 
                            <button id="clone" type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">add</i>
                            </button>
                          </div>
                        </div>
                        <div class="clone hide">
                          <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                            <input type="file" name="photos[]" class="myfrm form-control">
                            <div class="input-group-btn"> 
                              <button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary click-modal waves-effect">
                            <i class="material-icons">settings_overscan</i>
                            <span>Scan</span>
                        </button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
                   
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>
@endpush

@stack('scripts')