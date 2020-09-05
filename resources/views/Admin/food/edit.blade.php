@extends('layout.admin')
    @section('content')
        <h1>Edit Employee's info</h1>   
        <hr>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <br>
                        <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                            <h3>The previous values</h3>
                        </div>
                        <div class="container">   
                            <div class="row">
                                <div class="col-md-1 col-sm-1"></div>
                                <div class="">
                                    <h5>Room ID: {{$rooms->id}}</h5>
                                </div>
                                <div class="col-md-1 col-sm-1"></div>
                                
                        {{-- Wifi --}}
                                <div class="col-md-2 col-sm-2">
                                    @if ($rooms->wifi)
                                        <h5>Wifi: Yes</h5>
                                    @else
                                        <h5>Wifi: No</h5>
                                    @endif
                                </div>
                                
                        {{-- AC --}}
                                <div class="col-md-2 col-sm-2">
                                    @if ($rooms->ac)
                                        <h5>AC: Yes</h5>
                                    @else
                                        <h5>AC: No</h5>
                                    @endif
                                </div>
                                
                        {{-- TV --}}
                                <div class="col-md-2 col-sm-2">
                                    @if ($rooms->tv)
                                        <h5>TV: Yes</h5>
                                    @else
                                        <h5>TV: No</h5>
                                    @endif
                                </div>

                        {{-- Taken --}}
                                <div class="col-md-2 col-sm-2">
                                    @if ($rooms->taken)
                                        <h5>Taken: Yes</h5>
                                    @else
                                        <h5>Taken: No</h5>
                                    @endif
                                
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-7 offset-lg-1">
                                    {!! Form::open(['action' => ['RoomsController@update', $rooms->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                                        <br>
                                        <div class="row ">
                                            <div class="col-lg-4" >
                                                {{ Form::label('wifi', "Wifi")}}
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div>
                                                        Yes:{{ Form::radio('wifi', '1')}}
                                                    </div>
                                                    <div class="col-lg-3"></div>
                                                    <div>
                                                        NO:{{ Form::radio('wifi', '0')}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-3"></div>
                                            <div class="form-group col-lg-4" >
                                                {{ Form::label('a/c', "A/C")}}
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div>
                                                        Yes:{{ Form::radio('a/c', '1')}}
                                                    </div>
                                                    <div class="col-lg-3"></div>
                                                    <div>
                                                        NO:{{ Form::radio('a/c', '0')}}
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
                                                        Yes:{{ Form::radio('tv', '1')}}
                                                    </div>
                                                    <div class="col-lg-3"></div>
                                                    <div>
                                                        NO:{{ Form::radio('tv', '0')}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-3"></div>
                                            <div class="form-group col-lg-4" >
                                                {{ Form::label('taken', "Taken")}}
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div>
                                                        Yes:{{ Form::radio('taken', '1')}}
                                                    </div>
                                                    <div class="col-lg-3"></div>
                                                    <div>
                                                        NO:{{ Form::radio('taken', '0')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-lg-4" >
                                                {{ Form::label('price', "Price")}}
                                                {{ Form::text('price', $rooms->price, ['class' => 'form-control', 'placeholder' =>'$'])}}
                                            </div>
                                            <div class="form-group col-lg-1"></div>
                                            <div class="form-group col-lg-6" >
                                                {{ Form::label('numberOfPeople', "Number of people")}}
                                                {{ Form::number('numberOfPeople', $rooms->numberOfPeople, ['class' => 'form-control' , 'placeholder' =>'Number of people', 'max'=>'6'])}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            {{Form::file('room_images')}}
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            {{Form::submit('Submit', ['class' =>'btn btn-primary col-md-2'])}}
                                            <div class="col-md-4"></div>
                                            <a href="/room" class="btn btn-success col-md-2">Go back</a>
                                        </div>
                                        {{Form::hidden('_method', 'PUT')}}

                                    {!! Form::close() !!}
                                    <br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection