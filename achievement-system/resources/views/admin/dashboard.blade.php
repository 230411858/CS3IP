@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
    
    <h1>
        Welcome {{ Auth::user()->name }}
    </h1>
    <br>
    Account type? {{ Auth::user()->type }}
    <br>
    <table>
        <tr>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
            <th>
                Account Type
            </th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                {{ ucfirst($user->type) }}
            </td>
            <td class="edit">
                <a href="/edit/{{ $user->id }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
    
@endsection