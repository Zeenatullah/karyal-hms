@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
{{-- Name --}}
                        <div class="form-group row">
                            <label for="name" class=" col-md-2 {{ App::getLocale() === 'ps' ? 'col-md-offset-1' : 'col-md-4' }} col-form-label text-md-right">@lang('text.Name')</label>

                            <div class="col-md-6 col-lg-">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{-- Email --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-2 {{ App::getLocale() === 'ps' ? 'col-md-offset-1' : 'col-md-4' }} col-form-label text-md-right">@lang('text.Email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- User type --}}

                        <div class="form-group row">
                            <label for="user_type" class="col-md-2 {{ App::getLocale() === 'ps' ? 'col-md-offset-1' : 'col-md-4' }} col-form-label text-md-right">@lang('text.UserType')</label>
                            
                            <div class="col-md-6">
                                {{-- <input id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}" required autocomplete="user_type"> --}}
                                
                                <select class="custom-select" id="user_type"  class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}" required autocomplete="user_type">
                                    <option selected disabled>@lang('text.SelectOne')</option>
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
                            <label for="password" class="col-md-2 {{ App::getLocale() === 'ps' ? 'col-md-offset-1' : 'col-md-4' }} col-form-label text-md-right">@lang('text.Password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- Confirmation --}}

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 {{ App::getLocale() === 'ps' ? 'col-md-offset-1' : 'col-md-4' }} col-form-label text-md-right">@lang('text.PasswordConfirmation')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('text.Register')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
