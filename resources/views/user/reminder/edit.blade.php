@extends('layouts.panel.app')

@section('title')
    Edit ( {{$reminder->name}} )
@endsection

@section('link') {{route('reminder.index')}} @endsection
@section('name-link') <i class="fa fa-edit"></i> All Reminders @endsection

@section('content')

    <h2 class="main-container-heading">@yield('title')</h2>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <form class="ajaxForm insert" enctype="multipart/form-data" data-name="insert"
                      action="{{route('reminder.post_data')}}" method="post">
                    {{csrf_field()}}
                    <input id="id" name="id" type="hidden" value="{{$reminder->id}}">
                    <div class="card-header">All fields are required for the Reminder to be created for you.</div>
                    <div class="card-body">
                        <div class="row">
                            @include("inputs.input",['id' => 'name','name' => 'Name','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','value' => $reminder->name])
                            @include("inputs.date",['id' => 'date','name' => 'Date','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','value' => $reminder->date])
                            @include("inputs.select",['id' => 'type','name' => 'Priority','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','lists'=> listPriority(),'active' => $reminder->type])
                            @include("inputs.select",['id' => 'status','name' => 'Status','col' => 'col-xs-12 col-md-12 col-lg-6 col-xl-6','lists'=> listStatus() , 'active' => $reminder->status])
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
