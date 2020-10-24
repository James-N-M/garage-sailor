@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Categories</h1>
            <hr class="my-4">
        </div>
    </div>

    <ul>
        @forelse ($categories as $category)
            <li><a href="{{ $category->path() }}">{{ $category->name }}</a></li>
        @empty
            <p>No Categories yet.</p>
        @endforelse
    </ul>
@endsection
