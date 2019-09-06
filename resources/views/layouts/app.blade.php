<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Prodigy Blogger') }}</title> -->

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/author-blade/author-blade.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome-blade/welcome-blade.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Prodigy Blogger') }}
                </a> -->
                <a class="navbar-brand " href="{{ url('/') }}">Prodigy Blogger</a>
                <Search :posts="{{ $posts }}"></Search>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->   
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item ">
                                <img style="height: 20px; width: 20px; border-radius: 50px; margin-top: 10px;" class="rounded-circles" src="{{ Storage::url(auth()->user()->profile->avatar) }}">
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->profile->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!-- Profile -->
                                    <a class="dropdown-item" href="{{ url('/profile') }}">
                                        {{ __('Profile') }}
                                    </a>

                                    <!-- Post -->
                                     <a class="dropdown-item" href="{{url('/my_post')}}">
                                        {{ __('My Posts') }}
                                    </a>
                                      <!-- Post -->
                                     <a class="dropdown-item" href="{{ url('create/post') }}">
                                        {{ __('Add Post') }}
                                    </a>
                                    @if(auth()->check() && auth()->user()->hasRole('admin'))
                                    <a class="dropdown-item" href="{{ url('/dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                    @endif
                                    
                                    <!-- Logout -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')


        </main>
    </div>


    <!-- Bootstrap tags input -->
    <script src="{{mix('js/app.js')}}" ></script>
    <script src="{{asset('/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('/js/readtime/readtime.js')}}"></script>
    <script src="{{asset('/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('/js/tinymce/tinymceInit.js')}}"></script>
    @yield('custom_scripts')

</body>

</html>
