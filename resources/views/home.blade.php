@extends('layouts.app_home')

@section('content')
    <!-- <div class="row">
        <div class="col-lg-12">
           <h1 class="page-header text-center">Landing Page</h1>
        </div>
    </div> -->
    @if(App\User::permissionCheck('master data'))
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-6">
            <a href="{{route('users.index')}}" class="module">
                <div class="panel panel-kooc">
                    <div class="panel-heading text-center">
                        <div class="row dash-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="row dash-text">
                            <strong>Master Data</strong>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif

        <!-- <div class="col-lg-2 col-md-3 col-sm-6">
            <a href="{{route('qrcode.generate')}}" class="module">
                <div class="panel panel-kooc">
                    <div class="panel-heading text-center">
                        <div class="row dash-icon">
                            <i class="material-icons">print</i>
                        </div>
                        <div class="row dash-text">
                            <strong>Generate QR-Code</strong>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->

        <!-- <div class="col-lg-2 col-md-3 col-sm-6">
            <a href="{{route('qc.index')}}" class="module">
                <div class="panel panel-kooc">
                    <div class="panel-heading text-center">
                        <div class="row dash-icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="row dash-text">
                            <strong>Quality Control</strong>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->

        @if(App\User::permissionCheck('cashier'))
        <div class="col-lg-2 col-md-3 col-sm-6">
            <a href="{{route('cashier.index')}}" class="module">
                <div class="panel panel-kooc">
                    <div class="panel-heading text-center">
                        <div class="row dash-icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="row dash-text">
                            <strong>Cashier</strong>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif

        {{--<div class="col-lg-2 col-md-3 col-sm-6">
            <a href="{{route('sales.index')}}" class="module">
                <div class="panel panel-kooc">
                    <div class="panel-heading text-center">
                        <div class="row dash-icon">
                            <i class="material-icons">perm_device_information</i>
                        </div>
                        <div class="row dash-text">
                            <strong>Sales</strong>
                        </div>
                    </div>
                </div>
            </a>
        </div>--}}

        {{--<div class="col-lg-2 col-md-3 col-sm-6">
            <a href="{{route('scan.me')}}" class="module">
                <div class="panel panel-kooc">
                    <div class="panel-heading text-center">
                        <div class="row dash-icon">
                            <i class="material-icons">perm_device_information</i>
                        </div>
                        <div class="row dash-text">
                            <strong>Scan Me</strong>
                        </div>
                    </div>
                </div>
            </a>
        </div>--}}

        @if(App\User::permissionCheck('invoice'))
        <div class="col-lg-2 col-md-3 col-sm-6">
            <a href="{{route('invoices.index')}}" class="module">
                <div class="panel panel-kooc">
                    <div class="panel-heading text-center">
                        <div class="row dash-icon">
                            <i class="material-icons">shopping_basket</i>
                        </div>
                        <div class="row dash-text">
                            <strong>Invoices</strong>
                        </div>
                    </div>
                </div>
            </a>
        </div> 
        @endif
    </div>
@endsection
