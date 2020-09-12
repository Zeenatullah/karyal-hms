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
			<li><a href="/dboard"><em class="fa fa-dashboard">&nbsp;</em> @lang('text.Home')</a></li>
			<li><a href="/dboard/users"><em class="fa fa-user">&nbsp;</em> @lang('text.Users')</a></li>
			<li><a href="/dboard/employees"><em class="fa fa-users">&nbsp;</em> @lang('text.Employees')</a></li>
			<li><a href="/dboard/rooms"><em class="fa fa-toggle-off">&nbsp;</em> @lang('text.Rooms')</a></li>
			<li class="active"><a href="/dboard/foods"><em class="fa fa-clone">&nbsp;</em> @lang('text.Food Menu')</a></li>
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

	<div class="col-sm-9  col-lg-10 {{ App::getLocale() !== "ps" ? 'col-sm-offset-3 col-lg-offset-2' : '' }} main" id="ps_main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-users"></em>
				</a></li>
				<li class="active">@lang('text.Food Menu')</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@lang('text.Food Menu')</h1>
			</div>
			<div class="col-lg-10 col-lg-offset-1">
				<h3>@lang('text.showFoodInfo')</h3>
			</div>

		</div>
        <div class="col-lg-4 col-lg-offset-1 users-frm">
            <div class="row">
				<div class="users-frm" style="background-color: #42465cfa; color: white; border-radius: 10px; padding: 0px 25px;">
					<table>
						<thead>
							<tr>
								<th style="width: 230px"><h3 style="color: white">@lang('text.Name')</h3></th>
								<th style="width: 300px"><h3 style="color: white">{{ $foodMenu->foodName }}</h3></th>
							</tr>
							<tr>
								<th style="width: 230px"><h3 style="color: white">@lang('text.Price')</h3></th>
								<th style="width: 300px"><h3 style="color: white">{{ $foodMenu->foodPrice }}</h3></th>
							</tr>
							<tr>
								<th style="width: 230px"><small>@lang('text.Hired on') </small></th>
								<th style="width: 300px"><small>{{ $foodMenu->created_at }}</small></th>
							</tr>
						</thead>
						<tfoot>
							<tr style="height: 40px"></tr>
							<tr>
								<td><a href="/foodMenu/{{$foodMenu->id}}/edit" class="btn btn-info col-lg-5 col-lg-offset-5">@lang('text.Edit')</a></td>
								<td>
									<a href="/dboard/foods" class="btn btn-primary col-lg-5">@lang('text.Go back')</a>
									<div>
										{!! Form::open(['action' => ['FoodmenuController@destroy', $foodMenu->id], 'method' => 'POST'])!!}
										{{Form::hidden('_method', 'DELETE')}}
										{{Form::submit(__('text.Delete'), ['class' => 'btn btn-danger col-lg-5 col-lg-offset-1'])}}
										{!! Form::close() !!}
									</div>
								</td>
							</tr>
							<tr style="height: 20px"></tr>
						</tfoot>
					</table>
				</div>
            </div>
            <div class="row">
				<div>
				</div>
            </div>
		</div>
		<div class="col-lg-7">
			<div style="width: 600px">
				<img src="/storage/food_images/{{$foodMenu->foodImage}}" width="100%">
			</div>

		</div>
    </div>
@endsection