@extends('layouts.home.app')

@section('css-header') navbar fixed-top navbar-expand-lg navbar-dark bg-tra hover-menu @endsection

@section('title')
    Login
@endsection

@section('form')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-12">
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror" name="email"
                       placeholder="Email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Password"
                       name="password"
                       required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <a class="nav-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-md btn-theme theme-hover submit">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
    </form>
@endsection

@section('content')
    @include("auth.master")
@endsection
