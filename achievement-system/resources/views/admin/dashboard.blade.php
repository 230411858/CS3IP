@extends('layouts.dashboard')

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
                ID
            </th>
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
                {{ $user->id }}
            </td>
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