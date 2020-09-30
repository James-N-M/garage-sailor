@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <ul>
        @forelse ($users as $user)
            <a href="#"><li>{{ $user->name }}</li></a>
        @empty
            <p>No Users yet.</p>
        @endforelse
    </ul>
@endsection
