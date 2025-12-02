@extends('layouts.dashboard')
@section('content')
    
    <h1>
        Welcome {{ Auth::user()->name }}
    </h1>
    <br>
    Account type? {{ Auth::user()->type }}
    <br>
    <ul>
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
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>
                {{ $student->user->id }}
            </td>
            <td>
                {{ $student->user->name }}
            </td>
            <td>
                {{ $student->user->email }}
            </td>
            <td class="award">
                <a href="{{ route('teacher.award', $student->user->id) }}">Award</a>
            </td>
        </tr>
        @endforeach
    </table>
    </ul>
@endsection