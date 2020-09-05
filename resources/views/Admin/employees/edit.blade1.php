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
			<li><a href="/dboard"><em class="fa fa-dashboard">&nbsp;</em> Home</a></li>
			<li><a href="/dboard/users"><em class="fa fa-user">&nbsp;</em> Users</a></li>
			<li class="active"><a href="/dboard/employees"><em class="fa fa-users">&nbsp;</em> Employees</a></li>
			<li><a href="/dboard/rooms"><em class="fa fa-toggle-off">&nbsp;</em> Rooms</a></li>
			<li><a href="/dboard/foods"><em class="fa fa-clone">&nbsp;</em> Food Menu</a></li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
{{-- Sidebar End --}}
{{-- Top section in main --}}
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-users"></em>
				</a></li>
				<li class="active">Employees</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Employees</h1>
			</div>
		</div>
{{-- Top section in main End here --}}
        <h1>Edit Employee's info</h1>   
        <hr>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="container">   
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-7 offset-lg-1">
                                    {!! Form::open(['action' => ['EmployeeController@update', $employees->id], 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}

                                        <br>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                {{ Form::label('name', "Name")}}
                                                {{ Form::text('name', $employees->name, ['class' => 'form-control', 'placeholder' =>'Employee Name',])}}
                                            </div>
                                            <div class="form-group col-lg-3"></div>
                                            <div class="form-group col-lg-4">
                                                {{ Form::label('lastName', "Last Name")}}
                                                {{ Form::text('lastName', $employees->lastName, ['class' => 'form-control' , 'placeholder' =>'Employee Last Name'])}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                {{ Form::label('PhoneNo', "Phone number")}}
                                                {{ Form::number('phoneNo', $employees->phoneNo, ['class' => 'form-control', 'placeholder' =>'Phone number'])}}
                                            </div>
                                            <div class="form-group col-lg-3"></div>
                                            <div class="form-group col-lg-4">
                                                {{ Form::label('salary', "Salary")}}
                                                {{ Form::number('salary', $employees->salary, ['class' => 'form-control' , 'placeholder' =>'Employee Salary'])}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                {{ Form::label('employee_type', "Employee job")}}
                                                <select class="custom-select" id="employee_type"  class="form-control @error('employee_type') is-invalid @enderror" name="employee_type" value="{{ old('employee_type') }}" required autocomplete="employee_type">
                                                    <option selected disabled>{{"$employees->employee_type"}}</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Receptionist">Receptionist</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3"></div>
                                            <div class="form-group col-lg-4">
                                                {{ Form::label('tazkira', "Tazkira photo")}}
                                                {{Form::file('tazkira')}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            {{Form::submit('Submit', ['class' =>'btn btn-primary col-md-2'])}}
                                            <div class="col-md-4"></div>
                                            <a href="/employee" class="btn btn-success col-md-2">Go back</a>
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