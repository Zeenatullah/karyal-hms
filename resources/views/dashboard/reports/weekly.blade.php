@extends('dashboard.inc.report')
@section('daily')

	<div class="row">
		<h1 class="col-lg-5" style="margin: 0 30px">@lang('text.Weekly Report')</h1>
	</div>
	<br>
	<a href="/dboard/daily" class="h3 btn btn-primary m-4" style="margin: 5px">Daily</a> 
	<a href="/dboard/weekly" class="h3 btn btn-danger m-4" style="margin: 5px">Weekly</a> 
	<a href="/dboard/monthly" class="h3 btn btn-primary m-4" style="margin: 5px">Monthly</a> 
	<a href="/dboard/grand" class="h3 btn btn-primary m-4" style="margin: 5px">Grand</a> 
	<div class="row">
		<span class="col-lg-10"></span>
		<li class=" btn btn-primary" style="width: 80px">
			<a href="/dboard/weeklyPrint" style="color: white;">@lang('text.Details')</a>
		</li>
	</div>
@endsection
@section('contents')
	<div class="panel panel-container">
		<div class="row">
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding"><em class="fa fa-xl fa-calendar color-red"></em>
						<div class="large">{{ $thisWeekBills }}</div>
						<div>@lang('text.Bills')</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-dollar color-orange"></em>
					<div class="large">{{ $thisWeekFoodsPayment }}</div>
						<div>@lang('text.Bills payment')</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-dollar color-orange"></em>
					<div class="large">{{ $thisWeekRoomsPayment }}</div>
						<div>@lang('text.Rooms payment')</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
						<div class="large">{{ $sumOfCustomers }}</div>
						<div>@lang('text.Total passenger')</div>
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
					<div class="easypiechart" id="easypiechart-red" data-percent="{{ $totalRooms }}" ><span class="percent">{{ $totalRooms }}</span></div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>@lang('text.Booked rooms')</h4>
					<div class="easypiechart" id="easypiechart-orange" data-percent="{{ $thisWeekBookedRooms }}" ><span class="percent">{{ $thisWeekBookedRooms }}</span></div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>@lang('text.Free rooms')</h4>
					<div class="easypiechart" id="easypiechart-blue" data-percent="{{ $freeRooms }}" ><span class="percent">{{ $freeRooms }}</span></div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>@lang('text.Registered Customers')</h4>
					<div class="easypiechart" id="easypiechart-teal" data-percent="{{ $thisWeekRegisteredCustomers }}" ><span class="percent">{{ $thisWeekRegisteredCustomers }}</span></div>
				</div>
			</div>
		</div>
	</div>
@endsection
				