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
			<li><a href="/dboard/employees"><em class="fa fa-users">&nbsp;</em> @lang('text.Employees')</a></li>
			<li class="active"><a href="/dboard/rooms"><em class="fa fa-toggle-off">&nbsp;</em> @lang('text.Rooms')</a></li>
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
		
	<div class="col-sm-9 col-lg-10 {{ App::getLocale() !== "ps" ? 'col-sm-offset-3 col-lg-offset-2' : '' }} main " id="ps_main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">@lang('text.Rooms')</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@lang('text.Rooms')</h1>
			</div>
		</div>
	
		<div class="row users-frm col-lg-10 col-lg-offset-1" style="border-radius: 20px;background-color: #002bff30;">
			<section class="container row">
				<div class="col-lg-10">
					<h3>@lang('text.AdminRoomText')</h3>
					<hr>
				</div>
				<div class="col-lg-10" style="padding-left: ;">
					{!! Form::open(['action' => 'RoomsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
						<div class="row">
							<div class="col-lg-4" >
								<Label for="wifi">@lang('text.Wifi')</Label>
								<div class="row">
									<div class="col-lg-2"></div>
									<div>
										@lang('text.Yes'): &nbsp;{{ Form::radio('wifi', '1')}}
										<span style="margin: 15px"></span>
										@lang('text.No'): &nbsp;{{ Form::radio('wifi', '0')}}
									</div>
								</div>
							</div>
							<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-4" >
								<Label for="ac">@lang('text.AC')</Label>
								<div class="row">
									<div class="col-lg-2"></div>
									<div>
										@lang('text.Yes'): &nbsp;{{ Form::radio('ac', '1')}}
										<span style="margin: 15px"></span>
										@lang('text.No'): &nbsp;{{ Form::radio('ac', '0') }}
									</div>
								</div>
							</div>
						</div>
						<hr>
						
						<div class="row">
							<div class="form-group col-lg-4" >
								<Label for="wifi">@lang('text.Television')</Label>
								<div class="row">
									<div class="col-lg-2"></div>
									<div>
										@lang('text.Yes'):&nbsp;{{ Form::radio('tv', '1')}}
										<span style="margin: 15px"></span>
										@lang('text.No'): &nbsp;{{ Form::radio('tv', '0')}}
									</div>
								</div>
							</div>
							<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-4" >
								<Label for="wifi">@lang('text.Taken')</Label>
								<div class="row">
									<div class="col-lg-2"></div>
									<div>
										@lang('text.Yes'): &nbsp;{{ Form::radio('taken', '1')}}
										<span style="margin: 15px"></span>
										@lang('text.No'): &nbsp;{{ Form::radio('taken', '0')}}
									</div>
								</div>
							</div>
						</div>
						<br><br><br><br>
						<div class="row">
							<div class="form-group col-md-4" >
								<label for="price">@lang('text.Price')</label>
								{{ Form::text('price', '', ['class' => 'form-control', 'placeholder' =>'$'])}}
							</div>
							<div class="form-group col-lg-1"></div>
							<div class="form-group col-lg-4 col-md-4" >
								<label for="numberOfPeople">@lang('text.NumberOfPeople')</label>
								<input type="number" class="form-control" id='numberOfPeople' name="numberOfPeople">
								{{-- {{ Form::number('numberOfPeople', '', ['class' => 'form-control' , 'placeholder' =>, 'max'=>'6'])}} --}}
							</div>
						</div>
						<br>
						<div class="form-group">
							{{Form::file('file[]', ['multiple'])}}
						</div>
						<span style=" margin-right: 55px" >
							<input type="submit" class="btn btn-primary col-lg-2 pull-right" name="Submite" value="@lang('text.Submit')">
						</span>
					{!! Form::close() !!}  
				</div>
			</section>
			<br><br>
		</div>
		<div class="row">
			<section class="container users-frm">
				<div class="col-lg-10 col-lg-offset-1" style="margin-top: 70px;">
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
									@foreach ($rooms as $room)
										<tr>
											<th scope="row">{{$room->id}}</th>
											<td>{{ $room->price }} </td>
											<td>{{ $room->numberOfPeople }} </td>
											<td>{{ $room->created_at }} </td>
											<th scope="row"><a href="/room/{{$room->id}}">@lang('text.MoreInfo')</a></th>
										</tr>
									@endforeach
									{{ $rooms->links() }}
							</tbody>
						</table>
					@else
						<h4 class='bg-info' style="text-align: center; padding: 10px">There is no registered room</h4>
					@endif
				</div>
			</section>
		</div>
	</div>	
@endsection
