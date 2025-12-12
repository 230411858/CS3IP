@extends('layouts.default')

@section('content')
<a href="{{ route('dashboard') }}"><- Back to dashboard</a>
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
    <p>Current user type</p>
    <input type="text" value="{{ ucfirst($user->type()->value) }}" disabled>
    <br>
    <label for="type">New user type</label>
    <br>
    <select id="type" name="type">
        <option value="" selected>Unchanged</option>
        <option value="teacher">Teacher</option>
        <option value="guardian">Guardian</option>
        <option value="student">Student</option>
    </select>
    <button type="submit">Save</button>
</form>
@endsection