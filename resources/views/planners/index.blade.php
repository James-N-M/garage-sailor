@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Planners</h1>
            <p class="lead">Manage your day planners.</p>
            <hr class="my-4">
            <a class="btn btn-success btn-lg" href="/planners/create" role="button">Create Planner</a>
        </div>
    </div>
    <ul>
        @forelse ($planners as $planner)
            <a href="{{ $planner->path() }}" class="mr-2">{{ $planner->name }}</a>
            <a href="/planners/edit/{{$planner->id}}"><i class="far fa-edit"></i></a>
        @empty
            <p>No Planners yet.</p>
        @endforelse
    </ul>
@endsection
