@extends('layouts.default')
@section('css')
    <link rel="stylesheet" href="css/view_achievement.css">
@endsection
@section('breadcrumbs')
    <ul>
        <li>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        >
        <li>
            <a href="{{ route('student.view', $achievement->id) }}">View Achievement</a>
        </li>
    </ul>
@endsection
@section('content')
<h1>Achievement</h1>
<br>
<h2>{{ $achievement->title }}</h2>
<img src={{ asset("storage/images/".$achievement->type.".svg") }} alt="">
<h3>{{ $achievement->description }}</h3>
@endsection