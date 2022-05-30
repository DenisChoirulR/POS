@extends('layouts.app_master')

@section('content')
    {{--<div class="container" style="padding-top:100px;">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                <div class="panel panel-success">
                  <div class="panel-heading">Upload File CSV*</div>
                  <div class="panel-body">
                    <form method='post' action='/storestore' enctype='multipart/form-data' >
                                           {{ csrf_field() }}
                    <!-- accept=".csv" -->
                       <input type='file' name='file' class="white-badge" multiple>

                       <br>
                       <input type='submit' name='submit' value='Import' class="btn btn-success">
                    </form>
                    </div>          
                </div>    
            </div>
        </div>
    </div>--}}
@endsection
