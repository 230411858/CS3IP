@extends('layouts.default')
@section('breadcrumbs')
    <ul>
        <li>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        >
        <li>
            <a href="{{ route('teacher.award', $student->id) }}">Award</a>
        </li>
    </ul>
@endsection
@section('content')
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
<form method="POST" action="{{ route('teacher.award.attempt') }}">
    @csrf
    <p>Student ID</p>
    <input type="text" value="{{ $student->id }}" disabled>
    <input type="text" name="id" value="{{ $student->id }}" required hidden>
    <br>
    <p>Name</p>
    <input type="text" value="{{ $student->name }}" disabled>
    <br>
    <p>Email address</p>
    <input type="email" value="{{ $student->email }}" disabled>
    <br>
    <label for="type">Award type</label>
    <br>
    <select id="type" name="type" required>
        <option value="badge" selected>Badge</option>
        <option value="medal">Medal</option>
        <option value="trophy">Trophy</option>
    </select>
    <br>
    <p>Colour</p>
    <br>
    <input type="color">
    <br>
    <p>Award title</p>
    <input type="text" name="title" required>
    <br>
    <p>Award description</p>
    <input type="text" name="description">
    <br>
    <button type="submit">Award</button>
</form>
@endsection