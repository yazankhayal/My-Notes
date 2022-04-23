<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    @include("layouts.panel.css")
    @yield("css")
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{route('profile')}}">{{user()->name}}</a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="{{route('sign_out')}}">Sign out</a>
        </div>
    </div>
    <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
    </button>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Main Menu</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{current_route('index')}}" aria-current="page" href="{{route('index')}}">
                            <span class="fa fa-globe"></span>
                            View Website
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{current_route('home')}}" aria-current="page" href="{{route('home')}}">
                            <span class="fa fa-dashcube"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{current_route('notes.index')}}" href="{{route('notes.index')}}">
                            <span class="fa fa-list"></span>
                            Notes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{current_route('reminder.index')}}" href="{{route('reminder.index')}}">
                            <span class="fa fa-list-alt"></span>
                            Reminders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{current_route('to_do_list.index')}}" href="{{route('to_do_list.index')}}">
                            <span class="fa fa-list-ol"></span>
                            To Do List
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Account Setting</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{current_route('profile')}}" href="{{route('profile')}}">
                            <span class="fa fa-user"></span>
                            Profile
                        </a>
                    </li>

                    @if(user()->type === 'ADMIN')
                        <li class="nav-item">
                            <a class="nav-link {{current_route('setting')}}" href="{{route('setting')}}">
                                <span class="fa fa-cogs"></span>
                                Setting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{current_route('intro')}}" href="{{route('intro')}}">
                                <span class="fa fa-info-circle"></span>
                                Intro
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{current_route('services.index')}}" href="{{route('services.index')}}">
                                <span class="fa fa-server"></span>
                                Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{current_route('pages.index')}}" href="{{route('pages.index')}}">
                                <span class="fa fa-file"></span>
                                Pages
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sign_out')}}">
                            <span class="fa fa-lock"></span>
                            Sign Out
                        </a>
                    </li>
                </ul>


            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">

            <div class="main-container">
                @include("layouts.panel.breadcrumb")
                @yield("content")
            </div>

        </main>
    </div>
</div>

<div class="modal" tabindex="-1" id="ModDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete This</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{csrf_field()}}
                <input id="iddel" name="id" type="hidden">
                <input id="iddel2" name="id2" type="hidden">
                <input id="iddelcid" name="cid" type="hidden">
                <input id="iddeltype" name="type" type="hidden">
                <input id="url" name="url" type="hidden">
                <p class="text-danger">
                    Are You Sure To Delete This??
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,Close it.</button>
                <button type="button" class="btn_deleted btn btn-primary">Yes.</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="popModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,Close it.</button>
            </div>
        </div>
    </div>
</div>

@include("layouts.panel.js")
@yield("js")
</body>
</html>
