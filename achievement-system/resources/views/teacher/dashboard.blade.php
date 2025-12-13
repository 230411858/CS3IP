@extends('layouts.dashboard')
@section('content')
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