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
                {{ $student->id }}
            </td>
            <td>
                {{ $student->name }}
            </td>
            <td>
                {{ $student->email }}
            </td>
            <td class="award">
                <a href="{{ route('teacher.award', $student->id) }}">Award</a>
            </td>
        </tr>
        @endforeach
    </table>
    </ul>
@endsection