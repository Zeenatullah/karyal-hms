@extends('layout.assistant')
	@section('menuBar')
		<li><a href="service">@lang('text.Home')</a></li>
		<li><a href="customer">@lang('text.RegisterCustomer')</a></li>
		<li class="active"><a href="roombooking">@lang('text.BookRoom')</a></li>
		<li><a href="food" id='ps_margin'>@lang('text.Foods')</a></li>
	@endsection
	@section('contents')

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
							<div class="col users-frm">
								<div class="section_title text-center">
									<div style="font-size: 5em">@lang('text.RoomTextHeader')</div>
									<h1>@lang('text.RoomTextHeader')</h1>
									<p>@lang('text.RoomText')</p>
								</div>

						{{-- Form Section --}}
								{{-- <div class="contact_form_container"> --}}
								<div class="contact_form_container users-frm" style="border-radius: 50px; background-color: #42465cfa; padding: 50px;" >
									{!! Form::open(['action' => 'RoomBookingController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
										<div class="users-frm" >
											<div class="dropdown col-lg-11 input-group">
												<select class="btn btn-secondary dropdown-toggle col-lg-12" name="customerId" required style="background-color: white; color: black">
													@if(count($customers) > 0)
														<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
															<option selected hidden >@lang('text.SelectCustomer')</option>
															@foreach ($customers as $customer)
															<a class="dropdown-item" href="#">
																<option value="{{$customer->id}}">
																		<h4>
																			<span>{{$customer->name}}</span>
																			<span>{{$customer->lastName}}</span>,&nbsp;&nbsp;&nbsp;
																			<span>{{$customer->email}}</span>
																		</h4>
																	</option>
																</a>
															@endforeach
														</div>
													@else
														<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
															<option selected hidden >@lang('text.NoCustomer')</option>
														</div>
													@endif
												</select>
											</div>
										</div>
										<br>
										<div>
											<div class="dropdown col-lg-11 input-group">
												<select class="btn btn-secondary dropdown-toggle col-lg-12" name="roomId" required style="background-color: white; color: black">
													@if(count($roomBooking) >= count($rooms))
														<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton"> 
															<option selected disabled>@lang('text.No room available')</option>
														</div>
													@else
														<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
															<option selected hidden disabled>@lang('text.SelectRoom')</option>
															@foreach ($rooms as $room)
																@if ($room->taken)
																	<a class="dropdown-item" href="#">
																		<option value="{{$room->id}}" disabled aria-placeholder="Sorry no room"></option>
																	</a>
																@else
																	<a class="dropdown-item" href="#">
																		<option value="{{$room->id}}">
																			<h4>
																				<span>@lang('text.Room number'): {{$room->id}}</span>
																				<span style="margin-right: 50px"></span>
																				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @lang('text.Price'): {{$room->price}}</span>
																			</h4>
																		</option>
																	</a>
																@endif
															@endforeach
														</div>
													@endif
												</select>
											</div>
										</div>
										<br>
										<div class="row text-align">
											<div class="input-group col-lg-11">
												<div class="col-lg-3">
													<label  style="width: 140%; border-radius: 5px; padding: 8px; height: 40px; color: white;  text-align: center" for="startDate">@lang('text.Start date')</label>
													<input type="date"  style="width: 140% " class="form-control" id="startDate" name="startDate"  required>
												</div>
												
												<div class="col-lg-1"></div>
												<div class="col-lg-3">
													<label  style="width: 140%; border-radius: 5px; padding: 8px; height: 40px; color: white;  text-align: center" for="endDate">@lang('text.End date')</label>
													<input type="date"  style="width: 140% " class="form-control" id="endDate" name="endDate" required>
												</div>

												<div class="col-lg-1"></div>
												<div class="col-lg-3">
													<label style="width: 140%; border-radius: 5px; padding: 8px; height: 40px; color: white;  text-align: center" for="payment">@lang('text.Payment')</label>
													<input type="number" style="width: 140% " class="form-control" id="payment" name="payment" required placeholder="@lang('text.EnterPayment')">
												</div>
											</div>
										</div><br>
										<div class="row">
											<div class="col-lg-5"></div>
											{{Form::submit(__('text.Book now'), ['class' =>'contact_button'])}}
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
				<div class="section_title text-center mb-5">
					<div>@lang('text.Room info')</div>
					<h1>@lang('text.BookedRooms')</h1>
				</div>
			</div>
			<br>
			<div class="container users-frm text-align ">   
				@if(count($roomBooking) > 0)
					@foreach ($roomBooking as $booked)
						<div class="well align-items-center p-3 my-3 shadow-lg" style="background-color: #3c70bf; color: white; border-radius: 10px;">
							<div class="row">
								<div class="col position-relative p-3">
									<div class="row">
										<span class="col-lg-3 mb-4 h2">@lang('text.Room number'): {{ $booked->roomId }}</span>
										<span class="h2 col-lg-6 pr-4">@lang('text.Booked by'): <span>{{ $booked->customers->name }}</span></span>
									</div>
									<div class="row mb-3 pr-3" style="background-color: #3d4b50;	margin: 0px; height: 30px; padding: 5px; border-radius: 15px">
										<span style="border-left: 1px solid whitesmoke" class="col-lg-2">@lang('text.Room Price'): {{ $booked->rooms->price }}</span>
										<span style="border-left: 1px solid whitesmoke" class="col-lg-2">@lang('text.Paid cash'): {{ $booked->payment }}</span>
										<span style="border-left: 1px solid whitesmoke" class="col-lg-2">@lang('text.Remained cash'): {{ $booked->rooms->price - $booked->payment  }}</span>
										<span style="border-left: 1px solid whitesmoke" class="col-lg-3">@lang('text.Start date'): {{ $booked->startDate }}</span>
										<span class="col-lg-3">@lang('text.End date'): {{ $booked->endDate }}</span>
									</div>
									<div class="row">
										<span class="offset-5 col-lg-3"></span>
										<small class="col-lg-2">
											<a href="/roombooking/{{ $booked->roomId }}/edit" class="btn btn-success col-lg-6 offset-8">@lang('text.Edit')</a>
										</small>
										<small class=" col-lg-2"> 
											{!! Form::open(['action' => ['RoomBookingController@destroy', $booked->roomId], 'method' => 'POST'])!!}
												{{Form::hidden('_method', 'DELETE')}}
												{{Form::submit(__('text.Delete'), ['class' => 'btn btn-danger'])}}
											{!! Form::close() !!}
										</small>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					{{ $roomBooking->links() }}
				@else
					<p class='users-frm alert-danger h3 text-center' style="padding: 10px">@lang('text.NoRoom')</p>
				@endif
			</div>
			<br>
			<br>
	@endsection
	
