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
    <!-- Breadcrumb Section Begin -->
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
                @foreach ($rooms as $room)
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src="/storage/room_images/{{$imagesArray[$room->id -1]}}" alt="Room images" width="100%">
                            <div class="ri-text">
                                <h4>@lang('text.Room number'): {{ $room->id }}</h4>
                                <h3>@lang('text.Price'): {{ $room->price }} @lang('text.Afs')</h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">@lang('text.Capacity'):</td>
                                            <td>{{ $room->numberOfPeople }}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">@lang('text.Services'):</td>
                                            <td>
                                                <span style="margin-right: 10px" >@if ($room->tv) @lang('text.tv') @endif</span> 
                                                <span style="margin-right: 10px">@if ($room->wifi) @lang('text.wifi') @endif</span> 
                                                <span style="margin-right: 10px">@if ($room->ac) @lang('text.AC') @endif</span> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="/rooms/{{$room->id}}">@lang('text.MoreInfo')</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="room-pagination">
                        {{-- <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">Next <i class="fa fa-long-arrow-right"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->


@endsection