<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> -->
            <!-- <div class="container"> -->
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> -->
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="flex min-h-screen bg-gray-100">
            <!-- Sidebar -->
            @auth {{-- Hide sidebar when not authenticated --}}
                @if (!in_array(Route::currentRouteName(), ['login', 'register', 'password.request', 'password.reset']))
                <aside class="w-64 bg-white shadow-md p-6 flex flex-col gap-6 min-h-screen">
                    <div class="text-2xl font-bold text-blue-500 mb-8">
                        @auth('apprenant')
                            Espace Apprenant
                        @endauth
                        @auth('formateur')
                            Espace Formateur
                        @endauth
                    </div>
                    <nav class="flex-1">
                        <ul class="space-y-2">
                            @auth('formateur') {{-- Only show this link for formateurs --}}
                            <li>
                                <a href="{{ route('formateur.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 transition-all duration-150">
                                    <!-- User group icon (outline) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-2.13a4 4 0 10-8 0 4 4 0 008 0zm6 2a4 4 0 00-3-3.87" />
                                    </svg>
                                    <span>Tableau des apprenants</span>
                                </a>
                            </li>
                            @endauth
                            @auth('apprenant') {{-- Only show this link for formateurs --}}
                            <li>
                                <a href="{{ route('Apprenant.courses.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-blue-600  hover:bg-blue-100 transition-all duration-150">
                                    <!-- Book icon (outline) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.5v11M17.5 10L22 14.5M2 14.5l4.5-4.5M10.5 5.5L15 10m-4.5 9L9 16m9.5 0l4.5-4.5"/>
                                    </svg>
                                    <span>Toutes les Formations</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('Apprenant.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-blue-600  hover:bg-blue-100 transition-all duration-150">
                                    <!-- User group icon (outline) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-2.13a4 4 0 10-8 0 4 4 0 008 0zm6 2a4 4 0 00-3-3.87" />
                                    </svg>
                                    <span>Tableau de bord</span>
                                </a>
                            </li>
                            @endauth
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100 transition-all duration-150 w-full text-left">
                                        <!-- Logout icon (outline) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                                        </svg>
                                        <span>Déconnexion</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </aside>
                @endif
            @endauth {{-- End hide sidebar when not authenticated --}}

            <!-- Main Content -->
            <main class="flex-1 py-4 px-8 overflow-x-hidden">
                @yield('content')
            </main>
        </div>
    </div>
    @yield('scripts')
</body>
</html>
