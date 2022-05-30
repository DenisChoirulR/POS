@extends('layouts.app_master')

@section('content')
    <div class="row clearfix" style="">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
            @if ($message = Session::get('flash_notification'))
              <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
              </div>
            @endif

            @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
              </div>
            @endif
                <div class="panel panel-primary">
                  <div class="panel-heading">Upload File CSV*</div>
                  <div class="panel-body">
                    <form method='post' action='/customers-import-store' enctype='multipart/form-data' >
                      {{ csrf_field() }}
                      <!-- accept=".csv" -->
                       <input type='file' name='file' class="white-badge" multiple>

                       <br>
                       <input type='submit' name='submit' value='Import' class="btn btn-primary">
                    </form>
                    </div>          
                </div>    
            </div>
        </div>
    </div>
@endsection
