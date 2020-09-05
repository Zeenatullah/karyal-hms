@extends('dashboard.inc.layout')
@section('content')

{{-- Sidebar start --}}
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="height: 540px">
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
	<div class="col-sm-9  col-lg-10 {{ App::getLocale() !== "ps" ? 'col-sm-offset-3 col-lg-offset-2' : '' }} main" id="ps_main">
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
		</div>

    	<br><br>
		<div class="container col-lg-10 col-lg-offset-1 bg-primary users-frm" style="background-color: #aabbde; border-radius: 10px; padding: 15px">
			<div class="row">
				<div class="col-lg-10">
					<h3>@lang('text.UserInfoText')</h3>
				</div>
				<div class="col-lg-10 col-sm-12 col-lg-offset-1">
					<h3>@lang('text.Name'): {{$post->name}}</h3>   
					<h3>@lang('text.Email'): {{$post->email}}</h3>   
					<h3>@lang('text.Position'): {{$post->user_type}}</h3>   
					<small>@lang('text.Hired on'): {{ $post->created_at }} </small>
				</div>
			</div>

			<div class="col-lg-offset-3">
				<a href="/dboard/users" class="btn btn-primary col-lg-2 col-lg-offset-2">@lang('text.Go back')</a>
				<div class="col-lg-2 col-lg-offset-3">
					{!! Form::open(['action' => ['ReceptionistController@destroy', $post->id], 'method' => 'POST'])!!}
					{{Form::hidden('_method', 'DELETE')}}
					{{Form::submit(__('text.Delete'), ['class' => 'btn btn-danger col-lg-12'])}}
					{!! Form::close() !!}
				</div>
			</div>
			<br>
		</div>
	</div>
@endsection