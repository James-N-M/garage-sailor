@extends('layouts.app')

Items Index page

@forelse($items as $item)
    <div>
        {{ $item->name }}
    </div>
@empty
    <p>No items to view</p>
@endforelse