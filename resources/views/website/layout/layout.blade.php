<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HMS</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="sona/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="sona/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="sona/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="sona/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="sona/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/style.css" type="text/css">
    <link href="dashboard/css/lang.css" rel="stylesheet">
    @if(app()->getLocale() == 'ps')
		<style>
           * {
               font-family: 'bahij-regular';
               
            }
             h1, h2, h3, h4, h5, p, a, ul, li {
                 font-family: bahij-regular;
             }

             .hidden {
                 display: none;
             }
		</style>
	@endif

</head>
<body class="{{ app()->getLocale() === 'ps' ? 'dir-rtl' : '' }}">
        

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Start -->

    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="{{ app()->getLocale() === 'ps' ? 'img/af-flag.png' : 'img/flag.jpg' }}" alt="">
                <span>{{ App::getLocale() }} <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#" data-lang="en">EN</a></li>
                        <li><a href="#" data-lang="ps">PS</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="/">@lang('text.Home')</a></li>
                <li><a href="/rooms">@lang('text.Rooms')</a></li>
                <li><a href="/foods">@lang('text.Food Menu')</a></li>
                <li><a href="/services">@lang('text.Services')</a></li>
                <li><a href="/contact">@lang('text.Contacts')</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> +93789123456</li>
            <li><i class="fa fa-envelope"></i> Example@example.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

       
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i>@lang('text.Phone')</li>
                            <li><i class="fa fa-envelope"></i>Example@example.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            
                            <div class="language-option">
                                <img src="{{ app()->getLocale() === 'ps' ? 'img/af-flag.png' : 'img/flag.jpg' }}" alt="">
                                <span>{{ \App::getLocale() }} <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#" data-lang="en">EN</a></li>
                                        <li><a href="#" data-lang="ps">PS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @yield('menu')
    </header>
    <!-- Header End -->


    @yield('contents')

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <p style="padding-left: 80px">@lang('text.Social Media')</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <a href="/contact">
                                <h6>@lang('text.Contact Us')</h6>
                            </a>
                            <ul>
                                <li>@lang('text.Phone')</li>
                                <li> Example@example.com</li>
                                <li>@lang('text.Our address')</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1 users-frm text-align">
                        <div class="ft-newslatter">
                            <a href="/">
                                <h6>@lang('text.New latest')</h6>
                            </a>
                            <p>@lang('text.Offer text')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->



    <!-- Js Plugins -->
    <script src="sona/js/jquery-3.3.1.min.js"></script>
    <script src="sona/js/bootstrap.min.js"></script>
    <script src="sona/js/jquery.magnific-popup.min.js"></script>
    <script src="sona/js/jquery.nice-select.min.js"></script>
    <script src="sona/js/jquery-ui.min.js"></script>
    <script src="sona/js/jquery.slicknav.js"></script>
    <script src="sona/js/owl.carousel.min.js"></script>
    <script src="sona/js/main.js"></script>
    <script src="/js/lang.js"></script>
</body>
</html>