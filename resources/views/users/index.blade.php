@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Categories</h1>
            <hr class="my-4">
        </div>
    </div>
    <ul>
        @forelse ($users as $user)
            <a href="#"><li>{{ $user->name }}</li></a>
        @empty
            <p>No Users yet.</p>
        @endforelse
    </ul>
@endsection
