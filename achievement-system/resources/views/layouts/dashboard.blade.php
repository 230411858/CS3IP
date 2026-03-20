@extends('layouts.default')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('css')
@overwrite
@section('breadcrumbs')
    <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
@section('content')
    <h1>
        Welcome {{ Auth::user()->name }}, you are a{{ Auth::user()->type === 'administrator' ? 'n' : '' }} {{ ucfirst(Auth::user()->type) }}
    </h1>
    @if ($errors->any())
        <section>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="error">
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
        </section>
    @elseif (session()->has('success'))
        <section>
                <ul>
                    <li class="success">
                        {{ session('success') }}
                    </li>
                </ul>
        </section>
    @endif
    <br>
    @yield('content')
@overwrite