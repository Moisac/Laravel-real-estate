<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>@yield('page_title', 'Imobiliare.ro')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@yield('title', 'Imobiliare.ro')</title>
</head>
<body>
    <div id="app">
    <!--Navigation -->         

    <nav>
            <div class="flex justify-between px-10 pt-4 relative w-full bg-black-100">
                

                <div class="collapse navbar-collapse flex-1" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="flex">
                        <!-- Authentication Links -->
                        @guest
                            <li class="px-5">
                                <a class="text-white bg-blue-900 rounded px-5 py-2 uppercase shadow-xl" href="{{ route('login') }}">Logare</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a id="creare-cont" class="text-white bg-third-900 rounded px-5 py-2 uppercase shadow-xl" href="{{ route('register') }}">Cont nou</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown flex">
                             <img class="rounded-full mr-3" width="30" src="/uploads/avatars/{{ Auth::user()->avatar }}" />
                                <a id="navbarDropdown" class="text-white uppercase" href="/admin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
               
               <div class="flex-1">
                     <a class="navbar-brand pb-2" href="{{ url('/') }}">
                    <img width="50" src="{{ asset('uploads/frontend/logo.png') }}" />
                </a>
               </div>

                <nav class="navbar">
                    <span class="open-slide">
                        <a href="#" onclick="openSlideMenu()">
                            <svg width="30" height="30">
                        <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
                        <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
                        <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
                    </svg>
                        </a>
                    </span>

                </nav>

                <div class="side-nav" id="side-menu">
                    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
                    <ul class="main-nav">
                        <li><a class="text-lg text-white weight-bold mx-5 {{ request()->is('/') ? 'active' : '' }}" href="/">Acasa</a></li>
                        <li><a class="text-lg text-white weight-bold mx-5 {{ request()->is('anunturi') ? 'active' : '' }}" href="/anunturi">Anunturi</a></li>
                        <li class="menu-level1"><a class="text-lg text-white weight-bold mx-5 {{ request()->is('apartamente', 'apartamente-de-inchiriat', 'apartamente-de-vanzare') ? 'active' : '' }}" href="/apartamente">Apartamente</a>
                            <ul class="menu-level2">
                            <li><a class="text-lg text-white weight-bold mx-3" href="/apartamente-de-inchiriat">Inchiriere</a></li>
                            <li><a class="text-lg text-white weight-bold mx-3" href="/apartamente-de-vanzare">Vanzare</a></li>
                        </ul>
                        </li>
                        
                    
                        <li class="menu-level1"><a class="text-lg text-white weight-bold mx-5 {{ request()->is('garsoniere', 'garsoniere-de-vanzare', 'garsoniere-de-inchiriat') ? 'active' : '' }}" href="/garsoniere">Garsoniere</a>
                            <ul class="menu-level2">
                            <li><a class="text-lg text-white weight-bold mx-3" href="/garsoniere-de-inchiriat">Inchiriere</a></li>
                            <li><a class="text-lg text-white weight-bold mx-3" href="/garsoniere-de-vanzare">Vanzare</a></li>
                        </ul>
                        </li>
                        

                        <li class="menu-level1"><a class="text-lg text-white weight-bold mx-5 {{ request()->is('case', 'case-de-inchiriat', 'case-de-vanzare') ? 'active' : '' }}" href="/case">Case</a>
                            <ul class="menu-level2">
                            <li><a class="text-lg text-white weight-bold mx-3" href="/case-de-inchiriat">Inchiriere</a></li>
                            <li><a class="text-lg text-white weight-bold mx-3" href="/case-de-vanzare">Vanzare</a></li>
                        </ul>
                        </li>
                        
                        

                        <li><a class="text-lg text-white weight-bold mx-5 {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a></li>
                    </ul>
	        </div>

                
            </div>
        </nav>
        <!--End navigation -->

        <main>
            @yield('content')
        </main>
    </div>

    @include('footer')
    @include('sweetalert::alert')
<script>
		function openSlideMenu(){
			document.getElementById('side-menu').style.width = '250px';
			document.getElementById('main').style.marginLeft = '250px';
		}

		function closeSlideMenu(){
			document.getElementById('side-menu').style.width = '0';
			document.getElementById('main').style.marginLeft = '0';
		}
	</script>
</body>
</html>
