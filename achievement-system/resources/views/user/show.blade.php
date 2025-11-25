@extends('layouts.default')

@section('content')
    <ul>
        <li>
            {{ $user->name }}
        </li>
    </ul>
@endsection