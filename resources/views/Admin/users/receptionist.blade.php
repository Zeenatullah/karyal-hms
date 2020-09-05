@extends('layouts.receptionist')
@section('menu')
<div class="col-lg-10">
    <div class="nav-menu">
        <nav class="mainmenu">
            <ul>
                <li><a href="/home">Home</a></li>
                <li class="active"><a href="#">Receptionist</a></li>
                <li><a href="employee">Employee</a></li>
                <li><a href="room">Rooms</a></li>
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
                        <h2>Add Employee info</h2>
                        <p>It's required to insert information accuratly </p>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    @include('auth.register');
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section spad">
        <div class="container">   
            @if(count($users) > 0)
            @foreach ($users as $user)
                <div class="well align-items-center p-3 my-3 shadow-lg">
                    <div class="row">
                        <div class="col position-relative">
                            @if ($user->published)
                            <span class="position-absolute badge badge-success" style="top: 0; right: 10px">PUBLISHED</span>
                            @else
                            <span class="position-absolute badge badge-warning" style="top: 0; right: 10px">NOT PUBLISHED</span>
                            @endif
                             <h3><a href="/receptionist/{{$user->id}}">{{ $user->name }}</a></h3>
                            <small>Added on {{ $user->created_at }} </small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $users->links() }}
        @else
            <p>There is no Receptionist</p>
        @endif
        </div>
    </section>
    
    <!-- Contact Section End -->
@endsection