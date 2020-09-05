@extends('layout.admin')
@section('content')
<br><br>
    <a href="/foodMenu" class="btn btn-primary col-md-2">Go back</a>
    <br><br>
    <div class="row">

    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <h3>Name: {{ $foodMenu->foodName }}</h3>
            <h3>Price: {{ $foodMenu->foodPrice }} Afs</h3>
            <small>Added on {{ $foodMenu->created_at }} </small>
            <hr>
            <a href="/foodMenu/{{$foodMenu->id}}/edit" class="btn btn-success col-md-6">Edit</a>
        </div>
        <div class="col-md-6">
            {{-- {!! Form::open(['action' => ['RoomsController@destroy', $rooms->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger col-md-3'])}}
            {!! Form::close() !!} --}}
        </div>
    </div>
@endsection