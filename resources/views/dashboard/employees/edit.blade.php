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
{{-- Top section in main --}}
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
{{-- Top section in main End here --}}
        <hr>
        <div class="container users-frm">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="container">   
                            <div class="row" style="border-radius: 20px;background-color: #002bff30;">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <h3>@lang('text.EditEmployeeText')</h3>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-7 offset-lg-1">
                                    {!! Form::open(['action' => ['EmployeeController@update', $employees->id], 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="name" >@lang('text.Name')</label>
                                                {{ Form::text('name', $employees->name, ['class' => 'form-control', 'placeholder' =>'Employee Name', 'id' => 'name'])}}
                                            </div>
                                            <div class="form-group col-lg-3"></div>
                                            <div class="form-group col-lg-4">
                                                <label for="lastName" >@lang('text.Last Name')</label>
                                                {{ Form::text('lastName', $employees->lastName, ['class' => 'form-control' , 'placeholder' =>'Employee Last Name', 'id' => 'lastName'])}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="PhoneNo" >@lang('text.Phone number')</label>
                                                {{ Form::number('phoneNo', $employees->phoneNo, ['class' => 'form-control', 'placeholder' =>'Phone number', 'id' => 'PhoneNo'])}}
                                            </div>
                                            <div class="form-group col-lg-3"></div>
                                            <div class="form-group col-lg-4">
                                                <label for="salary" >@lang('text.Salary')</label>
                                                {{ Form::number('salary', $employees->salary, ['class' => 'form-control' , 'placeholder' =>'Employee Salary', 'id' => 'salary'])}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="employee_type" >@lang('text.Position')</label>
                                                <br>
                                                <select class="custom-select" id="employee_type"  class="form-control" name="employee_type" value="{{ old('employee_type') }}" style="width: 200px; height:45px; border-radius: 5px; padding-left: 5px">
                                                    <option selected disabled hidden>@lang('text.SelectOne')</option>
                                                    <option value="Moderator">Moderator</option>
                                                    <option value="Receptionist">Receptionist</option>
                                                    <option value="Cleaner">Cleaner</option>
                                                    <option value="Cook">Cook</option>
                                                    <option value="Food transporter">Food transporter</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3"></div>
                                            <div class="form-group col-lg-4">
                                                <label for="tazkira">@lang('text.Tazkira')</label>
                                                <input type="file" id="tazkira" style="border: 1px solid black; border-radius: 5px; margin-top: 5px; width: 200px">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            {{Form::submit(__('text.Submit'), ['class' =>'btn btn-info col-md-2'])}}
                                            <div class="col-md-4"></div>
                                            <a href="/dboard/employees" class="btn btn-primary col-md-2">@lang('text.Go back')</a>
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
@endsection