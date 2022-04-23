@extends('layouts.panel.app')

@section('title')
    Edit ( {{$services->name}} )
@endsection

@section('link') {{route('services.index')}} @endsection
@section('name-link') <i class="fa fa-edit"></i> All Services @endsection

@section('content')

    <h2 class="main-container-heading">@yield('title')</h2>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <form class="ajaxForm insert" enctype="multipart/form-data" data-name="insert"
                      action="{{route('services.post_data')}}" method="post">
                    {{csrf_field()}}
                    <input id="id" name="id" type="hidden" value="{{$services->id}}">
                    <div class="card-header">All fields are required for the To Do Lists to be created for you.</div>
                    <div class="card-body">
                        <div class="row">

                            @include("inputs.input",['id' => 'name','name' => 'Name','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','value' => $services->name])
                            @include("inputs.input",['id' => 'icon','name' => 'Icon','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','value' => $services->icon])
                            @include("inputs.textarea",['id' => 'body','name' => 'Body','col' => 'col-xs-12 col-md-12 col-lg-12 col-xl-12','value' => $services->body])

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
