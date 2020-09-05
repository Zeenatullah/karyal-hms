@extends('layouts.receptionist')
@section('menu')
<div class="col-lg-10">
    <div class="nav-menu">
        <nav class="mainmenu">
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="receptionist">Receptionist</a></li>
                <li><a href="employee">Employee</a></li>
                <li class="active"><a href="#">Rooms</a></li>
                <li><a href="foodMenu">Food Menu</a></li>
            </ul>
        </nav>
        <div class="nav-right search-switch">
            <i class="icon_search"></i>
        </div>
    </div>
</div>
@endsection

@section('contentes')
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">   
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Add Room info</h2>
                        <p>It's required to insert information accuratly </p>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    {!! Form::open(['action' => 'RoomsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row ">
                            <div class="col-lg-12">
                                <h5>Select the service that the room has</h5>
                                <hr>
                            </div>
                            <div class="col-lg-4" >
                                {{ Form::label('wifi', "Wifi")}}
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div>
                                        Yes: &nbsp;{{ Form::radio('wifi', '1')}}
                                    </div>
                                    <div class="col-lg-3"></div>
                                    <div>
                                        NO: &nbsp;{{ Form::radio('wifi', '0')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-3"></div>
                            <div class="form-group col-lg-4" >
                                {{ Form::label('a/c', "A/C")}}
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div>
                                        Yes: &nbsp;{{ Form::radio('a/c', '1')}}
                                    </div>
                                    <div class="col-lg-3"></div>
                                    <div>
                                        NO: &nbsp;{{ Form::radio('a/c', '0') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="row">
                            <div class="form-group col-lg-4" >
                                {{ Form::label('tv', "Telvision")}}
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div>
                                        Yes:&nbsp;{{ Form::radio('tv', '1')}}
                                    </div>
                                    <div class="col-lg-3"></div>
                                    <div>
                                        NO: &nbsp;{{ Form::radio('tv', '0')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-3"></div>
                            <div class="form-group col-lg-4" >
                                {{ Form::label('taken', "Taken")}}
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div>
                                        Yes: &nbsp;{{ Form::radio('taken', '1')}}
                                    </div>
                                    <div class="col-lg-3"></div>
                                    <div>
                                        NO: &nbsp;{{ Form::radio('taken', '0')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-4" >
                                {{ Form::label('price', "Price")}}
                                {{ Form::text('price', '', ['class' => 'form-control', 'placeholder' =>'$'])}}
                            </div>
                            <div class="form-group col-lg-1"></div>
                            <div class="form-group col-lg-6" >
                                {{ Form::label('numberOfPeople', "Number of people")}}
                                {{ Form::number('numberOfPeople', '', ['class' => 'form-control' , 'placeholder' =>'Number of people', 'max'=>'6'])}}
                            </div>
                        </div>
                        <br>
                        {{-- <div class="form-group">
                            {{Form::file('room_images')}}
                        </div> --}}
                        {{-- <div class="form-group">
                            {{Form::file('room_images')}}
                        </div> --}}
                        <div class="form-group">
                            {{Form::file('room_images')}}
                        </div>
                        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
                    {!! Form::close() !!}  
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    <section class="contact-section spad">
        <div class="container">   
            {{-- {{$rooms->roomId}} --}}
            @if(count($rooms) > 0)
            @foreach ($rooms as $room)
                <div class="well align-items-center p-3 my-3 shadow-lg">
                    <div class="row">
                        <div class="col position-relative">
                            <span class="position-absolute badge badge-success" style="top: 0; right: 10px">PUBLISHED</span>
                            <span class="position-absolute badge badge-warning" style="top: 0; right: 10px">NOT PUBLISHED</span>
                             <h3><a href="/room/{{$room->id}}">ID: {{ $room->id }}</a></h3>
                             <h3>Price: {{ $room->price }} Afs</h3>
                            <small>Added on {{ $room->created_at }} </small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- {{ $rooms->links() }} --}}
        {{-- @else --}}
            {{-- <p>There is no Receptionist</p> --}}
        @endif
        </div>
    </section>

@endsection