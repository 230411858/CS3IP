@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="/css/login_register.css">
@endsection

@section('content')

<div class="form-card">
    <h2>
        Register
    </h2>

    <h5>
        Register a new account
    </h5>

    <form method="POST" action="{{ route('register.attempt') }}">
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
        <input type="text" name="name" placeholder="Full name" value="{{ old('name') }}" required maxlength="255" pattern="[a-zA-Z](\s?[a-zA-Z])*">
        <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required maxlength="255">
        <input type="password" name="password" placeholder="Password" required minlength="8">
        <label for="type">I am a...</label>
        <select name="type" id="type">
            <option selected value="student">Student</option>
            <option value="guardian">Parent/Guardian</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    
    <h4>
        Already have an account? <a href="{{ route('login') }}">Sign in</a>
    </h4>
</div>
@endsection