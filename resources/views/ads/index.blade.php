@extends('layouts.app')

Index page

@forelse($ads as $ad)
    <div>
        {{ $ad->name }}
    </div>
@empty
    <p>No ads to view</p>
@endforelse