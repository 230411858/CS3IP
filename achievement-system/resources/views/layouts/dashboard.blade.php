@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('css')
@overwrite

@section('content')
    <h1>
        Welcome {{ Auth::user()->name }}, you are a{{ preg_match('/^[aeiou]/i', Auth::user()->type[0]) === 1 ? 'n' : '' }} {{ ucfirst(Auth::user()->type) }}
    </h1>
    <br>
    @if ($errors->any())
        <section>
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="error">
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @elseif (session()->has('success'))
        <section>
            <div>
                <ul>
                    <li class="success">
                        {{ session('success') }}
                    </li>
                </ul>
            </div>
        </section>
    @endif
    @yield('content')
@overwrite