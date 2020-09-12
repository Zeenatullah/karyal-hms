<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>{{ config('app.name') }}</title>
			<meta name="description" content="Marimar Hotel template project">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="../marimar/styles/bootstrap-4.1.2/bootstrap.min.css">
			<link href="../marimar/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
			<link rel="stylesheet" type="text/css" href="../marimar/plugins/OwlCarousel2-2.3.4/owl.carousel.css">
			<link rel="stylesheet" type="text/css" href="../marimar/plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
			<link rel="stylesheet" type="text/css" href="../marimar/plugins/OwlCarousel2-2.3.4/animate.css">
			<link href="../marimar/plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
			<link rel="stylesheet" type="text/css" href="../marimar/styles/main_styles.css">
			<link rel="stylesheet" type="text/css" href="../marimar/styles/responsive.css">
			<link rel="stylesheet" type="text/css" href="../marimar/styles/contact.css">
			<link rel="stylesheet" type="text/css" href="../marimar/styles/contact_responsive.css">
			<link href="../../dashboard/css/lang.css" rel="stylesheet">
			@if(app()->getLocale() == 'ps')
				<style>
					* {
						font-family: 'bahij-regular';
					}
						h1, h2, h3, h4, h5, p, a, ul, li {
						font-family: bahij-regular;
					}
					#ps_margin {
						margin-right: 50px;
					}
				</style>
			@endif
		</head>
		<body class="{{ app()->getLocale() === 'ps' ? 'dir-rtl' : '' }}">
			<div class="super_container">
				<!-- Header -->
				<header class="header users-frm text-align">
					<div class="header_content d-flex flex-column align-items-center justify-content-lg-end justify-content-center">
						
						<!-- Main Nav -->
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								@yield('menuBar')
							</ul>
						</nav>
							
						<!-- Social -->
						<div class="social header_social">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li class="bg-dark"><a href="#" data-lang="en" class="text-white"><b>EN</b></a></li>
								<li class="bg-dark"><a href="#" data-lang="ps" class="text-white"><b>PS</a></b></li>
							</ul>
						</div>
	
						<!-- Header Right -->
						<div class="header_right d-flex flex-row align-items-center justify-content-start">
	
							<!-- Hamburger Button -->
							<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
							<div id="app">
								<nav class="navbar navbar-expand-md shadow-sm">
									<div class="container">

										<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
											<span class="navbar-toggler-icon"></span>
										</button>
						
										<div class="collapse navbar-collapse" id="navbarSupportedContent">
	
											<!-- Right Side Of Navbar -->
											<ul class="navbar-nav ml-auto">
												<!-- Authentication Links -->
												@guest
													<li class="nav-item">
														<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
													</li>
													@if (Route::has('register'))
														<li class="nav-item">
															<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
														</li>
													@endif
												@else
													<li class="nav-item dropdown">
														<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
															{{ Auth::user()->name }} <span class="caret"> </span>
														</a>
						
														<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
															<a class="dropdown-item" href="{{ route('logout') }}"
															   onclick="event.preventDefault();
																			 document.getElementById('logout-form').submit();">
																{{ __('Logout') }}
															</a>
						
															<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																@csrf
															</form>
														</div>
													</li>
												@endguest
											</ul>
										</div>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</header>
	
				<!-- Menu Overlay -->
				<div class="menu_overlay">
					<div class="menu_overlay_content d-flex flex-row align-items-center justify-content-center">
						<!-- Hamburger Button -->
						<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			
	
				<!-- Menu -->
				<div class="menu">
					<div class="menu_container d-flex flex-column align-items-center justify-content-center">
						<!-- Menu Navigation -->
						<nav class="menu_nav text-center">
							<ul>
								<li><a href="service">Home@lang('text.Home')</a></li>
								<li><a href="customer">@lang('text.RegisterCustomer')</a></li>
								<li><a href="roombooking">@lang('text.BookRoom')</a></li>
								<li><a href="food">@lang('text.Foods')</a></li>
							</ul>
						</nav>
					</div>
				</div>

				@yield('contents')
			</div>
			<script src="../marimar/js/jquery-3.3.1.min.js"></script>
			<script src="../marimar/styles/bootstrap-4.1.2/popper.js"></script>
			<script src="../marimar/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
			<script src="../marimar/plugins/greensock/TweenMax.min.js"></script>
			<script src="../marimar/plugins/greensock/TimelineMax.min.js"></script>
			<script src="../marimar/plugins/scrollmagic/ScrollMagic.min.js"></script>
			<script src="../marimar/plugins/greensock/animation.gsap.min.js"></script>
			<script src="../marimar/plugins/greensock/ScrollToPlugin.min.js"></script>
			<script src="../marimar/plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
			<script src="../marimar/plugins/easing/easing.js"></script>
			<script src="../marimar/plugins/progressbar/progressbar.min.js"></script>
			<script src="../marimar/plugins/parallax-js-master/parallax.min.js"></script>
			<script src="../marimar/plugins/jquery-datepicker/jquery-ui.js"></script>
			<script src="../marimar/js/custom.js"></script>
			<script src="../js/lang.js"></script>
		</body>
</html>