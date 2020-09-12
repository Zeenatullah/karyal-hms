@extends('layout.show')
@section('contents')

	@section('menuBar')
		<li><a href="/service">@lang('text.Home')</a></li>
		<li class="active"><a href="/customer">@lang('text.RegisterCustomer')</a></li>
		<li><a href="/roombooking">@lang('text.BookRoom')</a></li>
		<li><a href="/food" id='ps_margin'>@lang('text.Foods')</a></li>
	@endsection
	<div class="container-fluid users-frm text-align">
		<div class="row text-center" style="margin: 90px 0 0 0">
			<div class="col-lg-12">
				<h1>@lang('text.Customer info')</h1>
			</div>
		</div>
		
		<div class="row col-lg-12 ml-5 mr-5" style="margin: 50px 0">
			<div class="col-lg-4 alert alert-success users-frm" style=" background-color: #42465cfa; color: white; border-radius: 10px">
				<div class=" mr-3 mb-3">
					<div class=" text-align row">
						<h3 class="mt-3 col-lg-5">@lang('text.Name') </h3>   
						<h3 class="mt-3 col-lg-7">{{$customer->name}}</h3>   
					</div>
					<div class=" text-align row">
						<h3 class="mt-3 col-lg-5">@lang('text.Last Name')</h3>
						<h3 class="mt-3 col-lg-7">{{$customer->lastName}}</h3>
					</div>
					<div class=" text-align row">
						<h3 class="mt-3 col-lg-5">@lang('text.Email')</h3>   
						<h3 class="mt-3 col-lg-7">{{$customer->email}}</h3>
					</div>
					<div class=" text-align row">
						<h3 class="mt-3 col-lg-5">@lang('text.Phone number')</h3>  
						<h3 class="mt-3 col-lg-7">{{$customer->phoneNumber}}</h3>
					</div>
					<div class=" text-align row">
						<h5 class="mt-3 col-lg-5">@lang('text.AddedOn')</h5>
						<h5 class="mt-3 col-lg-7">{{ $customer->created_at }}</h5>
					</div>
				</div>
				<div class="row" style="margin-top: 180px">
					<div class="col-lg-1"></div>
					<a href="/customer/{{$customer->id}}/edit" class="btn btn-success col-lg-2">@lang('text.Edit')</a>
					<div class="col-lg-6">
						{!! Form::open(['action' => ['CustomerController@destroy', $customer->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
						{{Form::hidden('_method', 'DELETE')}}
						{{Form::submit(__('text.Delete'), ['class' => 'btn btn-danger'])}}
						{!! Form::close() !!}
					</div>
					<div class="col-lg-2">
						<a href="/customer" class="btn btn-primary">@lang('text.Go back')</a>
					</div>
				</div>
			</div>
			
			<div class="col-lg-7">
				<img src="/storage/Customer_tazkira/{{$customer->tazkira}}" alt="Customer tazkira" width="100%">
			</div>

		</div>
	</div>
@endsection

