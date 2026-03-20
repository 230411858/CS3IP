@extends('layouts.default')
@section('css')
    <link rel="stylesheet" href="css/login_register.css">
@endsection
@section('breadcrumbs')
    <a href="{{ route('dashboard') }}">Dashboard</a>
    >
    <a href="{{ route('guardian.add') }}">Add Child</a>
@endsection
@section('content')
<div class="form-card">
    <h2>
        Add a Child
    </h2>
    <h5>
        Enter your child's login information
    </h5>
    <form method="POST" action="{{ route('guardian.add.attempt') }}">
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
        <input type="email" name="email" placeholder="Child's email address" required maxlength="255">
        <input type="password" name="password" placeholder="Child's password" required minlength="8">
        <button type="submit">Submit</button>
    </form>
</div>
@endsection