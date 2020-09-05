@extends('layout.assistant')
	@section('menuBar')
		<li class="active"><a href="service">@lang('text.Home')</a></li>
		<li><a href="customer">@lang('text.RegisterCustomer')</a></li>
		<li><a href="roombooking">@lang('text.BookRoom')</a></li>
		<li><a href="food" id='ps_margin'>@lang('text.Foods')</a></li>
	@endsection

	@section('contents')
			<!-- Home -->
			<div class="home">
				<div class="home_container d-flex flex-column align-items-center justify-content-center">
					<div class="intro" style="margin-top: 0; padding-top: 0;">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="section_title text-center">
										<div>@lang('text.HomeTextHeader')</div>
										<h1>@lang('text.HomeTextHeader')</h1>
									</div>
								</div>
							</div>
							<div class="row intro_row">
								<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
									<div class="intro_text text-center">
										<p>@lang('text.HomeText')</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br>	
		</div>
	@endsection
	
