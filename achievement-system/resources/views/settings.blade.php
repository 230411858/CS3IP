@extends('layouts.default')
@section('breadcrumbs')
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <p>></p>
    <a href="{{ route('settings') }}">Settings</a>
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
    <h1>
        Change Email
    </h1>
    <form method="POST" action="{{ route('user.update.email.attempt') }}">
        @csrf
        <h3>Current Email</h3>
        <input type="email" placeholder="{{ Auth::user()->email }}" disabled>
        <br>
        <h3>New Email</h3>
        <input type="email" name="email" placeholder="New Email" required maxlength="255">
        <br>
        <button type="submit">Save</button>
    </form>
    <h1>
        Change Password
    </h1>
    <form method="POST" action="{{ route('user.update.password.attempt') }}">
        @csrf
        <h3>Current Password</h3>
        <input type="password" name="currentPassword" placeholder="Current Password" required minlength="8">
        <br>
        <h3>New Password</h3>
        <input type="password" name="newPassword" placeholder="New Password" required minlength="8">
        <br>
        <h3>Confirm New Password</h3>
        <input type="password" name="newPasswordConfirmation" placeholder="Re-enter New Password" required minlength="8">
        <br>
        <button type="submit">Save</button>
    </form>
@endsection