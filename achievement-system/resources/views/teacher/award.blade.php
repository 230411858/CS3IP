@extends('layouts.default')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/award.css') }}">
@endsection
@section('breadcrumbs')
    <a href="{{ route('teacher.dashboard') }}">Dashboard</a>
    <p>></p>
    <a href="{{ route('teacher.award', $students) }}">Award</a>
@endsection
@section('content')
@if ($errors->any())
    <section>
        <ul>
            @foreach ($errors->all() as $error)
            <li class="error">
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </section>
@elseif (session()->has('success'))
    <section>
        <ul>
            <li class="success">
                {{ session('success') }}
            </li>
        </ul>
    </section>
@endif
<h2>Award an Achievement</h2>
<h4>You are awarding the following students:</h4>
<table>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    @foreach ($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
    </tr>
    @endforeach
</table>
<form method="POST" action="{{ route('teacher.award.attempt') }}">
    @csrf
    <input type="text" name="id" value="@foreach ($students as $student){{ $student->id }} @endforeach" hidden readonly>
    <label for="type">Award type</label>
    <br>
    <select id="type" name="type" required>
        <option value="badge" selected>Badge</option>
        <option value="medal">Medal</option>
        <option value="trophy">Trophy</option>
    </select>
    <br>
    <p>Primary colour</p>
    <input type="color" value="#939400" name="primary_colour" required>
    <br>
    <p>Secondary colour</p>
    <input type="color" value="#7a5a00" name="secondary_colour" required>
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