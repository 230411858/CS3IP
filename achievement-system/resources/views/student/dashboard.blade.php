@extends('layouts.dashboard')
@section('content')
<h2>My Activity</h2>
    <table>
        <tr>
            <th>
                Preview
            </th>
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
                    <img class="preview" src={{ asset("storage/images/".$achievement->type.".svg") }} alt="A preview of your achievement">
                </td>
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
    <div id="achievementLinks">
        <a href="{{ route('student.view', 'badge') }}">My Badges</a>
        <a href="{{ route('student.view', 'medal') }}">My Medals</a>
        <a href="{{ route('student.view', 'trophy') }}">My Trophies</a>
    </div>
@endsection