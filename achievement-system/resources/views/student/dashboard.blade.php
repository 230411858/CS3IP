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
        </tr>
        @endforeach
    </table>
    </ul>
@endsection