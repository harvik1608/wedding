<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="wpOceans">
		<link rel="shortcut icon" type="image/png" href="{{ asset('website/assets/images/favicon.png') }}">
		<title>{{ config('constant.app_name') }}</title>
		<link href="{{ asset('website/assets/css/themify-icons.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/flaticon.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/magnific-popup.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/animate.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/owl.carousel.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/owl.theme.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/slick.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/slick-theme.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/swiper.min.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/nice-select.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/owl.transitions.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/jquery.fancybox.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/css/odometer-theme-default.css') }}" rel="stylesheet">
		<link href="{{ asset('website/assets/sass/style.css') }}" rel="stylesheet">
	</head>
	<body>
		<div class="page-wrapper">
			<div class="preloader">
	            <div class="vertical-centered-box">
	                <div class="content">
	                    <div class="loader-circle"></div>
	                    <div class="loader-line-mask">
	                        <div class="loader-line"></div>
	                    </div>
	                    <img src="{{ asset('website/assets/images/preloader.png') }}" alt="">
	                </div>
	            </div>
	        </div>
	        <header id="header">
	            <div class="wpo-site-header wpo-site-header-s1">
	                <nav class="navigation navbar navbar-expand-lg navbar-light">
	                    <div class="container-fluid">
	                        <div class="row align-items-center">
	                            <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
	                                <div class="mobail-menu">
	                                    <button type="button" class="navbar-toggler open-btn">
	                                        <span class="sr-only">Toggle navigation</span>
	                                        <span class="icon-bar first-angle"></span>
	                                        <span class="icon-bar middle-angle"></span>
	                                        <span class="icon-bar last-angle"></span>
	                                    </button>
	                                </div>
	                            </div>
	                            <div class="col-lg-2 col-md-6 col-6">
	                                <div class="navbar-header">
	                                    <a class="navbar-brand logo" href="index-2.html"><small>Avadh</small>Pankti<span><i
	                                                class="fi flaticon-dove"></i></span></a>
	                                </div>
	                            </div>
	                            <div class="col-lg-8 col-md-1 col-1">
	                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
	                                    <button class="menu-close"><i class="ti-close"></i></button>
	                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
	                                        <li>
	                                            <a href="#couple">Home</a>
	                                        </li>
	                                        <li>
	                                            <a href="#couple">Couple</a>
	                                        </li>
	                                        <li>
	                                            <a href="#story">Story</a>
	                                        </li>
	                                        <li>
	                                            <a href="#gallery">Gallery</a>
	                                        </li>
	                                        <li>
	                                            <a href="#RSVP">RSVP</a>
	                                        </li>
	                                        <li>
	                                            <a href="#event">Events</a>
	                                        </li>
	                                    </ul>

	                                </div><!-- end of nav-collapse -->
	                            </div>
	                            <div class="col-lg-2 col-md-2 col-2">
	                                <div class="header-right">
	                                    <a class="theme-btn" href="rsvp.html"><span class="text">Attend Now</span> <span class="mobile">
	                                        <i class="fi flaticon-user"></i>
	                                    </span></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div><!-- end of container -->
	                </nav>
	            </div>
	        </header>
	        @yield('main_content')
	        <footer class="wpo-site-footer">
	            <div class="wpo-upper-footer">
	                <div class="container">
	                    <div class="row">
	                        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
	                            <div class="widget about-widget">
	                                <div class="widget-title">
	                                    <a class="logo" href="index-2.html"><small>My</small>love<span><i
	                                        class="fi flaticon-dove"></i></span></a>
	                                </div>
	                                <p>Blandit ipsum arcu donec auctor a, turpis vitae. Egestas pretium euenim non euoeu dignissim nulla nunc quisque</p>
	                                <ul>
	                                    <li>
	                                        <a href="#">
	                                            <i class="ti-facebook"></i>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a href="#">
	                                            <i class="ti-twitter-alt"></i>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a href="#">
	                                            <i class="ti-instagram"></i>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a href="#">
	                                            <i class="ti-google"></i>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="col col-xl-3  col-lg-4 col-md-6 col-sm-12 col-12">
	                            <div class="widget link-widget">
	                                <div class="widget-title">
	                                    <h3>Information</h3>
	                                </div>
	                                <ul>
	                                    <li><a href="about.html">About Us</a></li>
	                                    <li><a href="blog.html">Latest News</a></li>
	                                    <li><a href="accomodation.html">Accomodation</a></li>
	                                    <li><a href="story.html">Our story</a></li>
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="col col-xl-3  col-lg-4 col-md-6 col-sm-12 col-12">
	                            <div class="widget wpo-service-link-widget">
	                                <div class="widget-title">
	                                    <h3>Contact Us</h3>
	                                </div>
	                                <div class="contact-ft">
	                                    <ul>
	                                        <li><i class="fi flaticon-email"></i>Mylove@gmail.com</li>
	                                        <li><i class="fi flaticon-phone-call"></i>+888 (123) 869523</li>
	                                        <li><i class="fi flaticon-maps-and-flags"></i>New York – 1075 Firs Avenue
	                                        </li>
	                                    </ul>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="col col-xl-3  col-lg-4 col-md-6 col-sm-12 col-12">
	                            <div class="widget newsletter">
	                                <div class="widget-title">
	                                    <h3>Newsletter</h3>
	                                </div>
	                                <form>
	                                    <input type="text" placeholder="Email" required>
	                                    <button type="submit">Subscribe</button>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div> <!-- end container -->
	            </div>
	            <div class="wpo-lower-footer">
	                <div class="container">
	                    <div class="row">
	                        <div class="col col-xs-12">
	                            <p class="copyright"> &copy; 2022 Mylove Template. Design By <a
	                                    href="index-2.html">wpOceans</a>. All Rights Reserved.</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </footer>
		</div>
		<script src="{{ asset('website/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('website/assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('website/assets/js/modernizr.custom.js') }}"></script>
		<script src="{{ asset('website/assets/js/jquery.dlmenu.js') }}"></script>
		<script src="{{ asset('website/assets/js/jquery-plugin-collection.js') }}"></script>
		<script src="{{ asset('website/assets/js/moving-animation.js') }}"></script>
		<script src="{{ asset('website/assets/js/script.js') }}"></script>
	</body>
</html>