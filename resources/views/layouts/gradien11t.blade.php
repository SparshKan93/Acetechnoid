<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Acetechnoid') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('gradient/img/favicon.ico') }}">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/font-awesome.min.css') }}">
    <!-- adminpro icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/adminpro-custon-icon.css') }}">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/meanmenu.min.css') }}">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/animate.css') }}">
    <!-- data-table CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/data-table/bootstrap-table.css') }}">
    <link rel="stylesheet" href="{{ asset('gradient/css/data-table/bootstrap-editable.css') }}">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/normalize.css') }}">
    <!-- charts C3 CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/c3.min.css') }}">
    <!-- forms CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/form/all-type-forms.css') }}">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/style.css') }}">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('gradient/css/responsive.css') }}">
    <!-- jquery
        ============================================ -->
    <script src="{{ asset('gradient/js/vendor/jquery-1.11.3.min.js') }}"></script>
    <!-- modernizr JS
        ============================================ -->
    <script src="{{ asset('gradient/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body class="materialdesign ">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Header top area start-->
    <div class="wrapper-pro">
        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="#"><img src="{{ asset('gradient/img/acetechnoid.jpg') }}" alt="" style="width:100px" />
                    </a>
                    <h3>{{ config('app.name', 'Acetechnoid') }}</h3>
                    <h3>{{ auth::user()->name }}</h3>
                    <p>
                        @switch(auth::user()->user_type)
                            @case(1) Admin
                            @break;
                            @default User
                            @break
                        @endswitch
                    </p>

                    <strong>{{ implode(' ', array_map(function($v) { return $v[0]; }, explode(' ', config('app.name', 'Acetechnoid')))) }}</strong>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-gear"></i> <span class="mini-dn">Masters</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <!-- <a href="dashboard.html" class="dropdown-item">Publications</a>
                                <a href="dashboard-2.html" class="dropdown-item">Series</a> -->
                                <a href="{{ url('/categories') }}" class="dropdown-item">Categories</a>
                                <a href="{{ url('/question-categories') }}" class="dropdown-item">Question Categories</a>
                                <a href="{{ url('/group-myebook') }}" class="dropdown-item">Groups</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="{{ url('myebook') }}" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-book"></i> <span class="mini-dn">E Books</span></a>
                        </li>
                        <li class="nav-item"><a href="{{ url('generate-paper') }}" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-file-powerpoint-o"></i> <span class="mini-dn">Paper Generator</span></a>
                        <li class="nav-item"><a href="{{ url('generate-paper-hindi') }}" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-file-powerpoint-o"></i> <span class="mini-dn">Paper Generator(Hindi)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="#"><img src="{{ asset('gradient/img/acetechnoid.jpg') }}" alt="" />{{ config('app.name', 'Acetechnoid') }}
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-lg-11 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name">{{ auth::user()->name }}</span>
                                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <!-- <li><a href="#"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>My Account</a> 
                                                </li> -->
                                                <li><a href="#"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>My Profile</a>
                                                </li>
                                                <!-- <li><a href="#"><span class="adminpro-icon adminpro-money author-log-ic"></span>User Billing</a>
                                                </li> -->
                                                <!-- <li><a href="#"><span class="adminpro-icon adminpro-settings author-log-ic"></span>Settings</a>
                                                </li> -->
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <span class="adminpro-icon adminpro-locked author-log-ic"></span>
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end-->
            
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a href="{{ url('myebook') }}">Dashboard </a>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Masters <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="{{ url('/categories') }}">Categories</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('/') }}">E Books </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            @yield('content')
        </div>
    </div>
    <!-- Footer Start-->
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright &#169; All rights reserved. <a target="blank" href="https://wellspringpublishinghouse.com">{{ config('app.name', 'Acetechnoid') }}</a>.</p>
                        <p>Developed & Designed by <a target="blank" href="https://acetechnoid.com"><b>Ace Technoid</b></a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
    
    
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('gradient/js/bootstrap.min.js') }}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('gradient/js/jquery.meanmenu.js') }}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ asset('gradient/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{ asset('gradient/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('gradient/js/jquery.scrollUp.min.js') }}"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="{{ asset('gradient/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('gradient/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('gradient/js/counterup/counterup-active.js') }}"></script>
    <!-- peity JS
        ============================================ -->
    <script src="{{ asset('gradient/js/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('gradient/js/peity/peity-active.js') }}"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{ asset('gradient/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('gradient/js/sparkline/sparkline-active.js') }}"></script>
    <!-- flot JS
        ============================================ -->
    <script src="{{ asset('gradient/js/flot/Chart.min.js') }}"></script>
    <script src="{{ asset('gradient/js/flot/flot-active.js') }}"></script>
    <!-- map JS
        ============================================ -->
    <script src="{{ asset('gradient/js/map/raphael.min.js') }}"></script>
    <script src="{{ asset('gradient/js/map/jquery.mapael.js') }}"></script>
    <script src="{{ asset('gradient/js/map/france_departments.js') }}"></script>
    <script src="{{ asset('gradient/js/map/world_countries.js') }}"></script>
    <script src="{{ asset('gradient/js/map/usa_states.js') }}"></script>
    <script src="{{ asset('gradient/js/map/map-active.js') }}"></script>
    <!-- data table JS
        ============================================ -->
    <script src="{{ asset('gradient/js/data-table/bootstrap-table.js') }}"></script>
    <script src="{{ asset('gradient/js/data-table/tableExport.js') }}"></script>
    <script src="{{ asset('gradient/js/data-table/data-table-active.js') }}"></script>
    <script src="{{ asset('gradient/js/data-table/bootstrap-table-editable.js') }}"></script>
    <script src="{{ asset('gradient/js/data-table/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('gradient/js/data-table/bootstrap-table-resizable.js') }}"></script>
    <script src="{{ asset('gradient/js/data-table/colResizable-1.5.source.js') }}"></script>
    <script src="{{ asset('gradient/js/data-table/bootstrap-table-export.js') }}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('gradient/js/main.js') }}"></script>
</body>

</html>