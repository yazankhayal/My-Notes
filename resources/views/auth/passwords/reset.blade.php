@extends('layouts.home.app')

@section('css-header') navbar fixed-top navbar-expand-lg navbar-dark bg-tra hover-menu @endsection

@section('title')
    Reset Password
@endsection

@section('form')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="row mb-3">
            <div class="col-md-12">
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror" name="email"
                       placeholder="Email"
                       value="{{ $email ?? old('email') }}" required autocomplete="email"
                       autofocus>

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
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control"
                       placeholder="New Password"
                       name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-md btn-theme theme-hover submit">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
@endsection

@section('content')
    @include("auth.master")
@endsection
