@extends('layouts.dashboard')
@section('content')
    <ul>
        <table>
        <tr>
            <th>
                Award type
            </th>
            <th>
                Title
            </th>
            <th>
                Description
            </th>
            <th>
                Awarded by
            </th>
            <th>
                Awarded at
            </th>
        </tr>
        @foreach ($achievements as $achievement)
        <tr>
            <td>
                {{ ucfirst($achievement->type) }}
            </td>
            <td>
                {{ $achievement->title }}
            </td>
            <td>
                {{ $achievement->description }}
            </td>
            <td>
                {{ $achievement->teacher->name }}
            </td>
            <td>
                {{ $achievement->created_at }}
            </td>
            <td>
                <a href="{{ route('student.view', $achievement->id) }}">View</a>
            </td>
        </tr>
        @endforeach
    </table>
    </ul>
@endsection