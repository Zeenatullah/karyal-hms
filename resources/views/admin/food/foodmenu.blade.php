@extends('layouts.receptionist')
@section('menu')
<div class="col-lg-10">
    <div class="nav-menu">
        <nav class="mainmenu">
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="receptionist">Receptionist</a></li>
                <li><a href="employee">Employee</a></li>
                <li><a href="room">Rooms</a></li>
                <li class="active"><a href="#">Food Menu</a></li>
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
                        <h2>Add Food </h2>
                        <p>It's required to insert information accuratly </p>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    {!! Form::open(['action' => 'FoodmenuController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        <br>
                        <div class="row">
                            <div class="dropdown col-lg-12 input-group">
                                <select class="btn btn-secondary dropdown-toggle col-lg-12" name="food_drink" required>
                                        <div class="dropdown-menu col-lg-12" aria-labelledby="dropdownMenuButton">
                                            <option selected disabled >Choose one</option>
                                            <a class="dropdown-item" href="#">
                                                <option value="drinkings">Drinkings</option>
                                                <option value="food">Food</option>
                                            </a>
                                        </div>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                {{ Form::label('foodName', "Food/Drink")}}
                                {{ Form::text('foodName', '', ['class' => 'form-control', 'placeholder' =>'Name'])}}
                            </div>
                            <div class="form-group col-lg-1"></div>
                            <div class="form-group col-lg-4">
                                {{ Form::label('foodPrice', "Food/Drink")}}
                                {{ Form::text('foodPrice', '', ['class' => 'form-control' , 'placeholder' =>'Price'])}}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {{Form::file('foodImage')}}
                        </div>
                        {{Form::submit('Submit', ['class' =>'btn btn-success'])}}
                    {!! Form::close() !!}  
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

        <section class="contact-section spad">
        <div class="container">   
            {{-- {{$foods->roomId}} --}}
            @if(count($foodMenu) > 0)
            @foreach ($foodMenu as $food)
                <div class="well align-items-center p-3 my-3 shadow-lg">
                    <div class="row">
                        <div class="col position-relative">
                            <span class="position-absolute badge badge-success" style="top: 0; right: 10px">PUBLISHED</span>
                            <span class="position-absolute badge badge-warning" style="top: 0; right: 10px">NOT PUBLISHED</span>
                             <h3><a href="/foodMenu/{{$food->id}}"> Name: {{ $food->foodName }}</a></h3>
                             <h3>Price: {{ $food->foodPrice }} Afs</h3>
                            <small>Added on {{ $food->created_at }} </small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- {{ $foodmenu->links() }} --}}
        {{-- @else --}}
            {{-- <p>There is no Receptionist</p> --}}
        @endif
        </div>
    </section>
@endsection