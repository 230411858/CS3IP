@extends('layouts.default')
@section('content')
<h1>{{ $child->name }}</h1>
<h4>({{ $child->email }})</h4>
<br>
<h1>Achievements</h1>
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
    @foreach ($child->achievements()->get() as $achievement)
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
    </tr>
    @endforeach
</table>
@endsection