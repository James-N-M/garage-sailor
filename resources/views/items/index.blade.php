@extends('layouts.app')

@section('content')
    <h1>Items</h1>
    <ul>
        @forelse ($items as $item)
            <a href="{{ $item->path() }}">{{ $item->name }}</a>
        @empty
            <p>No Items yet.</p>
        @endforelse
    </ul>
@endsection
