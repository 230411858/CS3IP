@extends('layouts.default')

@section('content')
<a href="{{ route('dashboard') }}"><- Back to dashboard</a>
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
<form method="POST" action="{{ route('administrator.edit.attempt') }}">
    @csrf
    <p>User ID</p>
    <input type="text" value="{{ $user->id }}" disabled>
    <input type="text" name="id" value="{{ $user->id }}" hidden>
    <br>
    <p>Current name</p>
    <input type="text" value="{{ $user->name }}" disabled>
    <p>New name</p>
    <input type="text" name="name" placeholder="Unchanged" maxlength="255" pattern="[a-zA-Z](\s?[a-zA-Z])*">
    <br>
    <p>Current email address</p>
    <input type="email" value="{{ $user->email }}" disabled>
    <p>New email adress</p>
    <input type="email" name="email" placeholder="Unchanged" maxlength="255">
    <br>
    <p>New password</p>
    <input type="password" name="password" placeholder="Unchanged" minlength="8">
    @if ($user->type !== 'administrator')
        <br>
        <label for="type">New user type</label>
        <br>
        <select id="type" name="type">
            @foreach (['teacher', 'guardian', 'student'] as $type)
                @if ($type === $user->type)
                    <option value="" selected>{{ ucfirst($type) }} (Unchanged)</option>
                @else
                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                @endif
            @endforeach
        </select>
    @endif
    <button type="submit">Save</button>
</form>
@endsection