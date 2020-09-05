@extends('layout.admin')
    @section('content')
        <h1>Edit Receptionist</h1>   
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            {!! Form::open(['action' => ['ReceptionistController@update', $post->id], 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
                            {{-- <form method="POST" action="ReceptionistController@update" > --}}
                                @csrf
        {{-- Name --}}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $post->name}}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

        {{-- Email --}}

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $post->email }}" required autocomplete="email" placeholder="{{$post->email}}">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        {{-- User type --}}

                                <div class="form-group row">
                                    <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User type') }}</label>
                                    
                                    <div class="col-md-6">
                                        {{-- <input id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}" required autocomplete="user_type"> --}}
                                        
                                        <select class="custom-select" id="user_type"  class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ $post->user_type }}" required autocomplete="user_type">
                                        <option selected disabled>{{"$post->user_type"}}</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Receptionist">Receptionist</option>
                                        </select>
                                        
                                        @error('user_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        {{-- Password --}}

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="{{$post->password}}">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        {{-- Confirmation --}}

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-5 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    <div>
                                        <a href="/dboard/users" class="btn btn-success ">Go back</a>


                                    </div>
                                </div>
                                {{Form::hidden('_method', 'PUT')}}
                            {!! Form::close() !!}   
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection