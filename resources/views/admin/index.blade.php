@extends('layouts.receptionist')
@section('menu')
<div class="col-lg-10">
    <div class="nav-menu">
        <nav class="mainmenu">
            <ul>
                <li class="active"><a href="/home">Home</a></li>
                <li><a href="receptionist">Receptionist</a></li>
                <li><a href="employee">Employee</a></li>
                <li><a href="rooms">Rooms</a></li>
                <li><a href="foodMenu">Food Menu</a></li>
            </ul>
        </nav>
        <div class="nav-right search-switch">
            <i class="icon_search"></i>
        </div>
    </div>
</div>
@endsection