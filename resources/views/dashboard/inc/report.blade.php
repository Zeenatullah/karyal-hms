<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HMS</title>
	<link href="../dashboard/css/bootstrap.min.css" rel="stylesheet">
	<link href="../dashboard/css/font-awesome.min.css" rel="stylesheet">
	<link href="../dashboard/css/datepicker3.css" rel="stylesheet">
	<link href="../dashboard/css/styles.css" rel="stylesheet">
	<link href="../dashboard/css/lang.css" rel="stylesheet">

	@if(App::getLocale() === 'ps')
		<link href="../dashboard/css/style-rtl.css" rel="stylesheet">
		<style>
			#sidebar-collapse {
				position: fixed;
				right: 0;
			}
			#ps_main {
				 position: absolute;
				 left: 0;
			}
			* {
				font-family: 'bahij-regular';
			}
		</style>
	@endif
</head>
<body >
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>HMS&nbsp;</span>Admin</a>
				<div class="row {{ App::getLocale() == 'en' ? 'pull-right' : ' pull-left' }}">
					<div class="col-lg-1">
						<li class="float-left "><a href="#" data-lang="en" style="color: white">EN</a></li>
					</div>
					<div class="col-lg-1">
						<li class="float-left"><a href="#" data-lang="ps" style="color: white">PS</a></li>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			{{-- Sidebar start --}}
			
			<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
				<div class="profile-sidebar">
					<div class="profile-userpic">
						<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
					</div>
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
						<div class="profile-usertitle-status"><span class="indicator label-success"></span> Online</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="divider"></div>

				<ul class="nav menu" >
					<li style="font-family: bahij-regular" class="active"><a href="/dboard"><em class="fa fa-dashboard">&nbsp;</em> @lang('text.Home')</a></li>
					<li><a href="/dboard/users"><em class="fa fa-user">&nbsp;</em> @lang('text.Users')</a></li>
					<li><a href="/dboard/employees"><em class="fa fa-users">&nbsp;</em> @lang('text.Employees')</a></li>
					<li><a href="/dboard/rooms"><em class="fa fa-toggle-off">&nbsp;</em> @lang('text.Rooms')</a></li>
					<li><a href="/dboard/foods"><em class="fa fa-clone">&nbsp;</em> @lang('text.Food Menu')</a></li>
					<li><a href="/dboard/feedback"><em class="fa fa-address-book">&nbsp;</em> @lang('text.Feedback')</a></li>

					<li class="nav-item dropdown">
						<li >
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown" style="left: 10px; width: 200px; padding-left: 10px; a:hover: text-decoration: none; background-color: #30a5ff; color: #fff; text-align: left">
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
					</li>
				</ul>
			</div>
			{{-- Sidebar End --}}
			<div class="col-sm-9 col-lg-10 {{ App::getLocale() !== "ps" ? 'col-sm-offset-3 col-lg-offset-2' : '' }} main" id="ps_main">
				<div class="row">
					<ol class="breadcrumb">
						<li><a href="#">
							<em class="fa fa-home"></em>
						</a></li>
						<li class="active">@lang('text.Dashboard')</li>
					</ol>
				</div>
				
				<div class="row">
					<div class="col-lg-4">
						<h1 class="page-header">@lang('text.Dashboard')</h1>
					</div>
					<div class="col-lg-8">
						{{-- <h3 class="page-header">@lang('text.Dashboard')</h3> --}}
						<div class="page-header">
                            @yield('daily')
						</div>
					</div>
				</div>
				@yield('contents')
			</div>
		</div>
	</div>
	<script src="../dashboard/js/jquery-1.11.1.min.js"></script>
	<script src="../dashboard/js/bootstrap.min.js"></script>
	<script src="../dashboard/js/chart.min.js"></script>
	<script src="../dashboard/js/chart-data.js"></script>
	<script src="../dashboard/js/easypiechart.js"></script>
	<script src="../dashboard/js/easypiechart-data.js"></script>
	<script src="../dashboard/js/bootstrap-datepicker.js"></script>
	<script src="../dashboard/js/custom.js"></script>
    <script src="/js/lang.js"></script>
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
			});
		};
	</script>
</body>
</html>