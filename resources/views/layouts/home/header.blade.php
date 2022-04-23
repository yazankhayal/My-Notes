@php $setting = setting(); @endphp
@if($setting)
    <header id="header" class="header">
        <nav class="@yield("css-header")">
            <div class="container">


                <!-- LOGO IMAGE -->
                <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 268 x 60 pixels) -->
                <a href="{{route('index')}}" class="navbar-brand logo-black"><img src="{{$setting->logo_black()}}"
                                                                                  width="134"
                                                                                  height="30"
                                                                                  alt="{{$setting->name}}"></a>
                <a href="{{route('index')}}" class="navbar-brand logo-white"><img src="{{$setting->logo_white()}}"
                                                                                  width="134"
                                                                                  height="30" alt="{{$setting->name}}"></a>


                <!-- Responsive Menu Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-bar-icon"><i class="fas fa-bars"></i></span>
                </button>


                <!-- Navigation Menu -->
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item nl-simple"><a class="nav-link" href="#services-2">What We Do</a></li>
                        <li class="nav-item nl-simple"><a class="nav-link" href="#contacts-1">Contact</a></li>

                        <!-- Dropdown Link -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(user())
                                    {{user()->name}}
                                @else
                                    Account ( Login / Register )
                                @endif
                            </a>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @guest
                                    @if (Route::has('login'))
                                        <li>
                                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li>
                                            <a class="dropdown-item"
                                               href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a class="dropdown-item" href="{{ route('home') }}">Profile Page</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </li>

                    </ul>

                    <!-- Header Social Icons -->
                    <span class="navbar-text">
								<span class="header-socials clearfix">
                                    {!! $setting->social1() !!}
								</span>
						    </span>

                    <!-- Header Button
                    <span class="navbar-text white-color">
                      <a href="#" class="btn btn-tra-white green-hover">Let's Started</a>
                  </span>	-->

                </div>    <!-- End Navigation Menu -->


            </div>      <!-- End container -->
        </nav>       <!-- End navbar -->
    </header>    <!-- END HEADER -->
@endif
