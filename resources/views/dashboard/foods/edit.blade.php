    @extends('dashboard.inc.edit')
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
{{-- Top section in main --}}
	<div class="col-sm-9 col-lg-10 {{ App::getLocale() !== "ps" ? 'col-sm-offset-3 col-lg-offset-2' : '' }} main" id="ps_main">
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
				<h3>@lang('text.EditFoodInfo')</h3>
			</div>
		</div>
        {{-- Top section in main End here --}}
        <div class="container users-frm" style="border-radius: 50px;background-color: #002bff30; padding: 20px">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="container">   
                            <div class="row">
                                <div class="col-lg-2"><h4></h4></div>
                                <div class="col-lg-7 offset-lg-1">
                                    {!! Form::open(['action' => ['FoodmenuController@update', $foods->id], 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
                                        <div class="row">
                                            <label>
                                                @if ($foods->food_drink === "Drinkings")
                                                    @lang('text.Drinkings')
                                                @else
                                                    @lang('text.Foods')
                                                @endif
                                             </label>
                                            <div class="dropdown col-lg-12 input-group">
                                                <select class="btn btn-secondary dropdown-toggle col-lg-12" name="food_drink" required>
                                                        <div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
                                                            <option selected disabled >@lang('text.SelectOne')</option>
                                                            <a class="dropdown-item" href="#">
                                                                <option value="{{$foods->food_drink}}" selected disabled hidden>
                                                                    @if ($foods->food_drink === "Drinkings")
                                                                        @lang('text.Drinkings')
                                                                    @else
                                                                        @lang('text.Foods')
                                                                    @endif
                                                                                            
                                                                </option>
                                                                <option value="drinkings">@lang('text.Drinkings')</option>
                                                                <option value="food">@lang('text.Foods')</option>
                                                            </a>
                                                        </div>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-lg-5">
                                                <label>@lang('text.Name')</label>
                                                {{ Form::text('foodName', $foods->foodName, ['class' => 'form-control', 'placeholder' =>'Name'])}}
                                            </div>
                                            <div class="form-group col-lg-2"></div>
                                            <div class="form-group col-lg-5">
                                                <label>@lang('text.Price')</label>
                                                {{ Form::text('foodPrice', $foods->foodPrice, ['class' => 'form-control' , 'placeholder' =>'Price', 'style' => 'width: 280px'])}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            {{Form::file('foodImage')}}
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            {{Form::hidden('_method', 'PUT')}}
                                            {{Form::submit(__('text.Submit'), ['class' =>'btn btn-info col-lg-2 col-lg-offset-1'])}}
                                            <a href="/dboard/foods" class="btn btn-primary col-lg-2 col-lg-offset-5">@lang('text.Go back')</a>
                                        </div>
                                    {!! Form::close() !!}  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>
@endsection