@extends('layouts.app')

@section('content')
    <h1>Categories</h1>

    <ul>
        @forelse ($categories as $category)
            <li><a href="{{ $category->path() }}">{{ $category->name }}</a></li>
        @empty
            <p>No Categories yet.</p>
        @endforelse
    </ul>
@endsection
