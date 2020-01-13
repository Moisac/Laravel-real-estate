<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Imobiliare') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>


    @if (session('toast_success'))
        <div class="alert alert-success">
            {{ session('toast_success') }}
        </div>
    @endif

    <div id="app">
        <nav>
            <div class="flex justify-between px-10 bg-blue-800 p-3">
                <a class="navbar-brand pb-2" href="{{ url('/') }}">
                    <img width="50" src="{{ asset('uploads/frontend/logo.png') }}" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="flex">
                        <!-- Authentication Links -->
                        @guest
                            <li class="px-5">
                                <a class="text-white bg-gray-900 rounded px-5 py-2 uppercase shadow-xl" href="{{ route('login') }}">Logare</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="text-white bg-secondary-900 rounded px-5 py-2 uppercase shadow-xl" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown flex">
                             <img class="rounded-full w-10 mr-3" src="/uploads/avatars/{{ Auth::user()->avatar }}" />
                                <a id="navbarDropdown" class="text-white text-xl uppercase" href="/admin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="text-white float-right pl-3" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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

        <main class="py-7">
            <div class="flex">

            @section('admin-sidebar')

                <div class="w-2/12 xs:w-12/12 bg-gray-900 text-white p-5 mr-6 h-screen">
                    <ul class="text-lg tracking-wider">
                        <li class="my-5 p-1 rounded-sm {{ request()->is('admin') ? 'active-admin' : '' }}"><a href="{{ route('admin') }}"><i class="fas fa-chart-line text-2xl"></i> Dashboard</a></li>
                        <li class="my-5 p-1 rounded-sm {{ request()->is('admin/profile') ? 'active-admin' : '' }}"><a href="{{ route('users.profile') }}"><i class="far fa-user-circle text-2xl"></i> Editeaza profil</a></li>
                        @if(Auth::user()->hasRole('admin'))
                        <li class="my-5 p-1 rounded-sm {{ request()->is('admin/users') ? 'active-admin' : '' }}"><a href="{{ route('users.index') }}"><i class="fas fa-users-cog text-2xl"></i> Utilizatori</a></li>
                        @endif
                        <li class="my-5 p-1 rounded-sm {{ request()->is('admin/posts') ? 'active-admin' : '' }}"><a href="{{ route('posts.index') }}"><i class="fas fa-vote-yea text-2xl"></i> Anunturile mele</a></li>
                        <li class="my-5 p1"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt text-2xl"></i> Iesi din cont</a></li>
                    </ul>
                </div>
            @show
                <div class="w-10/12 xs:12/12">
                    @yield('content')
                </div>

            </div>
        </main>
    </div>

    @include('sweetalert::alert')


</body>
</html>
