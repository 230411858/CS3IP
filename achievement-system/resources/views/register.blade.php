@extends('layouts.default')

@section('content')

<div class="form-card">
    <h2>
        Register
    </h2>

    <h5>
        Register a new account
    </h5>

    <form method="POST" action="/register">
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
        <input type="text" name="name" placeholder="Full name" value="{{ old('name') }}" required>
        <input type="text" name="email" placeholder="Email address" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Submit</button>
    </form>
    
    <h4>
        Already have an account? <a href="{{ route('login') }}">Sign in</a>
    </h4>
</div>
@endsection
<style>
    main
    {
        align-content: center;
    }
</style>