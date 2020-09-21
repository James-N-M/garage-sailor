@extends('layouts.app')

@section('content')
    <h1>Planners</h1>
    <ul>
        @forelse ($planners as $planner)
            <a href="{{ $planner->path() }}">{{ $planner->name }}</a>
        @empty
            <p>No Planners yet.</p>
        @endforelse
    </ul>
@endsection
