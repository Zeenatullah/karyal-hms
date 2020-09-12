@extends('dashboard.inc.report')
@section('daily')
	<div class="row">
		<h1 class="col-lg-5" style="margin: 0 30px">@lang('text.Monthly Report')</h1>
	</div>
	<br>
	<a href="/dboard/daily" class="h3 btn btn-primary m-4" style="margin: 5px">Daily</a> 
	<a href="/dboard/weekly" class="h3 btn btn-primary m-4" style="margin: 5px">Weekly</a> 
	<a href="/dboard/monthly" class="h3 btn btn-danger m-4" style="margin: 5px">Monthly</a> 
	<a href="/dboard/grand" class="h3 btn btn-primary m-4" style="margin: 5px">Grand</a> 
@endsection
@section('contents')
	<div class="row" style="height: 50px; background-color: black; border-radius: 50px"></div>
	<div class="container-fluid">

		<div class="col-lg-11 offset-lg-1">
			<h1 class="text-center">@lang('text.Users')</h1>
			<table class="table table-striped table-bordered users-frm">
				<thead class="thead-light">
					<tr style="text-align: left">
						<th scope="col">@lang('text.Number')</th>
						<th scope="col">@lang('text.Name')</th>
						<th scope="col">@lang('text.Position')</th>
						<th scope="col">@lang('text.Email')</th>
						<th scope="col">@lang('text.Hired on')</th>
						<th scope="col">@lang('text.MoreInfo')</th>
					</tr>
				</thead>
				<tbody>
					<?php $counter = 1; ?>
					@if(count($users) > 0)
						@foreach ($users as $user)
							<tr>
								<th style="padding-right: 20px" scope="row">{{ $counter, $counter++}}</th>
								<td>{{ $user->name }}</td>
								<td>{{ $user->user_type }} </td>
								<td>{{ $user->email }} </td>
								<td>{{ $user->created_at }} </td>
								<td><a href="/receptionist/{{$user->id}}">@lang('text.MoreInfo')</a></td>
							</tr>
						@endforeach
					@else
						<p>There is no User</p>
					@endif
				</tbody>
			</table>
		</div>
		<br>
		<div class="col-lg-11 offset-lg-1">
			<h1 class="text-center">@lang('text.Employees')</h1>
			<table class="table table-bordered table-stripped">
				<thead class="thead-light">
					<tr class="">
						<th scope="col">@lang('text.Number')</th>
						<th scope="col">@lang('text.Name')</th>
						<th scope="col">@lang('text.Last Name')</th>
						<th scope="col">@lang('text.Phone number')</th>
						<th scope="col">@lang('text.Position')</th>
						<th scope="col">@lang('text.Hired on')</th>
						<th scope="col">@lang('text.MoreInfo')</th>
					</tr>
				</thead>
				<tbody>
					<?php $counter = 1; ?>
					@if(count($employees) > 0)
						@foreach ($employees as $employee)
							<tr>
								<th style="padding-right: 20px" scope="row">{{ $counter, $counter++}}</th>
								<td>{{ $employee->name }}</td>
								<td> {{ $employee->lastName }} </td>
								<td> {{ $employee->phoneNo }} </td>
								<td> {{ $employee->employee_type }} </td>
								<td> {{ $employee->created_at }} </td>
								<td><a href="/employee/{{$employee->id}}">@lang('text.MoreInfo')</a></td>
							</tr>
						@endforeach
					@else
						<p>There is no Receptionist</p>
					@endif
				</tbody>
			</table>
		</div>

		<div class="col-lg-11 offset-lg-1">
			<h1 class="text-center">@lang('text.Rooms')</h1>
			@if(count($rooms) > 0)
				<table class="table table-striped table-bordered ">
					<thead class="thead-light">
						<tr>
						<th scope="col">@lang('text.Number')</th>
						<th scope="col">@lang('text.Price')</th>
						<th scope="col">@lang('text.NumberOfPeople')</th>
						<th scope="col">@lang('text.Created at')</th> 
						<th scope="col">@lang('text.MoreInfo')</th> 
						</tr>
					</thead>
					<tbody>
						@php $counter = 1; @endphp
							@foreach ($rooms as $room)
								<tr>
									<th scope="row">{{ $counter++ }}</th>
									<td>{{ $room->price }} </td>
									<td>{{ $room->numberOfPeople }} </td>
									<td>{{ $room->created_at }} </td>
									<th scope="row"><a href="/room/{{$room->id}}">@lang('text.MoreInfo')</a></th>
								</tr>
							@endforeach
					</tbody>
				</table>
			@else
				<h4 class='bg-info' style="text-align: center; padding: 10px">There is no registered room</h4>
			@endif

		</div>
		
		<div class="col-lg-11 offset-lg-1">
			<h1 class="text-center">@lang('text.Food Menu')</h1>
			<table class="table table-striped table-bordered">
				<thead class="thead-light">
					<tr>
						<th scope="col">@lang('text.Number')</th>
						<th scope="col">@lang('text.Name')</th>
						<th scope="col">@lang('text.Type')</th>
						<th scope="col">@lang('text.Price')</th>
						<th scope="col">@lang('text.Created at')</th>
						<th scope="col">@lang('text.MoreInfo')</th>
					</tr>
				</thead>
				<tbody>
					<?php $counter = 1; ?>
					@if(count($foods) > 0)
						@foreach ($foods as $food)
							<tr>
								<th scope="row">{{ $counter, $counter++}}</th>
								<td>{{ $food->foodName }}</td>
								<td>
									@if ($food->food_drink === "Drinkings")
										@lang('text.Drinkings')
									@else
										@lang('text.Foods')
									@endif
								</td>
								<td>{{ $food->foodPrice }} </td>
								<td>{{ $food->created_at }} </td>
								<th scope="row"><a href="/foodMenu/{{$food->id}}">@lang('text.MoreInfo')</a></th>
							</tr>
						@endforeach
					@else
						<p>@lang('text.TableText')</p>
					@endif
				</tbody>
			</table>
		</div>

		<div class="col-lg-11 offset-lg-1">
			<h1 class="text-center">@lang('text.Booked Rooms')</h1>
			<table class="table table-striped table-bordered">
				<thead class="thead-light">
					<tr>
						<th scope="col">@lang('text.Number')</th>
						<th scope="col">@lang('text.Name')</th>
						<th scope="col">@lang('text.Room Price')</th>
						<th scope="col">@lang('text.Paid cash')</th>
						<th scope="col">@lang('text.Remained cash')</th>
						<th scope="col">@lang('text.Start date')</th>
						<th scope="col">@lang('text.End date')</th>
					</tr>
				</thead>
				<tbody>
					<?php $counter = 1; ?>
					@if(count($roomBooking) > 0)
						@foreach ($roomBooking as $booked)
							<tr>
								<th scope="row">{{ $counter++}}</th>
								<td>{{ $booked->customers->name }}</td>
								<td> {{ $booked->rooms->price }} </td>
								<td>{{ $booked->payment }} </td>
								<td>{{ $booked->rooms->price - $booked->payment  }} </td>
								<td>{{ $booked->startDate }}</td>
								<td>{{ $booked->endDate }}</td>
							</tr>
						@endforeach
					@else
						<p>@lang('text.TableText')</p>
					@endif
				</tbody>
			</table>
		</div>

		<div class="col-lg-11 offset-lg-1">
			<h1 class="text-center">@lang('text.Customers')</h1>
			<table class="table table-striped table-bordered">
				<thead class="thead-light">
					<tr>
						<th scope="col">@lang('text.Number')</th>
						<th scope="col">@lang('text.Name')</th>
						<th scope="col">@lang('text.Last Name')</th>
						<th scope="col">@lang('text.Email')</th>
						<th scope="col">@lang('text.Phone number')</th>
						<th scope="col">@lang('text.AddedOn')</th>
					</tr>
				</thead>
				<tbody>
					<?php $counter = 1; ?>
					@if(count($customers) > 0)
						@foreach ($customers as $customer)
							<tr>
								<th scope="row">{{ $counter++}}</th>
								<td>{{$customer->name}}</td>
								<td>{{$customer->lastName}}</td>
								<td>{{$customer->email}}</td>
								<td>{{$customer->phoneNumber}}</td>
								<td>{{ $customer->created_at }}</td>
							</tr>
						@endforeach
					@else
						<p>@lang('text.TableText')</p>
					@endif
				</tbody>
			</table>
		</div>

		<div class="col-lg-11 offset-lg-1">
			<h1 class="text-center">@lang('text.Ordered food')</h1>
			<table class="table" style="border-radius: 20px">
				<thead class="table-dark">
					<tr class="text-light">
						<th scope="col">@lang('text.Number')</th>
						<th scope="col">@lang('text.Food')</th>
						<th scope="col">@lang('text.Time')</th>
						<th scope="col">@lang('text.Quantity')</th>
						<th scope="col">@lang('text.Price')</th>
						<th scope="col">@lang('text.Total price')</th>
						<th scope="col">@lang('text.Created at')</th>
					</tr>
				</thead>
				<tbody>
					@php $counter = 1; @endphp
					@foreach ($bookedFoods as $bookedFood)
						<tr class="table-secondary text-dark">
							<th scope="col">{{$counter++}}</th>
							<th>{{$bookedFood->foodmenu->foodName}}</th>
							<th>
								@php
									if( $bookedFood->time === 'morning'){
										echo __('text.Morning');
									}elseif ($bookedFood->time === 'lunch') {
										echo __('text.Lunch');
									}elseif ($bookedFood->time === 'afternoon') {
										echo __('text.Afternoon');
									}else {
										echo __('text.Dinner');
									}
									
								@endphp
							</th>
							<th>{{$bookedFood->quantity}}</th>
							<th>{{($bookedFood->foodmenu->foodPrice) }}</th>
							<th>{{($bookedFood->totalPrice)}}</th>
							<th>{{($bookedFood->created_at)}}</th>
							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>
@endsection
				