@extends('dashboard.inc.edit')
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
			<li class="active"><a href="/dboard/rooms"><em class="fa fa-toggle-off">&nbsp;</em> @lang('text.Rooms')</a></li>
			<li><a href="/dboard/foods"><em class="fa fa-clone">&nbsp;</em> @lang('text.Food Menu')</a></li>
			<li class="nav-item dropdown">
			<li><a href="/dboard/feedback"><em class="fa fa-address-book">&nbsp;</em> @lang('text.Feedback')</a></li>
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
	<div style="margin-bottom: 100px" class="col-sm-9 col-lg-10 {{ App::getLocale() !== "ps" ? 'col-sm-offset-3 col-lg-offset-2' : '' }} main" id="ps_main">

        <div class="row">
            <h1 class="col-lg-12">@lang('text.HeadTextRoom')</h1>   
            <hr>
            <div class="container users-frm">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <br>
                            <div class="row" style="border-radius: 10px; background-color: #42465cfa; color: white; padding: 0px 20px">
                                <div class=" col-sm-1  col-lg-12 ">

                                    <h3 style="color: white">@lang('text.PreviousValues')</h3>
                                    <div class="row col-lg-offset-1">
                                        <div class="col-lg-1 col-sm-1"></div>
                                        <div class="">
                                            <div class="h4">@lang('text.Rooms') @lang('text.ID'): {{$rooms->id}}</div>
                                        </div>
                                        <div class="col-lg-1 col-sm-1"></div>
                                        
                                        {{-- Wifi --}}
                                        <div class="col-md-2 col-sm-2">
                                            @if ($rooms->wifi)
                                                <div class="h4">@lang('text.Wifi'): @lang('text.Yes')</div>
                                            @else
                                                <div class="h4">@lang('text.Wifi'): @lang('text.No')</div>
                                            @endif
                                        </div>
                                        
                                      {{-- AC --}}
                                        <div class="col-md-2 col-sm-2">
                                            @if ($rooms->ac)
                                                <div class="h4">@lang('text.AC'): @lang('text.Yes')</div>
                                            @else
                                                <div class="h4">@lang('text.AC'): @lang('text.No')</div>
                                            @endif
                                        </div>
                                        
                                        {{-- TV --}}
                                        <div class="col-md-2 col-sm-2">
                                            @if ($rooms->tv)
                                                <div class="h4">@lang('text.Television'): @lang('text.Yes')</div>
                                            @else
                                                <div class="h4">@lang('text.Television'): @lang('text.No')</div>
                                            @endif
                                        </div>
    
                                        {{-- Taken --}}
                                        <div class="col-md-2 col-sm-2">
                                            @if ($rooms->taken)
                                                {{-- <div class="h4">@lang('text.Taken'): @lang('text.Yes')</div> --}}
                                            @else
                                                <div class="h4">@lang('text.Taken'): @lang('text.No')</div>
                                            @endif
                                        
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div> 
                            <br><br>
                            <div class="row" style="border-radius: 10px; background-color: #42465cfa; color: white;">   
                                <div class="row">
                                    <div style="margin: 0px 60px">
                                        <h3 style="color: white">@lang('text.UpdateInfo')</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"><h3></h3></div>
                                    <div class="col-lg-10 offset-lg-1">
                                        {!! Form::open(['action' => ['RoomsController@update', $rooms->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                                            <br>
                                            <div class="row ">
                                                <div class="col-lg-4" >
                                                    <label for="wifi">@lang('text.Wifi')</label>
                                                    <div class="col-lg-offset-1">
                                                        @lang('text.Yes'): &nbsp;{{ Form::radio('wifi', '1')}}
                                                        <span class="col-lg-offset-1"></span>
                                                        @lang('text.No'): &nbsp;{{ Form::radio('wifi', '0')}}
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-3"></div>
                                                <div class="form-group col-lg-4" >
                                                    <label for="a/c">@lang('text.AC')</label>
                                                    <div class="col-lg-offset-1">
                                                        @lang('text.Yes'): &nbsp;{{ Form::radio('a/c', '1')}}
                                                        <span class="col-lg-offset-1"></span>
                                                        @lang('text.No'): &nbsp;{{ Form::radio('a/c', '0')}}
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            
                                            <div class="row">
                                                <div class="form-group col-lg-4" >
                                                    <label for="tv">@lang('text.Television')</label>
                                                    <div class="col-lg-offset-1">
                                                        @lang('text.Yes'): &nbsp;{{ Form::radio('tv', '1')}}
                                                        <span class="col-lg-offset-1"></span>
                                                        @lang('text.No'): &nbsp;{{ Form::radio('tv', '0')}}
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-3"></div>
                                                <div class="form-group col-lg-4" >
                                                    <label for="taken">@lang('text.Taken')</label>
                                                    <div class="col-lg-offset-1">
                                                        @lang('text.Yes'): &nbsp;{{ Form::radio('taken', '1')}}
                                                        <span class="col-lg-offset-1"></span>
                                                        @lang('text.No'): &nbsp;{{ Form::radio('taken', '0')}}
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <hr>

                                            <div class="row">
                                                <div style="padding-top: 40px;" class="col-lg-2">{{Form::file('file[]', ['multiple'])}}</div>
                                                <div class="form-group col-lg-3 col-lg-offset-1" >
                                                    <label for="price">@lang('text.Price')</label>
                                                    {{ Form::text('price', $rooms->price, ['class' => 'form-control', 'placeholder' =>'$'])}}
                                                </div>
                                                <div class="form-group col-lg-1"></div>
                                                <div class="form-group col-lg-3" >
                                                    <label for="numberOfPeople">@lang('text.NumberOfPeople')</label>
                                                    {{ Form::number('numberOfPeople', $rooms->numberOfPeople, ['class' => 'form-control' , 'placeholder' =>'Number of people', 'max'=>'6'])}}
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                {{Form::submit(__('text.Submit'), ['class' =>'btn btn-info col-md-2'])}}
                                                <div class="col-md-4"></div>
                                                <a href="/dboard/rooms" class="btn btn-primary col-md-2">@lang('text.Go back')</a>
                                            </div>
                                            {{Form::hidden('_method', 'PUT')}}

                                        {!! Form::close() !!}
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection