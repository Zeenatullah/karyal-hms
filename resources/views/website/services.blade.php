@extends('website.layout.layout')

@section('menu')
    <div class="menu-item" style="background-color: lightblue; border: 1px solid black; border-radius: 50px;">
        <div class="container">
            <div class="row users-frm">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu {{ app()->getLocale() === 'ps' ? 'text-align' : 'text-center' }}" style="height: 80px;">
                        <nav class="mainmenu users-frm">
                            <ul>
                                <li><a href="/"><b>@lang('text.Home')</b></a></li>
                                <li><a href="/rooms"><b>@lang('text.Rooms')</b></a></li>
                                <li><a href="/foods"><b>@lang('text.Food Menu')</b></a>
                                    <ul class="dropdown" style="border-radius: 5px; background-color: #d3d3d3c7">
                                        <li><a href="/foods" class="{{ app()->getLocale() === 'ps' ? 'text-right m-0' : '' }} ">@lang('text.Foods')</a></li>
                                        <li><a href="/drinkings" class="{{ app()->getLocale() === 'ps' ? 'text-right m-0' : '' }} ">@lang('text.Drinkings')</a></li>
                                    </ul>
                                </li>
                                <li class="active"><a href="/services"><b>@lang('text.Services')</b></a></li>
                                <li><a href="/contact"><b>@lang('text.Contacts')</b></a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><b>@lang('text.Login')</b></a>
                                </li>
                            </ul>
                        </nav> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('contents')

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad users-frm text-align" style="margin-top: 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5  ">
                    <div class="breadcrumb-text">
                        <h2>@lang('text.Our Services')</h2>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-5 m-5">
                    <div class="room-item">
                        <img src="img/services/wifi.png" style="width: 360px; height: 230px">
                        <div class="ri-text">
                            <h4>@lang('text.wifi')</h4>
                            <h3> @lang('text.Free')<span> / 24 @lang('text.Hours') </span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-5 m-5">
                    <div class="room-item">
                        <img src="img/services/ac.jpg" style="width: 360px; height: 230px">
                        <div class="ri-text">
                            <h4>@lang('text.Airconditioner')</h4>
                            <h3> @lang('text.Free')<span> / 24 @lang('text.Hours') </span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-5 m-5">
                    <div class="room-item">
                        <img src="img/services/television.jpg" style="width: 360px; height: 230px">
                        <div class="ri-text">
                            <h4>@lang('text.tv')</h4>
                            <h3> @lang('text.Free')<span> / 24 @lang('text.Hours') </span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->


@endsection