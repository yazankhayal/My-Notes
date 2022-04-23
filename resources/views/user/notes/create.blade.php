@extends('layouts.panel.app')

@section('title')
    Create new Note
@endsection

@section('link') {{route('notes.index')}} @endsection
@section('name-link') <i class="fa fa-edit"></i> All Notes @endsection

@section('content')

    <h2 class="main-container-heading">@yield('title')</h2>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <form class="ajaxForm insert" enctype="multipart/form-data" data-name="insert"
                      action="{{route('notes.post_data')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-header">All fields are required for the note to be created for you.</div>
                    <div class="card-body">
                        <div class="row">
                            @include("inputs.input",['id' => 'name','name' => 'Name','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6'])
                            @include("inputs.input_tags",['id' => 'tags','name' => 'Tags','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6'])
                            @include("inputs.textarea",['id' => 'body','name' => 'Content.....'])
                            @include("inputs.select",['id' => 'type','name' => 'Type of...','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','lists'=> listTypes()])
                            @include("inputs.select",['id' => 'status','name' => 'Status','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','lists'=> listStatus() , 'active' => 1])
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
