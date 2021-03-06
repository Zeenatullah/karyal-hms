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
                                <li><a href="/"><b>@lang('text.Home')</b></a></li>
                                <li><a href="/rooms"><b>@lang('text.Rooms')</b></a></li>
                                <li class="active"><a href="/foods"><b>@lang('text.Food Menu')</b></a>
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

    
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>@lang('text.Our Foods')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad users-frm text-align">
        <div class="container" style="font-family: bahij-regular">
            <div class="row">
                @foreach ($foodMenu as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src="{{Storage::disk('s3')->url($item->foodImage)}}" style="width: 500px; height: 375px">
                            <div class="ri-text">
                                <h4>
                                    @php
                                        if($item->foodName === "Kabab"){
                                            echo __('text.Kabab');
                                        }elseif ($item->foodName === "Kabuli palaw") {
                                            echo __('text.Kabuli palaw');
                                        }elseif ($item->foodName === "Ashok") {
                                            echo __('text.Ashok');
                                        }elseif ($item->foodName === "Manto") {
                                            echo __('text.Manto');
                                        }
                                        @endphp
                                </h4>
                                <h3>{{ $item->foodPrice }} @lang('text.Afs')<span> / @lang('text.package')</span></h3>
                                {{-- <a href="/foods/{{$item->id}}" class="primary-btn">More Details</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="room-pagination">
                        {{-- <a href="#">1</a> --}}
                        {{-- <a href="#">2</a> --}}
                        {{-- <a href="/foods/{{}}">Next <i class="fa fa-long-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->


@endsection