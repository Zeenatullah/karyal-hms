@extends('layout.assistant')
	@section('contents')
		@section('menuBar')
			<li><a href="service">@lang('text.Home')</a></li>
			<li class="active"><a href="customer">@lang('text.RegisterCustomer')</a></li>
			<li><a href="roombooking">@lang('text.BookRoom')</a></li>
			<li><a href="food" id='ps_margin'>@lang('text.Foods')</a></li>
		@endsection
		
						<!-- Form section -->
			<div class="contact" style="margin-top: 130px">
				<div class="contact_container">
					<div class="container">
						<div class="row">
						
						{{-- Message section --}}

							<div class="col-lg-2"></div>
							<div class="col-lg-8 text-center">
								@include('inc.messages')
							</div>
							<div class="col-lg-2"></div>

						{{-- Form upper text --}}

							<div class="col users-frm" >
								<div class="section_title text-center">
									<div style="font-size: 6em">@lang('text.CustomerTextHeader')</div>
									<h1>@lang('text.CustomerTextHeader')</h1>
									<p class="users-frm">@lang('text.CustomerText')</p>
								</div>

						{{-- Form Section --}}

								<div class="contact_form_container">
									{!! Form::open(['action' => 'CustomerController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

										<div class="row">
											<div class="col-lg-6">
												<input style="padding-right: 10px" type="text" class="contact_input" placeholder=@lang('text.Name') required="required" name="name">
											</div>
											<div class="col-lg-6">
												<input style="padding-right: 10px" type="text" class="contact_input" placeholder=@lang('text.Last Name') required="required" name="lastName">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<input style="padding-right: 10px" type="number" class="contact_input" placeholder=@lang('text.Phone number') required="required" name="phoneNumber">
											</div>
											<div class="col-lg-6">
												<input style="padding-right: 10px" type="email" class="contact_input" placeholder=@lang('text.Email') required="required" name="email">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<input style="padding-right: 10px" type="text" class="contact_input" placeholder=@lang('text.Province') required="required" name="province">
											</div>
											<div class="input-group col-lg-6 mt-3" >
												<div class="custom-file">
												  <input style="padding-right: 10px" type="file" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" required="required" name="tazkira">
												  <label class="custom-file-label" for="inputGroupFile04">@lang('text.ChooseTazkiraImage')</label>
												</div>
											</div>
										</div>
										<input style="padding-right: 10px" type="text" class="contact_input" placeholder="" disabled>
										<div class="row">
											<div class="col-lg-5"></div>
											{{Form::submit(__('text.Submit'), ['class' =>'contact_button'])}}

										</div>
									{!! Form::close() !!}  
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br><hr><br><br>
			<div class="col">
				<div class="section_title text-center">
					<div>@lang('text.Customers')</div>
					<h1>@lang('text.RegisteredCustomers')</h1>
				</div>
			</div>
			<br>
			<div class="container mt-5">   
				@if(count($customers) > 0)
					@foreach ($customers as $customer)
						<div class="well p-3 mb-2" style="background-color: #3c70bf; color: white; border-radius: 10px;">
							<div class="row users-frm text-align">
								<table>
									<thead>
										<tr>
											<td>
												<div style="width: 300px" class="h3 col offset-lg-3">@lang('text.Name'): {{ $customer->name }} {{ $customer->lastName }}</div>
											</td>
											<td style="width: 500px"></td>
											<td style="width: 100px">
												<a class="col btn btn-info" style="color: white;" href="/customer/{{$customer->id}}">@lang('text.MoreInfo')</a>
											</td>
											<td style="width: 20px"></td>
											<td style="width: 100px">
												<span class="col">
													{!! Form::open(['action' => ['CustomerController@destroy', $customer->id], 'method' => 'POST'])!!}
														{{Form::hidden('_method', 'DELETE')}}
														{{Form::submit(__('text.Delete'), ['class' => 'btn btn-danger'])}}
													{!! Form::close() !!}
												</span>
											</td>
										</tr>
									</thead>
								</table>
								<div>
									<div class="col-lg-1"></div>
								</div>
								<div class="row">
								</div>
							</div>
						</div>
					@endforeach
					{{ $customers->links() }}
				@else
					<p>There is no Receptionist</p>
				@endif
			</div>
			<br>
			<br>
	@endsection
	
