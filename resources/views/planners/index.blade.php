@extends('layouts.app')

Planners Index page

@forelse($planners as $planner)
    <div>
        {{ $planner->name }}
    </div>
@empty
    <p>No planners to view</p>
@endforelse