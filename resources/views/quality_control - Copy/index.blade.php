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
                	<form action="{{route('qc.scan')}}" method="GET">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
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
                            <div class="col-sm-4 col-xs-12">
                                <select class="form-control show-tick" name="brand">
                                    <option value="">-- Please select Brand--</option>
                                    @foreach($brands as $key => $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1 col-xs-12">
                              <center>
                                <button type="submit" class="btn bg-amber click-modal waves-effect" style="border-radius:2px;">
                                    <i class="material-icons">settings_overscan</i>
                                    <span>Scan</span>
                                </button>
                              </center>
                            </div>
                        </div>
                    </div>
                  </form>
              </div>
          </div>
      </div>
                   
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">

</script>
@endpush