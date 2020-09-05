@extends('layout.edit')
@section('contents')

	@section('menuBar')
		<li><a href="service">@lang('text.Home')</a></li>
		<li><a href="customer">@lang('text.RegisterCustomer')</a></li>
		<li><a href="roombooking">@lang('text.BookRoom')</a></li>
		<li><a href="/food" id='ps_margin'>@lang('text.Foods')</a></li>
	@endsection

	<div class="row" style="margin-top: 100px;">
		<div class="col-lg-10 offset-lg-1 alert alert-success users-frm text-align pt-5  mr-5" style=" background: #270e731f; color: white; border-radius: 10px">
			<div class="row pl-5 mb-3" style="color: black; background-color;">
				<div class="col-lg-1"></div>
				<div>
					<h1>@lang('text.Food info')</h1>
					<p class="pl-5 mr-5 h4">@lang('text.headerTextOfEditPage')</p>
				</div>
			</div>
			{{-- Food Selection	 --}}
			<div style="margin-right:;">
				{!! Form::open(['action' => ['FoodController@update', $orderedFood->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
				{{-- {!! Form::open(['action' => ['FoodController@update', $customer->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!} --}}

					<div class="row" style="height: 50px; width: 1295px;">
						<div class="col-lg-1"></div>
						<div class="dropdown col-lg-10  input-group">
							<select class="btn btn-secondary dropdown-toggle col-lg-12" name="foodId" required>
								@if(count($foods) > 0)
									
									<option value="{{$orderedFood->foodMenu->id}}" selected  hidden>{{ $orderedFood->foodMenu->foodName}}</option>
									@foreach ($foods as $food)
										<option value="{{$food->id}}">
											<span>{{$food->foodName}}</span>
											<span class="offset-3">({{$food->foodPrice}} Afs)</span>&nbsp;&nbsp;&nbsp;
										</option>
									@endforeach
								@else
									<div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
										<option selected disabled >No food available</option>
									</div>
								@endif
							</select>
						</div>
					</div>
							
					{{-- Food Selection end	 --}}
									<br>
					{{-- Room Selection	 --}}
					<div class="row ">
						<div class="col-lg-1"></div>
						<div class="dropdown col-lg-3 input-group">
							<select class="btn btn-secondary dropdown-toggle col-lg-12" name="bookedRoomId" required>
								@if(count($bookedRooms) > 0)
								
									<option selected hidden value="{{$orderedFood->bookedRoomId}}">@lang('text.Room No'): {{$orderedFood->bookedRoomId}}</option>
									@foreach ($bookedRooms as $bookedRoom)
										<option value="{{$bookedRoom->roomId}}">
											<span>@lang('text.Room No'): {{$bookedRoom->roomId}}</span>
										</option>
									@endforeach
								@else
									<option selected disabled >No booked room available</option>
								@endif
							</select>
						</div>
						<div class="col-lg-1"></div>
						<div class="dropdown col-lg-3  input-group ">
							<select class="btn btn-secondary dropdown-toggle col-lg-12" name="time" required>
								<option value="{{$orderedFood->time}}" selected hidden>{{$orderedFood->time}}</option>
								<option value="morning">@lang('text.Morning')</option>
								<option value="lunch">@lang('text.Lunch')</option>
								<option value="afternoon">@lang('text.Afternoon')</option>
								<option value="dinner">@lang('text.Dinner')</option>
							</select>
						</div>
						<div class="col-lg-1"></div>

						<div class="col-lg-2 input-group bg-secondary form-control">
							<input type="number"  class="form-control" style="background-color: #3b1f1f00; color: white; border:none" name="quantity"  placeholder="@lang('text.Food quantity')234" required value="{{ $orderedFood->quantity }}">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-1"></div>
						<input type="text" class="contact_input col-lg-10 " style="border-radius: 20px" placeholder="" disabled>
					</div>
					<div class="row">
						<div class="col-lg-2 offset-lg-0"></div>
						{{Form::hidden('_method', 'PUT')}}
						{{Form::submit(__('text.Submit'), ['class' =>'btn btn-success', ])}}
					</div>
				{!! Form::close() !!} 
			</div>

			<div class="row" style="">
				<div class="col-lg-10">
					{!! Form::open(['action' => ['FoodController@destroy', $orderedFood->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
					{{Form::hidden('_method', 'DELETE')}}
					{{Form::submit(__('text.Delete'), ['class' => 'btn btn-danger'])}}
					{!! Form::close() !!}
				</div>
				<div class="col-lg-2">
					<a href="/food" class="btn btn-primary">@lang('text.Go back')</a>
				</div>
			</div>

			{{-- Food Room section end	 --}}
		</div>
	</div>
	
@endsection

