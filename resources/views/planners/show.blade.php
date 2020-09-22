@extends('layouts.app')

@section('content')
    <h1>Planner Page</h1>
    <p>{{ $planner->name }}</p>

{{--    <ul>--}}
{{--        @foreach($ads as $ad)--}}
{{--            <li>{{ $ad->name }}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
@endsection
