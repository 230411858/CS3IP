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
        @endif
<form method="POST" action="/edit">
    @csrf
    <p>User ID</p>
    <input type="text" value="{{ $user->id }}" disabled>
    <input type="text" name="id" value="{{ $user->id }}" hidden>
    <br>
    <p>Current name</p>
    <input type="text" value="{{ $user->name }}" disabled>
    <p>New name</p>
    <input type="text" name="name" placeholder="Unchanged">
    <br>
    <p>Current email address</p>
    <input type="email" value="{{ $user->email }}" disabled>
    <p>New email adress</p>
    <input type="email" name="email" placeholder="Unchanged">
    <br>
    <p>New password</p>
    <input type="password" name="password" placeholder="Unchanged">
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