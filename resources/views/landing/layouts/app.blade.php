<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{asset('final/Artboard 1round-2.png')}}">

        <title>{{config('app.name')}} - {{$title}}</title>

        <!-- Vendors Style-->
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap/dist/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/OwlCarousel2/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/OwlCarousel2/dist/assets/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/lightbox-master/dist/ekko-lightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/aos/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/datatable/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/corenav-master/coreNavigation-1.1.3.css') }}">

        <!-- Style-->  
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/skin_color.css') }}">
        <!-- Pace style -->
        <link rel="stylesheet" href="{{ asset('assets/vendor_components/pace/pace.min.css') }}">
    </head>
    <body class="theme-warning">
        <header class="top-bar">
            <div class="topbar">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-6 col-12 d-lg-block d-none">
                            <div class="topbar-social text-center text-md-start topbar-left">
                                <ul class="list-inline d-md-flex d-inline-block">
                                    <li class="ms-10 pe-10"><a href="#"><i class="text-white fa fa-question-circle"></i> Ask a Question</a></li>
                                    <li class="ms-10 pe-10"><a href="mailto:support@fxbitrade.com"><i class="text-white fa fa-envelope"></i> support@fxbitrade.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 xs-mb-10">
                            <div class="topbar-call text-center text-lg-end topbar-right">
                                <ul class="list-inline d-lg-flex justify-content-end">				  
                                    <li class="me-10 ps-10 lng-drop">
                                        <select class="header-lang-bx selectpicker">
                                            <option>USD</option>
                                            <option>EUR</option>
                                            <option>GBP</option>
                                            <option>INR</option>
                                        </select>
                                    </li>
                                    <li class="me-10 ps-10 lng-drop">
                                        <select class="header-lang-bx selectpicker">
                                            <option data-icon="flag-icon flag-icon-us">Eng USA</option>
                                            <option data-icon="flag-icon flag-icon-gb">Eng UK</option>
                                        </select>
                                    </li>
                                    @guest
                                    <li class="me-10 ps-10"><a href="/login"><i class="text-white fa fa-sign-in d-md-inline-block d-none"></i> Login</a></li>
                                    @else
                                    <li class="me-10 ps-10"><a href="{{route('user')}}"><i class="text-white fa fa-dashboard d-md-inline-block d-none"></i> My Account</a></li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav hidden class="nav-white nav-transparent">
                <div class="nav-header">
                    <a href="{{route('welcome')}}" class="brand">
                        <img src="{{asset('final/Artboard 1txt-2.png')}}" alt=""/>
                    </a>
                    <button class="toggle-bar">
                        <span class="ti-menu"></span>
                    </button>	
                </div>								
                <ul class="menu">				
                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{route('welcome')}}">Home</a>
                    </li>				
                    <li class="{{ Request::is('about') ? 'active' : '' }}">
                        <a href="{{route('about')}}">About</a>
                    </li>						
                    <li class="{{ Request::is('how-it-work') ? 'active' : '' }}">
                        <a href="{{route('howItWork')}}">How It Work</a>
                    </li>	
                    <li class="{{ Request::is('plans') ? 'active' : '' }}">
                        <a href="{{route('plans')}}">Investment Plans</a>
                    </li>
                    <li class="{{ Request::is('faq') ? 'active' : '' }}">
                        <a href="{{route('faq')}}">FAQ</a>
                    </li>		
                    <li class="{{ Request::is('contact') ? 'active' : '' }}">
                        <a href="{{route('contact')}}">Contact</a>
                    </li>
                </ul>
                <ul class="attributes">
                    @guest
                    <li class="d-md-block d-none"><a href="/register" class="px-10 pt-15 pb-10"><div class="btn btn-primary py-5">Register Now</div></a></li>
                    @else
                    <li class="d-md-block d-none"><a href="{{route('user')}}" class="px-10 pt-15 pb-10"><div class="btn btn-primary py-5">Dashboard</div></a></li>
                    @endguest
                </ul>
            </nav>
        </header>

        @yield('content')

        <section class="bg-light py-30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9 col-12">
                        <div class="text-md-start text-center">
                            <h2><strong>Access to positive investment at your fingertips. Create a free account in 3 minutes: </strong></h2>
                            <p class="mb-0">Explore to see just how powerful Fxbitrade can meet your everyday need. You can also get in touch with us.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">					
                         <div class="text-md-end text-center mt-30 mt-md-0">
                            <a class="btn btn-primary" href="{{route('register')}}">Register Now</a> 
                         </div>
                    </div>
                </div>
            </div>
        </section>
        
        <footer class="footer_three">
            <div class="footer-top bg-dark3 pt-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="widget">
                                <h4 class="footer-title">About</h4>
                                <hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                                <p class="mb-20">Fxbitrade provides you an opportunity to convert your dreams into reality. We are providing you freedom to make money sitting at your home, you can earn a passive income and fulfill the dreams of living a luxurious life.</p>
                            </div>
                        </div>											
                        <div class="col-lg-3 col-12">
                            <div class="widget">
                                <h4 class="footer-title">Contact Info</h4>
                                <hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                                <ul class="list list-unstyled mb-30">
                                    <li> <i class="fa fa-map-marker"></i>32-36, Loman St, London,<br>SE1 0EH UK</li>
                                    <li> <i class="fa fa-phone"></i> <span>+(1) 123-878-1649 </span><br><span>+(1) 123-878-1649 </span></li>
                                    <li> <i class="fa fa-envelope"></i> <span>support@fxbitrade.com </span></li>
                                </ul>
                            </div>
                        </div>					
                        <div class="col-12 col-lg-3">
                            <div class="widget footer_widget clearfix">
                                <h4 class="footer-title">Our Gallery</h4>
                                <hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('welcome') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('howItWork') }}">How It Work</a></li>
                                    <li><a href="{{ route('plans') }}">Investment Plans</a></li>
                                    <li><a href="{{ route('faq') }}">Faq</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="widget">
                                <h4 class="footer-title">Accept Card Payments</h4>
                                <hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                                <ul class="payment-icon list-unstyled d-flex gap-items-1">
                                    <li class="ps-0">
                                        <a href="javascript:;"><i class="fa fa-cc-amex" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="fa fa-cc-visa" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="fa fa-cc-paypal" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                                <h4 class="footer-title mt-20">Newsletter</h4>
                                <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto w-60">
                                <div class="mb-20">
                                    <form class="" action="" method="post">
                                        <div class="input-group">
                                            <input name="email" required="required" class="form-control" placeholder="Your Email Address" type="email">
                                            <button name="submit" value="Submit" type="submit" class="btn btn-primary"> <i class="fa fa-envelope"></i> </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>				
                </div>
            </div>		
            <div class="footer-bottom bg-dark3">
                <div class="container">
                    <div class="align-items-center">
                        <div class="text-center"> © {{ now()->year }} <span class="text-white"> Fxbitrade</span>  All Rights Reserved.</div>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Vendor JS -->
        <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
        <script src="{{ asset('assets/corenav-master/coreNavigation-1.1.3.js') }}"></script>
        <script src="{{ asset('assets/js/nav.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/OwlCarousel2/dist/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js') }}"></script>
	    <script src="{{ asset('assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') }}"></script>
        <!-- PACE -->
        <script src="{{ asset('assets/vendor_components/pace/pace.min.js') }}"></script>
        <script>
            //ticker
            if ($('#webticker-1').length) {   
                $("#webticker-1").webTicker({
                    height:'auto', 
                    duplicate:true, 
                    startEmpty:false, 
                    rssfrequency:5
                });
            }
            /*--- Sparkline charts - mini charts ---*/ 
            function sparkline_charts() {
                $('.sparklines').sparkline('html');
            }
            if ($('.sparklines').length) {
                sparkline_charts();
            } 
        </script>
        <!-- CryptoCurrency front end -->
        <script src="{{ asset('assets/js/template.js') }}"></script>
        <script src="{{ asset('assets/js/pages/pace.js') }}"></script>
    </body>
</html>
