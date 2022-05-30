<!DOCTYPE html>
<html>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Ngadi-Ngadi Store</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('assets/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('assets/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/css/themes/all-themes.css') }}" rel="stylesheet" />

    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" />

    <body class="theme-light-blue">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{route('home')}}">NGADI-NGADI STORE</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <!-- <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- #END# Notifications -->
                    <!-- More Settings -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li> -->
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li> 
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    <!-- #END# More Settings -->
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <!-- <li class="{{ (Request::route()->getName()=='dashboard') ? ' active' : '' }}">
                        <a href="{{route('dashboard')}}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li> -->
                    <li class="{{ (Request::route()->getName()=='users.index') ? ' active' : '' }}">
                        <a href="{{route('users.index')}}">
                            <i class="material-icons">grade</i>
                            <span>Users</span>
                        </a>
                    </li>
                    <!-- <li class="{{ (Request::route()->getName()=='roles.index') ? ' active' : '' }}">
                        <a href="{{route('roles.index')}}">
                            <i class="material-icons">grade</i>
                            <span>Roles</span>
                        </a>
                    </li> -->
                    <li class="{{ (Request::route()->getName()=='categories.index') ? ' active' : '' }}">
                        <a href="{{route('categories.index')}}">
                            <i class="material-icons">class</i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="{{ (Request::route()->getName()=='brands.index') ? ' active' : '' }}">
                        <a href="{{route('brands.index')}}">
                            <i class="material-icons">storage</i>
                            <span>Brands</span>
                        </a>
                    </li>
                    <li class="{{ (Request::route()->getName()=='grades.index') ? ' active' : '' }}">
                        <a href="{{route('grades.index')}}">
                            <i class="material-icons">grade</i>
                            <span>Grades</span>
                        </a>
                    </li>
                    <li class="{{ (Request::route()->getName()=='discount-event.index') ? ' active' : '' }}">
                        <a href="{{route('discount-events.index')}}">
                            <i class="material-icons">event_available</i>
                            <span>Discount Event</span>
                        </a>
                    </li>
                    <!-- <li class="{{ (Request::route()->getName()=='items.index') ? ' active' : '' }}">
                        <a href="{{route('items.index', ['category'=>1])}}">
                            <i class="material-icons">event</i>
                            <span>Items</span>
                        </a>
                    </li> -->
                    <!-- <li class="{{ (Request::route()->getName()=='items.index') ? ' active' : '' }}">
                        <a href="{{route('items.index')}}">
                            <i class="material-icons">business_center</i>
                            <span>Items</span>
                        </a>
                    </li> -->
                    <li class="{{ (Request::route()->getName()=='items.index' || Request::route()->getName()=='items.import' || Request::route()->getName()=='items.print') ? ' active' : '' }}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">business_center</i>
                            <span>Items</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ (Request::route()->getName()=='items.index') ? ' active' : '' }}">
                                <a href="{{route('items.index')}}">Items</a>
                            </li>
                            <li class="{{ (Request::route()->getName()=='items.print') ? ' active' : '' }}">
                                <a href="{{route('items.print')}}">Print QR</a>
                            </li>
                            <li class="{{ (Request::route()->getName()=='items.import') ? ' active' : '' }}">
                                <a href="{{route('items.import')}}">Import</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ (Request::route()->getName()=='customers.index' || Request::route()->getName()=='customers.import') ? ' active' : '' }}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">event_available</i>
                            <span>Customers</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ (Request::route()->getName()=='customers.index') ? ' active' : '' }}">
                                <a href="{{route('customers.index')}}">Customers</a>
                            </li>
                            <li class="{{ (Request::route()->getName()=='customers.import') ? ' active' : '' }}">
                                <a href="{{route('customers.import')}}">Import</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="{{ (Request::route()->getName()=='invoices.index') ? ' active' : '' }}">
                        <a href="{{route('invoices.index')}}">
                            <i class="material-icons">shopping_basket</i>
                            <span>Invoices</span>
                        </a>
                    </li> -->
                    <!-- <li class="{{ (Request::route()->getName()=='cashiers.index' || Request::route()->getName()=='cashiers.import') ? ' active' : '' }}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">event_available</i>
                            <span>Cashier</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ (Request::route()->getName()=='cashiers.index') ? ' active' : '' }}">
                                <a href="{{route('cashiers.index')}}">Cashier</a>
                            </li>
                            <li class="{{ (Request::route()->getName()=='cashiers.import') ? ' active' : '' }}">
                                <a href="{{route('cashiers.import')}}">Import</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">

        @yield('content')

    </section>

    </body>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('assets/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('assets/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('assets/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <!-- <script src="{{ asset('assets/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-charts/jquery.flot.time.js') }}"></script> -->

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('assets/js/pages/index.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>

    <!-- Sweetalert Css -->
    <link href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    @stack('scripts')
</html>