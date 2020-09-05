@extends('website.layout.show')

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
                                <li class="active"><a href="/rooms"><b>@lang('text.Rooms')</b></a></li>
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
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>@lang('text.Our Rooms')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad users-frm text-align">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <div class="ri-text">
                            <h4><b>@lang('text.Room number'): {{ $rooms->id }}</b></h4>
                            <h3>@lang('text.Price'): {{ $rooms->price }} ( @lang('text.Afs') ) </h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">@lang('text.Capacity'):</td>
                                        <td>{{ $rooms->numberOfPeople }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">@lang('text.Services'):</td>
                                        <td>
                                            <span style="margin-right: 10px" >@if ($rooms->tv) @lang('text.tv') @endif</span> 
                                            <span style="margin-right: 10px">@if ($rooms->wifi) @lang('text.wifi') @endif</span> 
                                            <span style="margin-right: 10px">@if ($rooms->ac) @lang('text.AC') @endif</span> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="room-item">
                        <div class="ri-text" style="height: 500px">
                            <div class="hero-slider owl-carousel" >
                                @foreach ($images as $image)
                                <div class="hs-item set-bg" data-setbg="/storage/room_images/{{$image->imageName}}"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->


@endsection