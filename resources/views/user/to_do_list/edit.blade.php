@extends('layouts.panel.app')

@section('title')
    Edit ( {{$toDoList->name}} )
@endsection

@section('link') {{route('to_do_list.index')}} @endsection
@section('name-link') <i class="fa fa-edit"></i> All To Do Listss @endsection

@section('content')

    <h2 class="main-container-heading">@yield('title')</h2>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <form class="ajaxForm insert" enctype="multipart/form-data" data-name="insert"
                      action="{{route('to_do_list.post_data')}}" method="post">
                    {{csrf_field()}}
                    <input id="id" name="id" type="hidden" value="{{$toDoList->id}}">
                    <div class="card-header">All fields are required for the To Do Lists to be created for you.</div>
                    <div class="card-body">
                        <div class="row">
                            @include("inputs.input",['id' => 'name','name' => 'Name','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','value' => $toDoList->name])
                            @include("inputs.date_normal",['id' => 'date','name' => 'Date','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','value' => $toDoList->date])
                            @include("inputs.input_tags",['id' => 'body','name' => 'Body ( The first task , The second task)','col' => 'col-xs-12 col-md-12 col-lg-12 col-xl-12','value' => $toDoList->body])
                            @include("inputs.select",['id' => 'type','name' => 'Priority','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','lists'=> listPriority(),'active' => $toDoList->type])
                            @include("inputs.select",['id' => 'status','name' => 'Status','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','lists'=> listStatus() , 'active' => $toDoList->status])
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
