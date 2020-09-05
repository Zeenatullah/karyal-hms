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
<div class="container">
    <br><br>
    <a href="/dboard/employees" class="btn btn-primary col-md-2">Go back</a>
    <br><br>
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <h3>Name: {{$employees->name}}</h3>   
                <h3>Last Name: {{$employees->lastname}}</h3>   
                <h3>Phone: {{$employees->phoneNo}}</h3>   
                <h3>Salary: {{$employees->salary}}$</h3>   
                <small>Hired on {{ $employees->created_at }} </small>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <a href="/employee/{{$employees->id}}/edit" class="btn btn-info col-lg-6">Edit</a>
            </div>
            <div class="col-md-4">
                {!! Form::open(['action' => ['employeeController@destroy', $employees->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger col-lg-4'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection