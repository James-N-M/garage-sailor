@extends('layouts.app')

@section('content')
    <bread-crumbs
        v-bind:crumbs="{{ json_encode([ ['name' => 'Items' , 'link' => '/items', 'active' => false], ['name' => 'My Items' , 'link' => '', 'active' => true] ]) }}"
    >
    </bread-crumbs>

    <ul>
        @forelse ($items as $item)
            <a href="{{ $item->path() }}">{{ $item->name }}</a>
        @empty
            <p>You dont have any items yet.</p>
            <a href="/ads/create"><a class="btn btn-success btn-lg" href="/ads/create" role="button">Create Ad</a></a>
        @endforelse
    </ul>

@endsection
