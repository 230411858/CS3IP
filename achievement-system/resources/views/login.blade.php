@extends('layouts.default')
@section('content')
<div class="form-card">
    <h2>
        Login
    </h2>
    <h5>
        Login to continue
    </h5>
    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
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
        @endif
        <input type="email" name="email" placeholder="Email address">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Submit</button>
    </form>
    <h4>
        Don't have an account? <a href="{{ route('register') }}">Create account</a>
    </h4>
</div>
@endsection
<style>
    main
    {
        align-content: center;
    }
</style>