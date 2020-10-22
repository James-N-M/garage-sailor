@extends('layouts.app')

@section('content')
    <h1>{{ $category->name }}</h1>
    <ul>
        @forelse ($items as $item)
            <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
        @empty
            <p>No Items yet.</p>
        @endforelse
    </ul>
@endsection
