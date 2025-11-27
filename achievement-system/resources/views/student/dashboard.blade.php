@extends('layouts.default')
@section('content')
    
    <h1>Welcome {{ Auth::user()->name }}</h1>
    <br>
    Account type? {{ Auth::user()->type }}
    <br>
    
@endsection