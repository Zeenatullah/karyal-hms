@extends('layout.assistant')
	@section('contents')

		@section('menuBar')
			<li><a href="service">@lang('text.Home')</a></li>
			<li><a href="customer">@lang('text.RegisterCustomer')</a></li>
			<li><a href="roombooking">@lang('text.BookRoom')</a></li>
			<li class="active"><a href="food" id='ps_margin'>@lang('text.Foods')</a></li>
		@endsection
			<!-- Form section -->
			<div class="contact">
				<div class="contact_container">
					<div class="container">
						<div class="row">
						
						{{-- Message section --}}

							<div class="col-lg-2"></div>
							<div class="col-lg-8 text-center" style="padding-top: 90px">
								@include('inc.messages')
							</div>
							<div class="col-lg-2"></div>

						{{-- Form upper text --}}

							<div class="col mt-5 pt-5">
								<div class="section_title text-center">
									<div>@lang('text.Food info')</div>
									<h1>@lang('text.Food info')</h1>
									<p class="h4">@lang('text.Ordering food')</p>
								</div>

						{{-- Form Section --}}

								<div class="contact_form_container users-frm">
									{!! Form::open(['action' => 'FoodController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
								
						{{-- Food Selection	 --}}
										<div class="row" class="row" style="height: 50px; width: 1380px;">
											<div class="dropdown col-lg-12 input-group">
												<select class="btn btn-secondary dropdown-toggle col-lg-10" name="foodId" required>
													@if(count($foods) > 0)
														<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
															<option selected disabled >@lang('text.Choose a food')</option>
															@foreach ($foods as $food)
															<a class="dropdown-item" href="#">
																<option value="{{$food->id}}">
																	<h4>
																		<span>{{$food->foodName}}</span>
																		<span class="offset-3">({{$food->foodPrice}} Afs)</span>&nbsp;&nbsp;&nbsp;
																	</h4>
																</option>
															</a>
															@endforeach
														</div>
													@else
														<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
															<option selected disabled >@lang('text.No food available')</option>
														</div>
													@endif
												</select>
											</div>
										</div>
								
						{{-- Food Selection end	 --}}
										<br>
						{{-- Room Selection	 --}}
										<div class="row ">
											<div class="dropdown col-lg-5 input-group">
												<select class="btn btn-secondary dropdown-toggle col-lg-12" name="bookedRoomId" required>
													@if(count($bookedRooms) > 0)
														<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
															<option selected hidden >@lang('text.Select Room')</option>
															@foreach ($bookedRooms as $bookedRoom)
																<option value="{{$bookedRoom->roomId}}">
																	<span>@lang('text.Room No'): {{$bookedRoom->roomId}}</span>
																</option>
															@endforeach
														</div>
													@else
														<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
															<option selected disabled >@lang('text.No booked room')</option>
														</div>
													@endif
												</select>
											</div>
											<div class="dropdown col-lg-5 input-group ">
												<select class="btn btn-secondary dropdown-toggle col-lg-12" name="time" required>
													<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
														<option selected hidden >@lang('text.Select time')</option>
														<option value="morning">@lang('text.Morning')</option>
														<option value="lunch">@lang('text.Lunch')</option>
														<option value="afternoon">@lang('text.Afternoon')</option>
														<option value="dinner">@lang('text.Dinner')</option>
													</div>
												</select>
											</div>
											<div class="col-lg-2 input-group bg-secondary form-control">
												<input type="number" class="form-control" name="quantity" required placeholder="@lang('text.Food quantity')">
											</div>
										</div>
						{{-- Food Room section end	 --}}
									<input type="text" class="contact_input" disabled>
										<div class="row">
											<div class="col-lg-5"></div>
											{{Form::submit(__('text.Submit'), ['class' =>'contact_button'])}}
										</div>
									{!! Form::close() !!}  
								</div>
						{{-- Form section end	 --}}
									<br><br><hr>
										<div>
											@php $total = 0; $id = 1;$no = 0; $number = 0; $showing = 0; ;@endphp
										</div>
										@foreach ($bookedFoods as $bookedFood)
											@if($bookedFood->show)
												@php $showing = 1 @endphp
											@endif
										@endforeach

										@if ($showing > 0)
											<div class="alert alert-primary col-lg-6 offset-3 text-center" role="alert">@lang('text.Currently not paid bills')</div>
										@else
											<div class="alert alert-danger col-lg-6 offset-3 text-center" role="alert">@lang('text.All bills are paid')</div>
										@endif	

						{{-- Table Section --}}
							@foreach ($bookedRooms as $bookedRoom)
								@if($bookedRoom->show)
									@if ($showing > 0)
										<div class="users-frm">
											<hr>
											<table class="table">
												<thead class="table-dark">
													<tr class="text-light">
														<th scope="col">@lang('text.Number')</th>
														<th scope="col">@lang('text.Food')</th>
														<th scope="col">@lang('text.Time')</th>
														<th scope="col">@lang('text.Food quantity')</th>
														<th scope="col">@lang('text.Price')</th>
														<th scope="col">@lang('text.Edit')</th>
														<th scope="col">@lang('text.Total price')</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($bookedFoods as $bookedFood)
														@if($bookedFood->show )
														@php $reset = 1; @endphp
															@if ($bookedRoom->roomId == $bookedFood->bookedRoomId)
																<tr class="table-secondary text-dark">
																	<th scope="col">@php echo $no +=1; @endphp</th>
																	<th>{{$bookedFood->foodmenu->foodName}}</th>
																	<th>
																		@php
																			if( $bookedFood->time === 'morning'){
																				echo __('text.Morning');
																			}elseif ($bookedFood->time === 'lunch') {
																				echo __('text.Lunch');
																			}elseif ($bookedFood->time === 'afternoon') {
																				echo __('text.Afternoon');
																			}else {
																				echo __('text.Dinner');
																			}
																			
																		@endphp
																	</th>
																	<th>{{$bookedFood->quantity}}</th>
																	<th>{{($bookedFood->foodmenu->foodPrice) }}</th>
																	<th><a href="/food/{{$bookedFood->id}}/edit" class="btn btn-info col-md-6">@lang('text.Edit')</a></th>
																	<th>{{($bookedFood->totalPrice)}}</th>
																	@php	$total +=$bookedFood->totalPrice;	@endphp
																</tr>
															@else
																@php	$no = 0;	@endphp
															@endif	
														@endif
													@endforeach
													<tr class="bg-info text-light">
														<th colspan="2" scope="col">@lang('text.Grand Total') </th>
													<th colspan="4" scope="col"><h3>@lang('text.Room No'): {{$bookedRoom->roomId}}</h3></th>
														<th colspan="1" scope="col">{{$total}}</th>
													</tr>
													<tr>
														<td><a href="/bill/{{$bookedRoom->roomId}}/edit" class="btn contact_button h-50" style="width: 120px;">@lang('text.Submit Bill')</a></td>
													</tr>
												</tbody>
											</table>
											@php
												$total = 0;
											@endphp
										</div>
									@endif	
								@endif	
							@endforeach


						{{-- Table Section --}}

							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br>
			<div class="">
				<div class="section_title text-center mb-5">
					<div>@lang('text.Food info')</div>
					<h1>@lang('text.Pervious bills')</h1>
				</div>
				
				@foreach ($bookedRooms as $bookedRoom)
					@if(!$bookedRoom->show)
						<div class="row mt-4 ">
							<div class="col-lg-10 offset-lg-1 users-frm">
								<table class="table">
									<thead class="table-dark">
										<tr class="text-light">
											<th scope="col">@lang('text.Number')</th>
											<th scope="col">@lang('text.Food')</th>
											<th scope="col">@lang('text.Time')</th>
											<th scope="col">@lang('text.Quantity')</th>
											<th scope="col">@lang('text.Price')</th>
											<th scope="col">@lang('text.Edit')</th>
											<th scope="col">@lang('text.Total price')</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($bookedFoods as $bookedFood)
											@if(!$bookedFood->show )
											@php $reset = 1; @endphp
												@if ($bookedRoom->roomId == $bookedFood->bookedRoomId)
													<tr class="table-secondary text-dark">
														<th scope="col">@php echo $number +=1; @endphp</th>
														<th>{{$bookedFood->foodmenu->foodName}}</th>
														<th>
															@php
																if( $bookedFood->time === 'morning'){
																	echo __('text.Morning');
																}elseif ($bookedFood->time === 'lunch') {
																	echo __('text.Lunch');
																}elseif ($bookedFood->time === 'afternoon') {
																	echo __('text.Afternoon');
																}else {
																	echo __('text.Dinner');
																}
																
															@endphp
														</th>
														<th>{{$bookedFood->quantity}}</th>
														<th>{{($bookedFood->foodmenu->foodPrice) }}</th>
														<th>{{($bookedFood->created_at)}}</th>
														<th>{{($bookedFood->totalPrice)}}</th>
														@php	$total +=$bookedFood->totalPrice;	@endphp
													</tr>
												@else
													@php	$number = 0;	@endphp
												@endif	
											@endif
										@endforeach
										<tr class="bg-info text-light">
											<th colspan="1" scope="col"> </th>
											<th colspan="3" scope="col">@lang('text.Grand Total') </th>
											<th colspan="2" scope="col">@lang('text.Room No'): {{$bookedRoom->roomId}}</th>
											<th colspan="1" scope="col">{{$total}}</th>
										</tr>
									</tbody>
								</table>
								@php
									$total = 0;
								@endphp
							</div>
						</div>
					@endif	
				@endforeach
			</div>
			<br><br><br>
	@endsection
	
