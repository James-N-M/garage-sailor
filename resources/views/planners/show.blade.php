@extends('layouts.app')

@section('content')
    <h1>Planner Page</h1>
    <p>{{ $planner->name }}</p>

    <h2>Ads added to planner</h2>
    <ul>
        @forelse($planner->ads as $ad)
            <a href="/ads/{{$ad->id}}"><li>{{ $ad->name }}</li></a>
        @empty
            <p>No ads have been added to this planner</p>
        @endforelse
    </ul>

    <h3>Ads on that date</h3>
    <ul>
        @foreach($ads as $ad)
            <form method="POST"
                  action="/planners/{{$planner->id}}/ads/{{$ad->id}}"
            >
                @csrf
                <li>{{ $ad->name }}</li>
                <button class="btn btn-primary">Add to planner</button>
            </form>
        @endforeach
    </ul>
@endsection
