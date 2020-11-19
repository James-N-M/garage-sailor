@extends('layouts.app')

@section('content')
    <h1>Planner Page</h1>

    <p>{{ $planner->name }}</p>

    <h2>Ads added to planner</h2>

    <ul>
        @forelse($planner->ads as $ad)
            <a href="{{ $ad->path() }}"><li>{{ $ad->name }}</li></a>
        @empty
            <p>No ads have been added to this planner</p>
        @endforelse
    </ul>

    <planner-google-map v-bind:ads="{{ json_encode($planner->ads) }}"
                v-bind:start="{{ json_encode($start) }}"
                v-bind:end="{{ json_encode($end) }}"
    >
    </planner-google-map>

@endsection
