<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
                Achievement System
        </title>
        <link rel="stylesheet" href="{{ asset('css/default.css') }}">
        @yield('css')
        @yield('js')
    </head>
    <body>
        <header>
            <h1>
                <a href="{{ route('welcome') }}">
                    Achievement System
                </a>
            </h1>
            <nav>
                <div id="breadcrumbs">
                        @yield('breadcrumbs')
                </div>
                <div id="header-links">
                        @auth
                            <a href="{{ route('dashboard') }}">Home</a>
                            <a href="{{ route('settings') }}">Settings</a>
                            <a href="{{ route('logout') }}">Logout</a>
                        @endauth
                        @guest
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>