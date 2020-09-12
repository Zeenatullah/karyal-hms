@extends('website.layout.layout')

@section('menu')
    <div class="menu-item" style="background-color: lightblue; border: 1px solid black; border-radius: 50px;">
        <div class="container">
            <div class="row users-frm">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                    <div class="nav-menu {{ app()->getLocale() === 'ps' ? 'text-align' : 'text-center' }}" style="height: 80px;">
                        <nav class="mainmenu users-frm">
                            <ul>
                                <li><a href="/"><b>@lang('text.Home')</b></a></li>
                                <li><a href="/rooms"><b>@lang('text.Rooms')</b></a></li>
                                <li><a href="/foods"><b>@lang('text.Food Menu')</b></a>
                                    <ul class="dropdown" style="border-radius: 5px; background-color: #d3d3d3c7">
                                        <li><a href="/foods" class="{{ app()->getLocale() === 'ps' ? 'text-right m-0' : '' }} ">@lang('text.Foods')</a></li>
                                        <li><a href="/drinkings" class="{{ app()->getLocale() === 'ps' ? 'text-right m-0' : '' }} ">@lang('text.Drinkings')</a></li>
                                    </ul>
                                </li>
                                <li><a href="/services"><b>@lang('text.Services')</b></a></li>
                                <li><a href="/contact"><b>@lang('text.Contacts')</b></a></li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}"><b>@lang('text.Login')</b></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contents')
    <br><br><br>
    <div class="container">
        <div class="row justify-content-center text-align">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('text.Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('text.Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('text.Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}

                                        <label class="form-check-label" for="remember">
                                            {{-- {{ __('Remember Me') }} --}}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('text.Submit') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        {{-- <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
                                            {{-- {{ __('Forgot Your Password?') }} --}}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <br><br><br>

@endsection
