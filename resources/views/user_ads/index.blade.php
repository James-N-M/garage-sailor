@extends('layouts.app')

@section('content')
    <h1>My Ads</h1>
    <ul>
        @forelse ($ads as $ad)
            <a href="{{ $ad->path() }}">{{ $ad->name }}</a>
        @empty
            <p>You have not created any ads yet.</p>
            <a href="/ads/create">Create ad</a>
        @endforelse
    </ul>
@endsection
