@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('css')
@endsection

@section('content')
    @yield('content')
@endsection