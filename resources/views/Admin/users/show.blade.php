@extends('layout.admin')
@section('content')
<br><br>
    <a href="/receptionist" class="btn btn-primary col-md-2">Go back</a>
    <br><br>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h3>Name: {{$post->name}}</h3>   
            <h3>Email: {{$post->email}}</h3>   
            <h3>User: {{$post->user_type}}</h3>   
            <small>Added on {{ $post->created_at }} </small>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <a href="/receptionist/{{$post->id}}/edit" class="btn btn-success col-md-6">Edit</a>
        </div>
        <div class="col-md-6">
            {!! Form::open(['action' => ['ReceptionistController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger col-md-3'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection