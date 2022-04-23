@extends('layouts.panel.app')

@section('title')
    My Dashboard
@endsection

@section('link') {{route('notes.create')}} @endsection
@section('name-link') <i class="fa fa-edit"></i> Create new Note @endsection

@section('content')

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6">
            <h5 class="main-container-heading">Last Reminder Today.</h5>
            @if(count($reminderToday) == 0)
                <div class="alert-danger alert">No data has been entered yet.</div>
            @endif
            <ol class="list-group list-group-numbered">
                @foreach($reminderToday as $reminder)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><span style="margin-right:5px"
                                                       class="fa fa-circle-o {{$reminder->type}}"></span>{{$reminder->name}}
                            </div>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{$reminder->date}}</span>
                    </li>
                @endforeach
            </ol>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6">
            <h5 class="main-container-heading">Last To Do List Today.</h5>
            @if(count($toDoLists) == 0)
                <div class="alert-danger alert">No data has been entered yet.</div>
            @endif
            <ol class="list-group list-group-numbered">
                @foreach($toDoLists as $toDoList)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><span style="margin-right:5px"
                                                       class="fa fa-circle-o {{$toDoList->type}}"></span>{{$toDoList->name}}
                            </div>
                            {!! $toDoList->Tags() !!}
                        </div>
                        <span class="badge bg-primary rounded-pill">{{$toDoList->date}}</span>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
    <h5 class="main-container-heading1">Last (6) Notes.</h5>
    <div class="row">
        @if(count($notes) == 0)
            <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-danger alert">No data has been entered yet.</div>
            </div>
        @endif
        @foreach($notes as $note)
            <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4">
                <div class="card card-notes {{$note->type}} mb-3">
                    <div class="card-header">
                        {{$note->name}}
                        <button type="button" class="btn {{$note->type}} btn-sm btn-details"
                                data-href="{{route('notes.details',['id'=>$note->id])}}">Details <i
                                class="fa fa-list"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
