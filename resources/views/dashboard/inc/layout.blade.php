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
<body class="{{ app()->getLocale() === 'ps' ? 'dir-rtl' : '' }}">
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>HMS&nbsp;</span>Admin</a>
				<div class="row {{ App::getLocale() == 'en' ? 'pull-right' : ' pull-left' }}">
					<div class="col-lg-1">
						<li class="float-left"><a href="#" data-lang="en">EN</a></li>
					</div>
					<div class="col-lg-1">
						<li class="float-left"><a href="#" data-lang="ps">PS</a></li>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div class="row">
		<div class="text-center">
			@include('dashboard.inc.messages')
		</div>
	</div>
	@yield('content')

	<script src="../dashboard/js/jquery-1.11.1.min.js"></script>
	<script src="../dashboard/js/bootstrap.min.js"></script>
	<script src="../dashboard/js/chart.min.js"></script>
	<script src="../dashboard/js/chart-data.js"></script>
	<script src="../dashboard/js/easypiechart.js"></script>
	<script src="../dashboard/js/easypiechart-data.js"></script>
	<script src="../dashboard/js/bootstrap-datepicker.js"></script>
	<script src="../dashboard/js/custom.js"></script>
    <script src="/js/lang.js"></script>
</body>
</html>