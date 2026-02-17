@extends('layouts.default')
@section('content')
<h1>Add a Child</h1>
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
@endsection