@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Items</h1>
            <hr class="my-4">
        </div>
    </div>

    <div class="d-flex flex-wrap">
        @forelse ($items as $item)
            <div class="card text-center m-2 w-25">
                <div class="card-header">
                    {{ $item->name }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item->price }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    @if($item->category)
                        <span class="badge badge-success mr-2">{{ $item->category->name }}</span>
                    @endif
                </div>
                <div class="card-footer text-muted">
                </div>
            </div>
        @empty
            <p>No Items yet.</p>
        @endforelse
    </div>

    {{ $items->links() }}

@endsection
