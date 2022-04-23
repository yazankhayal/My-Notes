@extends('layouts.home.app')

@section('css-header') navbar fixed-top navbar-expand-lg navbar-dark bg-tra hover-menu @endsection

@section('content')

    @include("index.hero",['intro'=>$intro])

    @include("index.services",['services'=>$services])

    @include("index.contact")

@endsection
