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
    <a href="{{ route('student.dashboard') }}">Dashboard</a>
    <p>></p>
    <a href="{{ route('student.friend.achievements', [$friend, $type]) }}">{{ $friend->name.'\'s' }} {{ in_array($type, ['badge', 'medal']) ? ucfirst($type).'s' : 'Trophies' }}</a>
@endsection
@section('content')
@for ($rowsToAdd = $achievements->count() > 36 ? ceil($achievements->count / 4) : 3; $rowsToAdd > 0; $rowsToAdd--)
    <img class="backgrounds" src={{ asset("storage/images/".$type."_background.png") }} alt="A shelf to hold your earned achievements">
@endfor
@php
    $achievementNumber = 0;
@endphp
@foreach ($achievements as $achievement)
    @switch($achievement->type)
                    @case('badge')
                    <svg
                    class="achievements"
                    id="achievement{{ $achievementNumber }}"
                    width="90.858253mm"
                    height="85.176521mm"
                    viewBox="0 0 90.858253 85.176521"
                    version="1.1"
                    id="svg1"
                    inkscape:version="1.4.3 (0d15f75042, 2025-12-25)"
                    sodipodi:docname="badge.svg"
                    inkscape:export-filename="../Documents/projects/CS3IP/achievement-system/badge.svg"
                    inkscape:export-xdpi="96"
                    inkscape:export-ydpi="96"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:svg="http://www.w3.org/2000/svg">
                    <sodipodi:namedview
                        id="namedview1"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        inkscape:document-units="mm"
                        inkscape:zoom="1.0244809"
                        inkscape:cx="162.52133"
                        inkscape:cy="186.43588"
                        inkscape:window-width="2560"
                        inkscape:window-height="1368"
                        inkscape:window-x="0"
                        inkscape:window-y="0"
                        inkscape:window-maximized="1"
                        inkscape:current-layer="layer1" />
                    <defs
                        id="defs1">
                        <linearGradient
                        id="swatch6"
                        inkscape:swatch="solid">
                        <stop
                            style="stop-color:#000000;stop-opacity:1;"
                            offset="0"
                            id="stop7" />
                        </linearGradient>
                        <linearGradient
                        inkscape:collect="always"
                        xlink:href="#swatch6"
                        id="linearGradient7"
                        x1="64.680501"
                        y1="107.99531"
                        x2="152.64383"
                        y2="107.99531"
                        gradientUnits="userSpaceOnUse" />
                    </defs>
                    <g
                        inkscape:label="Layer 1"
                        inkscape:groupmode="layer"
                        id="layer1"
                        transform="translate(-62.523914,-68.205647)">
                        <ellipse
                        style="fill:{{ $achievement->primary_colour }};fill-opacity:1;stroke:#939400;stroke-width:1.5;stroke-dasharray:none;stroke-opacity:1"
                        id="path1"
                        cx="107.95304"
                        cy="110.79391"
                        rx="44.679127"
                        ry="41.838261" />
                        <text
                        xml:space="preserve"
                        style="font-size:15.9252px;writing-mode:lr-tb;direction:ltr;fill:{{ $achievement->secondary_colour }};fill-opacity:1;stroke:none;stroke-width:0.2;stroke-dasharray:none;stroke-opacity:1"
                        x="77.220001"
                        y="103.69417"
                        id="text1"><tspan
                            sodipodi:role="line"
                            id="tspan1"
                            style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-family:'Liberation Mono';-inkscape-font-specification:'Liberation Mono';fill:{{ $achievement->secondary_colour }};fill-opacity:1;stroke-width:0.2;stroke-dasharray:none;stroke:none;stroke-opacity:1"
                            x="77.220001"
                            y="103.69417">Well </tspan><tspan
                            sodipodi:role="line"
                            style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-family:'Liberation Mono';-inkscape-font-specification:'Liberation Mono';fill:{{ $achievement->secondary_colour }};fill-opacity:1;stroke-width:0.2;stroke-dasharray:none;stroke:none;stroke-opacity:1"
                            x="77.220001"
                            y="123.68049"
                            id="tspan2">  Done!</tspan></text>
                    </g>
                    </svg>
                    @break
                    @case('medal')
                    <svg
                    class="achievements"
                    id="achievement{{ $achievementNumber }}"
                    width="144.10956mm"
                    height="155.06825mm"
                    viewBox="0 0 144.10955 155.06825"
                    version="1.1"
                    id="svg1"
                    inkscape:version="1.4.3 (0d15f75042, 2025-12-25)"
                    sodipodi:docname="medal.svg"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:svg="http://www.w3.org/2000/svg">
                    <sodipodi:namedview
                        id="namedview1"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        inkscape:document-units="mm"
                        inkscape:zoom="1.0244809"
                        inkscape:cx="256.71537"
                        inkscape:cy="543.68997"
                        inkscape:window-width="2560"
                        inkscape:window-height="1368"
                        inkscape:window-x="0"
                        inkscape:window-y="0"
                        inkscape:window-maximized="1"
                        inkscape:current-layer="layer1" />
                    <defs
                        id="defs1" />
                    <g
                        inkscape:label="Layer 1"
                        inkscape:groupmode="layer"
                        id="layer1"
                        transform="translate(-37.189568,-4.6717544)">
                        <rect
                        style="fill:{{ $achievement->secondary_colour }};fill-opacity:1;stroke-width:0.223765"
                        id="rect1"
                        width="144.10956"
                        height="12.866925"
                        x="37.189568"
                        y="4.6717544" />
                        <rect
                        style="fill:{{ $achievement->secondary_colour }};fill-opacity:1;stroke-width:0.262852"
                        id="rect2"
                        width="14.961484"
                        height="113.6036"
                        x="27.299259"
                        y="31.974623"
                        transform="matrix(0.89910476,-0.43773352,0.39394529,0.91913389,0,0)" />
                        <rect
                        style="fill:{{ $achievement->secondary_colour }};fill-opacity:1;stroke-width:0.262852"
                        id="rect2-3"
                        width="14.961484"
                        height="113.6036"
                        x="-173.74753"
                        y="-63.538902"
                        transform="matrix(-0.89910476,-0.43773352,-0.39394529,0.91913389,0,0)" />
                        <circle
                        style="fill:{{ $achievement->primary_colour }};fill-opacity:1;stroke-width:0.317999"
                        id="path1"
                        cx="108.56261"
                        cy="129.74001"
                        r="30" />
                    </g>
                    </svg>
                    @break
                    @case('trophy')
                        <svg 
                        class="achievements"
                        id="achievement{{ $achievementNumber }}"
                        style="color: {{ $achievement->colour }};"
                        width="168.0472mm"
                        height="156.24725mm"
                        viewBox="0 0 168.0472 156.24725"
                        version="1.1"
                        id="svg1"
                        inkscape:version="1.4.3 (0d15f75042, 2025-12-25)"
                        sodipodi:docname="trophy.svg"
                        inkscape:export-filename="../Documents/projects/CS3IP/achievement-system/trophy.svg"
                        inkscape:export-xdpi="96"
                        inkscape:export-ydpi="96"
                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:svg="http://www.w3.org/2000/svg">
                            <sodipodi:namedview
                                id="namedview1"
                                pagecolor="#ffffff"
                                bordercolor="#000000"
                                borderopacity="0.25"
                                inkscape:showpageshadow="2"
                                inkscape:pageopacity="0.0"
                                inkscape:pagecheckerboard="0"
                                inkscape:deskcolor="#d1d1d1"
                                inkscape:document-units="mm"
                                inkscape:zoom="1.0244809"
                                inkscape:cx="304.05642"
                                inkscape:cy="363.11072"
                                inkscape:window-width="2560"
                                inkscape:window-height="1368"
                                inkscape:window-x="0"
                                inkscape:window-y="0"
                                inkscape:window-maximized="1"
                                inkscape:current-layer="layer1" />
                            <defs
                                id="defs1" />
                            <g
                                inkscape:label="Layer 1"
                                inkscape:groupmode="layer"
                                id="layer1"
                                transform="translate(-24.445969,-52.427548)">
                                <rect
                                style="fill:{{ $achievement->primary_colour }};fill-opacity:1;stroke-width:0.264999"
                                id="rect3"
                                width="20.91913"
                                height="78.253036"
                                x="97.622604"
                                y="103.30434" />
                                <path
                                d="M 152.3354,60.433004 H 64.162492 A 49.107136,43.387825 0 0 0 59.14161,79.544499 49.107136,43.387825 0 0 0 108.24869,122.93203 49.107136,43.387825 0 0 0 157.35577,79.544499 49.107136,43.387825 0 0 0 152.3354,60.433004 Z"
                                style="fill:{{ $achievement->primary_colour }};stroke-width:0.404725"
                                id="path6" />
                                <ellipse
                                style="fill:{{ $achievement->primary_colour }};fill-opacity:1;stroke-width:0.264999"
                                id="path3"
                                cx="107.82391"
                                cy="184.26913"
                                rx="23.88913"
                                ry="10.976088" />
                                <rect
                                style="fill:{{ $achievement->secondary_colour }};fill-opacity:1;stroke-width:0.226198"
                                id="rect2"
                                width="82.398903"
                                height="25.826086"
                                x="65.598259"
                                y="182.84871" />
                                <rect
                                style="fill:{{ $achievement->primary_colour }};fill-opacity:1;stroke-width:0.268315"
                                id="rect4"
                                width="73.604347"
                                height="17.303478"
                                x="70.246956"
                                y="187.49739" />
                                <ellipse
                                style="fill:{{ $achievement->primary_colour }};fill-opacity:0;stroke:{{ $achievement->primary_colour }};stroke-width:7.26654;stroke-dasharray:none;stroke-opacity:1"
                                id="path4"
                                cx="-10.919542"
                                cy="98.209404"
                                rx="21.206295"
                                ry="30.401945"
                                transform="rotate(-39.008105)" />
                                <ellipse
                                style="fill:{{ $achievement->primary_colour }};fill-opacity:0;stroke:{{ $achievement->primary_colour }};stroke-width:7.26654;stroke-dasharray:none;stroke-opacity:1"
                                id="ellipse4"
                                cx="-179.98126"
                                cy="-37.736618"
                                rx="21.206295"
                                ry="30.401945"
                                transform="matrix(-0.77705693,-0.62943032,-0.62943032,0.77705693,0,0)" />
                            </g>
                        </svg>
                    @break
                @endswitch
    <div class="details" id="detail{{ $achievementNumber }}">
        <h3> {{ $achievement->title }}</h3>
        <br>
        <p>{{ $achievement->description === null ? '[No description]' : $achievement->description }}</p>
        <br>
        <p>Received: {{ $achievement->created_at }}</p>
        <p>From: {{ $achievement->teacher->name }}</p>
        <br>
        <i>{{ $achievement->rarity() * 100 }}% of students have this achievement</i>
        @if ($myAchievements->where('achievement_id', '=', $achievement->id)->exists())
            <br>
            <p class="sameAchievementAsFriend">You also have this achievement</p>
        @endif
    </div>
    @php
        $achievementNumber++;
    @endphp
@endforeach
@endsection