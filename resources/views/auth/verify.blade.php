@extends('layouts.home.app')

@section('css-header') navbar fixed-top navbar-expand-lg navbar-dark bg-tra hover-menu @endsection

@section('title')
    Verify Account
@endsection

@section('form')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif
    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit"
                class="btn btn-md btn-theme theme-hover submit">{{ __('click here to request another') }}</button>
        .
    </form>
@endsection

@section('content')
    @include("auth.master")
@endsection
