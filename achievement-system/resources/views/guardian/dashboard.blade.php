@extends('layouts.dashboard')
@section('content')
    <ul>
        <h2>My Children</h2>
        <table>
        <tr>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th>
                Email Address
            </th>
            <th>
                Date of Last Achievement
            </th>
        </tr>
        @foreach ($children as $child)
            <tr>
                <td>
                    {{ $child->id }}
                </td>
                <td>
                    {{ ucfirst($child->name) }}
                </td>
                <td>
                    {{ $child->email }}
                </td>
                <td>
                    @if ($last_achievement = $child->achievements()->orderByDesc('created_at')->first())
                        {{ $last_achievement->created_at }}    
                    @else
                        {{ 'None' }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('guardian.view', $child->id) }}">View</a>
                </td>
            </tr>
        @endforeach
        </table>
        <a href="{{ route('guardian.add') }}">Click here to add a child</a>
    </ul>
@endsection