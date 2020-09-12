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
		
	<div class="col-sm-9 col-lg-10 col-lg-offset-1{{ App::getLocale() !== "ps" ? 'col-sm-offset-3 col-lg-offset-2' : '' }} main" id="ps_main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">@lang('text.Food Menu')</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-12">
				<h1 class="page-header">@lang('text.Food Menu')</h1>
			</div>
		</div>

		<!-- Contact Section Begin -->
		<div class="row users-frm col-lg-10 col-lg-offset-1" style="border-radius: 50px;background-color: #42465cfa; color: white; padding-bottom: 20px">
			<div class="col-lg-2"></div>
			<div class="col-lg-7">
				<h3 style="color:white;">@lang('text.HeadText')</h3>
				{!! Form::open(['action' => 'FoodmenuController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
					<br>
					<label style="margin: 10 20px" for="food_drink">@lang('text.SelectOne')</label>
					<div class="row">
						<div class="form-group col-lg-12">
							<select class="form-control" name="food_drink" required id="food_drink" style="height: 45px">
									<option selected disabled >@lang('text.Choose one')</option>
									<option value="Drinkings">@lang('text.Drinkings')</option>
									<option value="Food">@lang('text.Foods')</option>
							</select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="form-input col-lg-5">
							<label style="margin: 10px" for="foodName">@lang('text.Name')</label>
							<input type="text" name="foodName" class="form-control" placeholder="@lang('text.Name')" id="foodName">
						</div>
						<div class="form-input col-lg-2"></div>
						<div class="form-input col-lg-5">
							<label style="margin: 10px" for="foodPrice">@lang('text.Price')</label>
							<input type="text" name="foodPrice" class="form-control" placeholder="@lang('text.Price')" id="foodPrice">
						</div>
					</div>
					<br>
					<div class="form-group">
						{{Form::file('foodImage')}}
					</div>
					<br>
					<input type="submit" value="@lang('text.Submit')" class="btn btn-primary col-lg-2">
				{!! Form::close() !!}  
			</div> 
		</div>

		{{-- table section --}}
		<div class="row users-frm col-lg-10 col-lg-offset-1" style="margin-top: 80px">
			<section class="container users-frm">
				<table class="table table-striped table-bordered col-lg-10">
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
							{{ $foods->links() }}
						@else
							<p>@lang('text.TableText')</p>
						@endif
					</tbody>
				</table>
			</section>
			<br>
		</div>
		{{-- Footer Section --}}
	</div>	
@endsection
