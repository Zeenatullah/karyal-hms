@extends('dashboard.inc.report')
@section('daily')

	<div class="row">
		<h1 class="col-lg-5" style="margin: 0 30px">@lang('text.Weekly Report')</h1>
	</div>
	<br>
	<a href="/dboard/daily" class="h3 btn btn-primary m-4">Daily</a> 
	<a href="/dboard/weekly" class="h3 btn btn-danger m-4">Weekly</a> 
	<a href="/dboard/monthly" class="h3 btn btn-primary m-4">Monthly</a> 
	<a href="/dboard/grand" class="h3 btn btn-primary m-4">Grand</a> 
@endsection
@section('contents')
	<div class="panel panel-container">
		<div class="row">
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding"><em class="fa fa-xl fa-calendar color-red"></em>
						{{-- <div class="large">{{ $todayBills }}</div> --}}
						<div>@lang('text.Bills')</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-dollar color-orange"></em>
					{{-- <div class="large">{{ $todayFoodsPayment }}</div> --}}
						<div>@lang('text.Bills payment')</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-dollar color-orange"></em>
					{{-- <div class="large">{{ $todayRoomsPayment }}</div> --}}
						<div>@lang('text.Rooms payment')</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
						{{-- <div class="large">{{ $sumOfCustomers }}</div> --}}
						<div>@lang('text.Total passenger')</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Site Traffic Overview
					<ul class="pull-right panel-settings panel-button-tab-right">
						<li class="dropdown">
							<a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#"></a>
						</li>
					</ul>
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
				<div class="panel-body">
					<div class="canvas-wrapper">
						<canvas class="main-chart" id="line-chart" height="200" width="800"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>@lang('text.Total Rooms')</h4>
					{{-- <div class="easypiechart" id="easypiechart-red" data-percent="{{ $totalRooms }}" ><span class="percent">{{ $totalRooms }}</span></div> --}}
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>@lang('text.Booked rooms')</h4>
					{{-- <div class="easypiechart" id="easypiechart-orange" data-percent="{{ $todayBookedRooms }}" ><span class="percent">{{ $todayBookedRooms }}</span></div> --}}
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>@lang('text.Free rooms')</h4>
					{{-- <div class="easypiechart" id="easypiechart-blue" data-percent="{{ $freeRooms }}" ><span class="percent">{{ $freeRooms }}</span></div> --}}
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>@lang('text.Registered Customers')</h4>
					<div class="easypiechart" id="easypiechart-teal" data-percent="{{ $todayRegisteredCustomers }}" ><span class="percent">{{ $todayRegisteredCustomers }}</span></div>
				</div>
			</div>
		</div>
	</div>
@endsection
				