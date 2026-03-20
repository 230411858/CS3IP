@extends('layouts.dashboard')
@section('js')
    <script async src="{{ asset('js/form.js') }}"></script>
@endsection
@section('content')
<form method="GET" action="{{ route('teacher.award') }}">
    <button type="submit">Award</button>
    <button type="button" onclick="setCheckboxesTo(true)">Select All</button>
    <button type="button" onclick="setCheckboxesTo(false)">Deselect All</button>
    <button type="button" onclick="toggleCheckboxes()">Invert Selection</button>
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
            Select
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
            <td>
                <input type="checkbox" name="{{ $student->id }}" value="{{ $student->id }}">
            </td>
        </tr>
        @endforeach
    </table>
    </form>
@endsection