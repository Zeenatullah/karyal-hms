@extends('layout.edit')
@section('contents')

	@section('menuBar')
		<li><a href="/service">@lang('text.Home')</a></li>
		<li class="active"><a href="/customer">@lang('text.RegisterCustomer')</a></li>
		<li><a href="/roombooking">@lang('text.BookRoom')</a></li>
		<li><a href="/food" id='ps_margin'>@lang('text.Foods')</a></li>
	@endsection

	<div class="container-fluid">
		<div class="row text-center" style="margin: 90px 0 0 0">
			<div class="col-lg-12 aling-text">
				<h1>@lang('text.Change customer info')</h1>
			</div>
		</div>
		<br><br>
		<div class="row" style="margin-top: 20px;">
			<div class="col-lg-1"></div>
			<div class="users-frm col-lg-10" style="border-radius: 50px;background-color: #42465cfa; color: white; padding: 35px;" >
				{!! Form::open(['action' => ['CustomerController@update', $customer->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
					<div class="row mb-3">
						<div class="col-lg-1"></div>
						<div class="col-lg-4">
							<input style="height: 50px; color: black;" type="text" class="form-control" placeholder="Name" required="required" name="name" value="{{$customer->name}}">
						</div>
						<div class="col-lg-1"></div>
						<div class="col-lg-4">
							<input style="height: 50px; color: black" type="text" class="form-control" placeholder="Last name" required="required" name="lastName" value="{{$customer->lastName}}">
						</div>
					</div>
					<br>
					<div class="row mb-3">
						<div class="col-lg-1"></div>
						<div class="col-lg-4">
							<input style="height: 50px; color: black" type="number" class="form-control" placeholder="Phone number" required="required" name="phoneNumber" value="{{$customer->phoneNumber}}">
						</div>
						<div class="col-lg-1"></div>
						<div class="col-lg-4">
							<input style="height: 50px; color: black" type="email" class="form-control" placeholder="Your email" required="required" name="email" value="{{$customer->email}}">
						</div>
					</div>
					<br>
					<div class="row mb-3">
						<div class="col-lg-1"></div>
						<div class="input-group col-lg-4">
							<input style="height: 50px; color: black" style="padding-right: 10px" type="text" class="form-control" placeholder=@lang('text.Province') required="required" name="province" value="{{$customer->province}}">
						</div>
						<div class="col-lg-1"></div>
						<div class="input-group col-lg-4">
							<div class="custom-file">
								<input type="file" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" required="required" name="tazkira" value="{{$customer->tazkira}}">
								<label class="custom-file-label" for="inputGroupFile04">Choose Tazkira image</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-3"></div>
						{{Form::submit(__('text.Submit'), ['class' =>'btn btn-success col-lg-1'])}}
						<div class="col-lg-3"></div>
						<a href="/customer" class="btn btn-primary col-lg-1">@lang('text.Go back')</a>
					</div>
					{{Form::hidden('_method', 'PUT')}}
				{!! Form::close() !!}  
				<br>
			</div>
		</div>
	</div>
@endsection

