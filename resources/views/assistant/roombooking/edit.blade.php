@extends('layout.edit')
@section('contents')

	@section('menuBar')
		<li><a href="service">@lang('text.Home')</a></li>
		<li><a href="customer">@lang('text.RegisterCustomer')</a></li>
		<li><a href="roombooking">@lang('text.BookRoom')</a></li>
		<li><a href="food" id='ps_margin'>@lang('text.Foods')</a></li>
	@endsection
	<div class="container-fluid">
		<div class="row text-center" style="margin: 90px 0 0 0">
			<div class="col-lg-12 aling-text">
				<h1>@lang('text.Change booked room info')</h1>
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-lg-10 offset-lg-1 alert alert-success users-frm text-align pt-5" style=" background: #868eea; color: white; border-radius: 10px">
				{!! Form::open(['action' => ['RoomBookingController@update', $roomBooking->roomId], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
					<div class="row">
						<div class="col-lg-1"></div>
						<div class="col-lg-5">
							<label for="startDate">@lang('text.Start date')</label>
							<input type="date" id="startDate" class="form-control" required="required" name="startDate" value="{{$roomBooking->startDate}}">
						</div>
						<div class="col-lg-5">
							<label for="endDate">@lang('text.End date')</label>
							<input type="date" id="endDate" class="form-control"  required="required" name="endDate" value="{{$roomBooking->endDate}}">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-1"></div>
						<div class="col-lg-5">
							<label for="paidCach">@lang('text.Price')</label>
							<input type="number" disabled id="paidCach" class="form-control"  required="required" name="payment" value="{{$roomBooking->rooms->price}}">
						</div>
						<div class="col-lg-5">
							<label for="paidCach">@lang('text.Paid cash')</label>
							<input type="number" id="paidCach" class="form-control"  required="required" name="payment" value="{{$roomBooking->payment}}">
						</div>
					</div>
					<div class="row m-3">
						<div class="col-lg-3"></div>
						{{Form::submit(__('text.Submit'), ['class' =>'btn btn-success col-lg-1'])}}
						<div class="col-lg-4"></div>
						<a href="/roombooking" class="btn btn-primary col-lg-1">@lang('text.Go back')</a>
					</div>
					{{Form::hidden('_method', 'PUT')}}
				{!! Form::close() !!}  
			</div>
		</div>
	</div>
	
@endsection

