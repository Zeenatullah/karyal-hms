<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
    @if(App::getLocale() === 'ps')
		<link href="../dashboard/css/style-rtl.css" rel="stylesheet">
		<style>
			#sidebar-collapse {
				top: 0 !important;
			}
		</style>
	@endif
</head>
<body>
    @include('../dashboard/inc/messages');
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
