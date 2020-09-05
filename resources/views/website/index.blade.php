@extends('website.layout.layout')

@section('menu')
    <div class="menu-item" style="background-color: lightblue; border: 1px solid black; border-radius: 50px;">
        <div class="container">
            <div class="row users-frm">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                    <div class="nav-menu {{ app()->getLocale() === 'ps' ? 'text-align' : 'text-center' }}" style="height: 80px;">
                        <nav class="mainmenu users-frm">
                            <ul>
                                <li class="active"><a href="/"><b>@lang('text.Home')</b></a></li>
                                <li><a href="/rooms"><b>@lang('text.Rooms')</b></a></li>
                                <li><a href="/foods"><b>@lang('text.Food Menu')</b></a>
                                    <ul class="dropdown" style="border-radius: 5px; background-color: #d3d3d3c7">
                                        <li><a href="/foods" class="{{ app()->getLocale() === 'ps' ? 'text-right m-0' : '' }} ">@lang('text.Foods')</a></li>
                                        <li><a href="/drinkings" class="{{ app()->getLocale() === 'ps' ? 'text-right m-0' : '' }} ">@lang('text.Drinkings')</a></li>
                                    </ul>
                                </li>
                                <li><a href="/services"><b>@lang('text.Services')</b></a></li>
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
    <!-- Hero Section Begin -->
    <section class="hero-section" style="height: 800px" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                
                <div class="col-lg-4 users-frm text-align hidden">
                    <div class="h1">@lang('text.Header text')</div>
                    <p>@lang('text.Homepage text')</p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="room-item">
                        <div class="ri-text" style="height: 500px">
                            <div class="hero-slider owl-carousel" >
                                <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
                                <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
                                <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 users-frm text-align {{ app()->getLocale() === 'en' ? 'hidden_ps' : ''}}">
                    <div class="h1">@lang('text.Header text')</div>
                    <p>@lang('text.Homepage text')</p>
                </div>

            </div>
        </div>
    </section>
    <!-- End Section Begin -->
@endsection