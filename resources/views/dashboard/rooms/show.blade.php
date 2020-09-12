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
    {{-- Top section in main --}}
	<div style="margin-bottom: 100px" class="col-sm-9  col-lg-10 {{ App::getLocale() !== "ps" ? 'col-sm-offset-3 col-lg-offset-2' : '' }} main " id="ps_main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-users"></em>
				</a></li>
				<li class="active">@lang('text.Rooms')</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@lang('text.Rooms')</h1>
            </div>
            <div class="col-lg-10 col-lg-offset-1">
                <h3>@lang('text.ShowRoomText')</h3>
                <hr>
            </div>
		</div>
        {{-- Top section in main End here --}}
        <div class="users-frm col-lg-5" style="background-color: #42465cfa; color: white; border-radius: 10px; padding: 0px 25px;" >
            <table>
                <thead>
                    <tr>
                        <th style="width: 230px"><h3 style="color: white;">@lang('text.ID')</h3></th>
                        <th style="width: 300px"><h3 style="color: white;">{{$rooms->id}}</h3></th>
                    </tr>
                    <tr>
                        <th><h3 style="color: white;">@lang('text.Price')</h3></th>
                        <th><h3 style="color: white;">{{$rooms->price}}</h3></th>
                    </tr>
                    <tr>
                        <th><h3 style="color: white;">@lang('text.Wifi')</h3></th>
                        <th><h3 style="color: white;">
                            @if ($rooms->wifi)
                                <h3 style="color: white;">@lang('text.Yes')</h3>
                            @else
                                @lang('text.No')
                            @endif    
                        </h3></th>
                    </tr>
                    <tr>
                        <th><h3 style="color: white;">@lang('text.AC')</h3></th>
                        <th><h3 style="color: white;">
                            @if ($rooms->ac)
                                <h3 style="color: white;">@lang('text.Yes')</h3>

                            @else
                                @lang('text.No')
                            @endif
                        </h3></th>
                    </tr>
                    <tr>
                        <th><h3 style="color: white;">@lang('text.Television')</h3></th>
                        <th><h3 style="color: white;">
                            @if ($rooms->tv)
                                <h3 style="color: white;">@lang('text.Yes')</h3>

                            @else
                                @lang('text.No')
                            @endif    
                        </h3></th>
                    </tr>
                    <tr>
                        <th><h3 style="color: white;">@lang('text.Taken')</h3></th>
                        <th><h3 style="color: white;">
                            @if ($rooms->taken)
                                <h3 style="color: white;">@lang('text.Yes')</h3>
                            @else
                               <h3 style="color: white;">@lang('text.No')</h3>
                            @endif
                        </h3></th>
                    </tr>
                    <tr>
                        <th><h3 style="color: white;">@lang('text.NumberOfPeople')</h3></th>
                        <th><h3 style="color: white;">{{$rooms->numberOfPeople}}</h3></th>
                    </tr>
                    <tr>
                        <th><small>@lang('text.Created at')</small></th>
                        <th><small>{{ $rooms->created_at }}</small></th>
                    </tr>
                </thead>
                <tfoot style="margin-top: 20px">
                    <tr style="height: 20px"></tr>
                    <tr>
                        <td >
                            <a href="/room/{{$rooms->id}}/edit" class="btn btn-info col-lg-4 col-lg-offset-4">@lang('text.Edit')</a>
                        </td>
                        <td>
                            <a href="/dboard/rooms" class="btn btn-primary col-lg-5" >@lang('text.Go back')</a>
                            {!! Form::open(['action' => ['RoomsController@destroy', $rooms->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit(__('text.Delete'), ['class' => 'btn btn-danger col-lg-4 col-lg-offset-1'])}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    <tr style="height: 20px"></tr>

                </tfoot>
            </table>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-lg-7 col-lg-offset-0 main" >
            <div class="">
                @foreach ($images as $image)
                    <img src="/storage/room_images/{{$image->imageName}}" alt="Room images" width="100%">
                @endforeach
            <div>
            <div>
                {{ $images->links()}}
            </div>
        </div>
    </div>
@endsection