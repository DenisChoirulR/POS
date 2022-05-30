@extends('layouts.app_home')

@section('content')

<div class="row">
    <div class="col-lg-12">
    	<form action="{{route('qc.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category" value="{{$_GET['category']}}">
            <input type="hidden" name="grade" value="{{$_GET['grade']}}">
            <input type="hidden" name="brand" value="{{$_GET['brand']}}">
            <input type="hidden" name="code" value="{{$_GET['code']}}">
            
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <h2 class="card-inside-title">Input Data</h2>
                        <div class="row clearfix">
                          <div class="col-sm-4">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="name" class="form-control" placeholder="Name" />
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
                        </div>
                        <div class="row clearfix">
                          <div class="col-sm-8">
                              <div class="form-group">
                                  <div class="form-line">
                                      <textarea rows="4" class="form-control no-resize" placeholder="Type your description here..."></textarea>
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
                        <!-- End Dinamis Form -->
                        <button type="submit" class="btn btn-primary click-modal waves-effect">
                            <i class="material-icons">save</i>
                            <span>Save</span>
                        </button>
                    </div> 
                </div>
            </div>
          </div>
            

        </form>
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