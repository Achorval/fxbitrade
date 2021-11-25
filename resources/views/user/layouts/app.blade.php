<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('final/Artboard 1round-2.png')}}">

    <title>{{config('app.name')}} - {{$title}}</title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Table -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor_components/datatable/datatables.min.css') }}"/>
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('assets/vendor_components/select2/dist/css/select2.min.css') }}">
	<!-- theme style -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
	<!-- Pace style -->
	<link rel="stylesheet" href="{{ asset('assets/vendor_components/pace/pace.min.css') }}"> <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/toastr/css/toastr.min.css') }}">	
	<!-- Admin skins -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/skin_color.css') }}">	
</head>
<body class="hold-transition light-skin dark-sidebar sidebar-mini theme-classic fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="{{route('user')}}" class="logo">
                <!-- mini logo -->
                <div class="logo-mini">
                    <span class="light-logo"><img src="{{asset('final/Artboard 1txt-1.png')}}" alt="logo"></span>
                    <span class="dark-logo"><img src="{{asset('final/Artboard 1txt-1.png')}}" alt="logo"></span>
                </div>
                <!-- logo-->
                <div class="logo-lg">
                    <span class="light-logo"><img src="{{asset('final/Artboard 1txt-1.png')}}" alt="logo"></span>
                    <span class="dark-logo"><img src="{{asset('final/Artboard 1txt-1.png')}}" alt="logo"></span>
                </div>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div>
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <i class="ti-align-left"></i>
                    </a>
                    
                    <a href="#" data-provide="fullscreen" class="sidebar-toggle" title="Full Screen">
                        <i class="mdi mdi-crop-free"></i>
                    </a> 
                    
                </div>
                    
                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="User">
                                <img src="{{ asset('images/avatar/avatar.svg') }}" class="user-image rounded-circle" alt="User Image">
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <a class="dropdown-item" href="{{ route('userProfile') }}">
                                        <i class="ion ion-person"></i> Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('userReferrals') }}">
                                        <i class="ti-reload"></i> Referrals
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ion-log-out"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    
        @yield('content')
    
        <footer class="main-footer">
            <div class="text-center">
            &copy; {{ now()->year }} <a href="https://www.fxbitrade.com/">Fxbitrade</a>. All Rights Reserved.
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->
        
	<!-- jQuery 3 -->
	<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
	<!-- fullscreen -->
	<script src="{{ asset('assets/vendor_components/screenfull/screenfull.js') }}"></script>
	<!-- popper -->
	<script src="{{ asset('assets/vendor_components/popper/dist/popper.min.js') }}"></script>
	<!-- Bootstrap 4.0-->
	<script src="{{ asset('assets/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<!-- SlimScroll -->
	<script src="{{ asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>
	<!-- Select2 -->
	<script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
    <!-- This is data table -->
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/data-table.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/vendor_components/toastr/js/toastr.min.js') }}"></script>
	<!-- PACE -->
	<script src="{{ asset('assets/vendor_components/pace/pace.min.js') }}"></script>
	<script>
		if ($('.coins-exchange').length) {
		   $('.coins-exchange').select2();
		}
		if ($('.money-exchange').length) {
		   $('.money-exchange').select2();
		}
	</script>
	<!-- Crypto Admin App -->
	<script src="{{ asset('assets/admin/js/template.js') }}"></script>
	<!-- Crypto Admin for demo purposes -->
	<script src="{{ asset('assets/admin/js/demo.js') }}"></script>
	<script src="{{ asset('assets/js/pages/pace.js') }}"></script>
</body>
</html>
