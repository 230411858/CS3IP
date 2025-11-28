@extends('layouts.default')

@section('content')
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
<form method="POST" action="{{ route('edit.attempt') }}">
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
    <br>
    <label for="type">New user type</label>
    <select id="type" name="type">
        <option value="" selected>Unchanged</option>
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
    </select>
    <button type="submit">Save</button>
</form>
@endsection