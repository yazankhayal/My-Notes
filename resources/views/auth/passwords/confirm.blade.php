@extends('layouts.home.app')

@section('css-header') navbar fixed-top navbar-expand-lg navbar-dark bg-tra hover-menu @endsection

@section('title')
    Confirm Password
@endsection

@section('form')
    {{ __('Please confirm your password before continuing.') }}
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="row mb-3">
            <label for="password"
                   class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-12">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Password"
                       name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-md btn-theme theme-hover submit">
                    {{ __('Confirm Password') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="nav-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection

@section('content')
    @include("auth.master")
@endsection
