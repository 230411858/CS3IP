@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('css')
@overwrite

@section('content')
    <h1>
        Welcome {{ Auth::user()->name }}, you are a{{ preg_match('/^[aeiou]/i', Auth::user()->type()->value[0]) === 1 ? 'n' : '' }} {{ ucfirst(Auth::user()->type()->value) }}
    </h1>
    <br>
    <section>
    @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="error">
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
        @elseif (session()->has('success'))
            <div>
                <ul>
                    <li class="success">
                        {{ session('success') }}
                    </li>
                </ul>
            </div>
        @endif
    </section>
    @yield('content')
@overwrite