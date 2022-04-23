@extends('layouts.panel.app')

@section('title')
    Profile ( {{user()->name}} )
@endsection

@section('link') {{route('home')}} @endsection
@section('name-link') <i class="fa fa-dashcube"></i> Go to Dashboard @endsection

@section('content')

    <h2 class="main-container-heading">@yield('title')</h2>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="ajaxForm update" enctype="multipart/form-data" data-name="update"
                      action="{{route('profile.update')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-header">All fields are required for the note to be created for you.</div>
                    <div class="card-body">
                        <div class="row">
                            @include("inputs.input",['id' => 'name','name' => 'Name','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','value'=> user()->name])
                            @include("inputs.input",['id' => 'email','name' => 'Email','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','value'=> user()->email])

                            @include("inputs.password",['id' => 'password','name' => 'Password','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6'])
                            @include("inputs.password",['id' => 'password_confirmation','name' => 'Password Confirmation','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btm-sm" type="submit">
                            <i class="fa fa-check-circle"></i> Submit!!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
