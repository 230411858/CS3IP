@extends('layouts.default')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/view_achievements.css') }}">
    @php
        $rowIndex = 0;
        $rowOffset = 0;
    @endphp
        <style>
            @for ($achievementNumber = 0; $achievementNumber < $achievements->count(); $achievementNumber++)
                #achievement{{ $achievementNumber }}
                {
                    top: {{ 9.25 + $rowOffset * 30 }}vh;
                    left: {{ 2.75 + $rowIndex * 24.5 }}vw;
                }
                #detail{{ $achievementNumber }}
                {
                    top: {{ 9.25 + $rowOffset * 30 }}vh;
                    left: {{ 2.75 + $rowIndex * 24.5 }}vw;
                }
                @php
                    $rowIndex++;
                    if ($rowIndex == 4) {
                        $rowIndex = 0;
                        $rowOffset++;
                    }
                @endphp
            @endfor
        </style>
@endsection
@section('breadcrumbs')
    <ul>
        <li>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        >
        <li>
            <a href="{{ route('student.view', $type) }}">View {{ in_array($type, ['badge', 'medal']) ? ucfirst($type).'s' : 'Trophies' }}</a>
        </li>
    </ul>
@endsection
@section('content')
@for ($shelvesToAdd = $achievements->count() > 36 ? ceil($achievements->count / 4) : 3; $shelvesToAdd > 0; $shelvesToAdd--)
    <img class="shelf" src={{ asset("storage/images/trophy_shelf.png") }} alt="A shelf to hold your earned trophies">
@endfor
@php
    $achievementNumber = 0;
@endphp
@foreach ($achievements as $achievement)
    <img class="achievements" id="achievement{{ $achievementNumber }}" src={{ asset("storage/images/".$achievement->type.".svg") }} alt="A trophy you have been awarded">
    <div class="details" id="detail{{ $achievementNumber }}">
        <h3> {{ $achievement->title }}</h3>
        <br>
        <p>{{ $achievement->description }}</p>
        <br>
        <p>Received: {{ $achievement->created_at }}</p>
        <p>From: {{ $achievement->teacher->name }}</p>
        <br>
        <p>{{ $achievement->rarity() * 100 }}% of students have this achievement</p>
    </div>
    @php
        $achievementNumber++;
    @endphp
@endforeach
@endsection