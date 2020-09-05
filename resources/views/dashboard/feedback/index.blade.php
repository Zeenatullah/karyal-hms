@extends('dashboard.inc.layout')
@section('content')
{{-- Sidebar start --}}
	<div class="container-fluid">
		<div class="row">
			<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar pull-right">
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
				<ul class="nav menu">
					<li><a href="/dboard"><em class="fa fa-dashboard">&nbsp;</em> @lang('text.Home')</a></li>
					<li><a href="/dboard/users"><em class="fa fa-user">&nbsp;</em> @lang('text.Users')</a></li>
					<li><a href="/dboard/employees"><em class="fa fa-users">&nbsp;</em> @lang('text.Employees')</a></li>
					<li><a href="/dboard/rooms"><em class="fa fa-toggle-off">&nbsp;</em> @lang('text.Rooms')</a></li>
					<li><a href="/dboard/foods"><em class="fa fa-clone">&nbsp;</em> @lang('text.Food Menu')</a></li>
					<li class="active"><a href="/dboard/feedback"><em class="fa fa-address-book">&nbsp;</em> @lang('text.Feedback')</a></li>
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
						<li class="active">@lang('text.Feedback')</li>
					</ol>
				</div>
				<div class="row">
					<div class=""></div>
					<div class="col-lg-10">
						<h1 class="page-header">@lang('text.Feedback')</h1>
					</div>
				</div>
				<div class="row">
					<section class="contact-section spad">
						<div class="container">   
							<div class="row">
								<div class="col-lg-2">
								</div>
								<div class="col-lg-7 offset-lg-1">
									
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1"  style="margin-bottom: 10px">
						<h3>@lang('text.NewFeedback')</h3>
					</div>
					<section class="container-fluid users-frm">
							<table class="table table-striped table-bordered ">
								<thead>
									<tr class="d-flex">
										<th style="width: 2%">@lang('text.Number')</th>
										<th style="width: 5%">@lang('text.Name')</th>
										<th style="width: 5%">@lang('text.Last Name')</th>
										<th style="width: 5%">@lang('text.Email')</th>
										<th style="width: 5%">@lang('text.Phone number')</th>
										<th style="width: 8%">@lang('text.Date')</th>
										<th style="width: 30%">@lang('text.Message')</th>
									</tr>
								</thead>
								<tbody>
									<?php $counter = 1; $showing = 0;?>
									@if(count($feedbacks) > 0)
										@foreach ($feedbacks as $feedback)
											@if ($feedback->show == 1)
											@php
												$showing = 1
											@endphp
												<tr>
													<th scope="row">{{ $counter, $counter++}}</th>
													<td>{{ $feedback->name }}</td>
													<td>{{ $feedback->lastName }}</td>
													<td>{{ $feedback->email }} </td>
													<td>{{ $feedback->phoneNumber }} </td>
													<td>{{ $feedback->created_at }} </td>
													<td>{{ $feedback->message }}
														<br><br>
														{!! Form::open(['action' => ['ContactController@update', $feedback->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
															{{Form::submit(__('text.Submit'), ['class' =>'btn btn-info col-md-2'])}}
															{{Form::hidden('_method', 'PUT')}}
														{!! Form::close() !!}
													</td>
												</tr>
											@endif
										@endforeach
										{{ $feedbacks->links() }}
									@else
										<p>@lang('text.TableText')</p>
									@endif
								</tbody>
								<tfoot>
									@if ($showing == 0)
										<tr>
											<td colspan="7">
												<p class="text-center alert " style="color: white;background-color: #896c00;border-color: #bce8f1;">@lang('text.No new feedback')</p>
											</td>
										</tr>
									@endif
								</tfoot>
							</table>
					</section>
					<br>
				</div>
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1"  style="margin-bottom: 10px">
						<h3>@lang('text.AllFeedback')</h3>
					</div>
					<section class="container-fluid users-frm">
							<table class="table table-striped table-bordered ">
								<thead>
									<tr class="d-flex">
										<th style="width: 2%">@lang('text.Number')</th>
										<th style="width: 5%">@lang('text.Name')</th>
										<th style="width: 5%">@lang('text.Last Name')</th>
										<th style="width: 5%">@lang('text.Email')</th>
										<th style="width: 5%">@lang('text.Phone number')</th>
										<th style="width: 8%">@lang('text.Date')</th>
										<th style="width: 30%">@lang('text.Message')</th>
									</tr>
								</thead>
								<tbody>
									<?php $counter = 1; $showing = 0;?>
									@if(count($feedbacks) > 0)
										@foreach ($feedbacks as $feedback)
											@if ($feedback->show == 0)
												@php
													$showing = 1
												@endphp
												<tr>
													<th scope="row">{{ $counter, $counter++}}</th>
													<td>{{ $feedback->name }}</td>
													<td>{{ $feedback->lastName }}</td>
													<td>{{ $feedback->email }} </td>
													<td>{{ $feedback->phoneNumber }} </td>
													<td>{{ $feedback->created_at }} </td>
													<td>{{ $feedback->message }}</td>
												</tr>
											@endif
										@endforeach
										{{ $feedbacks->links() }}
									@else
										<p>@lang('text.TableText')</p>
									@endif
								</tbody>
								<tfoot>
									@if ($showing == 0)
										<tr>
											<td colspan="7">
												<p class="text-center alert " style="color: white;background-color: #896c00;border-color: #bce8f1;">@lang('text.No feedback')</p>
											</td>
										</tr>
									@endif
								</tfoot>
							</table>
					</section>
					<br>
				</div>
			</div>
		</div>
	</div>
@endsection
