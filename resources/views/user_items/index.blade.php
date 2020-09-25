@extends('layouts.app')

@section('content')
    <h1>My Items</h1>
    <ul>
        @forelse ($items as $item)
            <a href="{{ $item->path() }}">{{ $item->name }}</a>
        @empty
            <p>You dont have any items yet.</p>
            <a href="/ads/create">Create ad with some items</a>
        @endforelse
    </ul>
@endsection
