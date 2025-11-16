@extends('layouts.default')

@section('content')
    
<form method="POST" action="/register">
    @csrf
    <input type="text" name="name" placeholder="Full name">
    <input type="email" name="email" placeholder="Email address">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Submit</button>
</form>

@endsection