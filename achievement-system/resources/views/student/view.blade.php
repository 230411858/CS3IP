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
                    top: {{ 11 + $rowOffset * 30 }}vh;
                    left: {{  2.9 + $rowIndex * 24.75 }}vw;
                }
                #detail{{ $achievementNumber }}
                {
                    top: {{ 9.5 + $rowOffset * 30 }}vh;
                    left: {{  2.9 + $rowIndex * 24.75 }}vw;
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
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <p>></p>
    <a href="{{ route('student.view', $type) }}">View {{ in_array($type, ['badge', 'medal']) ? ucfirst($type).'s' : 'Trophies' }}</a>
@endsection
@section('content')
@for ($rowsToAdd = $achievements->count() > 36 ? ceil($achievements->count / 4) : 3; $rowsToAdd > 0; $rowsToAdd--)
    <img class="backgrounds" src={{ asset("storage/images/".$type."_background.png") }} alt="A shelf to hold your earned achievements">
@endfor
@php
    $achievementNumber = 0;
@endphp
@foreach ($achievements as $achievement)
    <img class="achievements" id="achievement{{ $achievementNumber }}" src={{ asset("storage/images/".$achievement->type.".svg") }} alt="An achievement you have been awarded">
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