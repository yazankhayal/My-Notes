@extends('layouts.panel.app')

@section('title')
    Setting
@endsection

@section('link') {{route('home')}} @endsection
@section('name-link') <i class="fa fa-dashcube"></i> Go to Dashboard @endsection

@section('content')

    <h2 class="main-container-heading">@yield('title')</h2>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="ajaxForm update" enctype="multipart/form-data" data-name="update"
                      action="{{route('setting.update')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-header">All fields are required for the note to be created for you.</div>
                    <div class="card-body">
                        <div class="row">
                            @include("inputs.input",['id' => 'name','name' => 'Name','col' => 'col-12','value'=> $item ? $item->name : null])
                            @include("inputs.file",['id' => 'logo_white','name' => 'Logo White','value' => $item ? $item->logo_white : null])
                            @include("inputs.file",['id' => 'logo_black','name' => 'Logo Black','value' => $item ? $item->logo_black : null])
                            @include("inputs.textarea",['id' => 'body','name' => 'Body','value' => $item ? $item->body : null])
                            @include("inputs.input_tags",['id' => 'social','name' => 'Social links (facebook @ link)','col' => 'col-xs-12 col-md-12 col-lg-12 col-xl-12','value' => $item ? $item->social : null])

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
