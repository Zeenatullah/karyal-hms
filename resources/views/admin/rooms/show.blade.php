@extends('layout.admin')
@section('content')
<br><br>
    <a href="/room" class="btn btn-primary col-md-2">Go back</a>
    <br><br>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h3>ID: {{$rooms->id}}</h3>   
            <h3>Price: {{$rooms->price}} afs</h3>   
            {{-- Wifi --}}
            @if ($rooms->wifi)
                <h3>Wifi: Yes</h3>
            @else
                <h3>Wifi: No</h3>
            @endif

            {{-- AC --}}
            @if ($rooms->ac)
                <h3>AC: Yes</h3>
            @else
                <h3>AC: No</h3>
            @endif

            {{-- TV --}}
            @if ($rooms->tv)
                <h3>TV: Yes</h3>
            @else
                <h3>TV: No</h3>
            @endif

            {{-- Taken --}}
            @if ($rooms->taken)
                <h3>Taken: Yes</h3>
            @else
                <h3>Taken: No</h3>
            @endif
            <h3>Maximum Number of people : {{$rooms->numberOfPeople}}</h3>   
            <small>Added on {{ $rooms->created_at }} </small>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <a href="/room/{{$rooms->id}}/edit" class="btn btn-success col-md-6">Edit</a>
        </div>
        <div class="col-md-6">
            {{-- {!! Form::open(['action' => ['RoomsController@destroy', $rooms->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger col-md-3'])}}
            {!! Form::close() !!} --}}
        </div>
    </div>
@endsection