<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Your website description">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="author" content="Your Name">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        .navbar {
            background-color: #4a5568;
            color: #ffffff;
            padding: 1rem;
        }

        .navbar a {
            color: #ffffff;
            text-decoration: none;
            padding: 0.5rem 1rem;
        }

        .navbar a:hover {
            text-decoration: underline; 
        }

        .navbar a.active {
            font-weight: bold; 
        }

        footer {
            background-color: #2d3748; 
            color: #ffffff;
            padding: 1rem;
            text-align: center;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="navbar">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="space-x-4" aria-label="Main Navigation">
                    <a class="no-underline @if(Request::is('/')) active @endif" href="/">Home</a>
                    <a class="no-underline @if(Request::is('blog')) active @endif" href="/blog">Blog</a>
                    @guest
                        <a class="no-underline @if(Request::is('login')) active @endif" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline @if(Request::is('register')) active @endif" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>
        <div>
            @yield('content')
        </div>
        <footer>
            <div class="container mx-auto">
                @include('layouts.footer')
            </div>
        </footer>
    </div>
</body>
</html>
