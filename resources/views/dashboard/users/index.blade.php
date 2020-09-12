@extends('dashboard.inc.layout')
@section('content')

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

		<ul class="nav menu">
			<li><a href="/dboard"><em class="fa fa-dashboard" style="">&nbsp;</em> @lang('text.Home')</a></li>
			<li class="active"><a href="/dboard/users"><em class="fa fa-user">&nbsp;</em> @lang('text.Users')</a></li>
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
{{-- Top section in main --}}
	<div class="col-sm-9  col-lg-10 {{ App::getLocale() !== "ps" ? 'col-sm-offset-3 col-lg-offset-2' : '' }} main" style="background-color: " id="ps_main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-users"></em>
				</a></li>
				<li class="active">@lang('text.Users')</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@lang('text.Users')</h1>
			</div>
			<div class="col-lg-1"></div>			
			<div class="col-lg-10">
				<h3>@lang('text.AddUserText')</h3>
			</div>
			<br>
		</div>
		<br><br>
{{-- Top section in main End here --}}

{{-- Form section start here --}}
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10" style="background-color: #42465cfa; color: white; padding: 30px; border-radius: 10px">

			<div class="col-lg-1"></div>
			<div class="col-lg-10" >
				{!! Form::open(['action' => 'ReceptionistController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
				<div class="form-group col-lg-5">
					<label for="name" style="padding: 0 15px; font-size: 1.1em">@lang('text.Name')</label>
					<input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" required>
				</div>
				<div class="col-lg-1"></div>
				<div class="form-group col-lg-5">
					<label for="email" style="padding: 0 15px; font-size: 1.1em">@lang('text.Email')</label>
					<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
				</div>
				<br>
				<div class="form-group col-lg-5">
					<label for="password" style="padding: 0 15px; font-size: 1.1em">@lang('text.UserType')</label>  
					<select  id="user_type"  class="form-control"  name="user_type" required style="height: 45px">
						<option selected disabled>@lang('text.SelectOne')</option>
						<option value="Admin">Admin</option>
						<option value="Receptionist">Receptionist</option>
					  </select>
				</div>
				<div class="col-lg-1"></div>
				<div class="form-group col-lg-5">
					<label for="exampleInputEmail1" style="padding: 0 15px; font-size: 1.1em">@lang('text.Password')</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
				</div>
				
				<div class="col-lg-8"></div>
				<div class="form-group col-lg-2">
					<button type="submit" class="btn btn-primary" style="width: 130px; margin: 10px 40px">@lang('text.Submit')</button>
				</div>
				{!! Form::close() !!}  
			</div>
		</div>
	</div>
		<br><br><br>
		<div class="row">
			<section class="container">
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
							{{ $users->links() }}
						@else
							<p>There is no Receptionist</p>
						@endif
					</tbody>
				</table>
			</section>
		</div>
@endsection
