<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
                Achievement System
        </title>
        <link rel="stylesheet" href="{{ asset('css/default.css') }}">
        @yield('css')
    </head>
    <body>
        <header>
            <h1>
                <a href="{{ route('welcome') }}">
                    Achievement System
                </a>
            </h1>
            <nav>
                <ul>
                    @auth
                        <ul>
                            <li>
                                <a href="/dashboard">Home</a> </li>
                            <li>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    @endauth
                    @guest
                    <li>
                        <a href="/login">Login</a>
                    </li>
                    <li>
                        <a href="/register">Register</a>
                    </li>
                    @endguest
                </ul>
            </nav>
        </header>