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
        </tr>
        @endforeach
    </table>
    </ul>
@endsection