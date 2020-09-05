@extends('dashboard.inc.layout')
@section('content')

{{-- Sidebar start --}}
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<ul class="nav menu">
			<li><a href="/dboard"><em class="fa fa-dashboard">&nbsp;</em> @lang('text.Home')</a></li>
			<li><a href="/dboard/users"><em class="fa fa-user">&nbsp;</em> @lang('text.Users')</a></li>
			<li class="active"><a href="/dboard/employees"><em class="fa fa-users">&nbsp;</em> @lang('text.Employees')</a></li>
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
					<em class="fa fa-users"></em>
				</a></li>
				<li class="active">@lang('text.Employees')</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@lang('text.Employees')</h1>
			</div>
		</div>
				
		<div class="row">
			<section class="contact-section spad users-frm">
				<div class="container">   
					<div class="row" style="border-radius: 50px;background-color: #002bff30;">
						<div class="col-lg-2"></div>
						<div class="col-lg-10">
							<h3>@lang('text.AddEmployeeText')</h3>
						</div>
						<br>
						<div class="col-lg-2"></div>
						<div class="col-lg-8 offset-lg-1">
							{!! Form::open(['action' => 'EmployeeController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
								<br>
								<div class="row">
									<div class="form-group col-lg-5">
										<label for="name">@lang('text.Name')</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="@lang('text.Name')">
										{{-- {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' =>'Employee Name'])}} --}}
									</div>
									<div class="form-group col-lg-2"></div>
									<div class="form-group col-lg-5">
										<label for="lastName">@lang('text.Last Name')</label>
										<input type="text" name="lastName" id="lastName" class="form-control" placeholder="@lang('text.Last Name')">
									</div>
								</div>
								<br>
								<div class="row">
									<div class="form-group col-lg-5">
										<label for="phoneNo">@lang('text.Phone number')</label>
										<input type="text" name="phoneNo" id="phoneNo" class="form-control" placeholder="@lang('text.Phone number')">
									</div>
									<div class="form-group col-lg-2"></div>
									<div class="form-group col-lg-5">
										<label for="salary">@lang('text.Salary')</label>
										<input type="text" name="salary" id="salary" class="form-control" placeholder="@lang('text.Salary')">
									</div>
								</div>
								<br>
								<div class="row">
									<div class="form-group col-lg-5">
										<label for="employee_type">@lang('text.Position')</label>
										<br>
										<select class="custom-select" id="employee_type"  class="form-control @error('employee_type') is-invalid @enderror" name="employee_type" value="{{ old('employee_type') }}" required autocomplete="employee_type" style="width: 180px; height:30px; border-radius: 5px; padding-left: 10px">
											<option selected disabled hidden>@lang('text.SelectOne')</option>
											<option value="Moderator">Moderator</option>
											<option value="Receptionist">Receptionist</option>
											<option value="Cleaner">Cleaner</option>
											<option value="Cook">Cook</option>
											<option value="Food transporter">Food transporter</option>
										</select>
									</div>
									<div class="form-group col-lg-2"></div>
									<div class="form-group col-lg-5">
										<label for="tazkira">@lang('text.Tazkira')</label>
										{{Form::file('tazkira', ['multiple'])}}
									</div>
								</div>
								<br>
								{{Form::submit(__('text.Submit'), ['class' =>'btn btn-primary'])}}
								<br><br>
							{!! Form::close() !!}  
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="container col-lg-offset-1 col-lg-10 users-frm" style="margin-top: 50px;" id="">
			<section >
				<table class="table table-striped table-bordered">
					<thead class="thead-light">
						<tr>
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
							{{ $employees->links() }}
						@else
							<p>There is no Receptionist</p>
						@endif
					</tbody>
				</table>
			</section>
		</div>
	</div>

@endsection
