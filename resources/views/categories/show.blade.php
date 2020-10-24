@extends('layouts.app')

@section('content')

    <bread-crumbs
        v-bind:crumbs="{{ json_encode([ ['name' => 'Categories' , 'link' => '/categories', 'active' => false], ['name' => 'Category Name' , 'link' => '', 'active' => true] ]) }}"
    >
    </bread-crumbs>

    <ul>
        @forelse ($items as $item)
            <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
        @empty
            <p>No Items yet.</p>
        @endforelse
    </ul>
@endsection
