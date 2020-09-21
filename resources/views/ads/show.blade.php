@extends('layouts.app')

@section('content')
    <h1>Ad Detail Page</h1>
    Name: {{ $ad->name }}
    Description: {{ $ad->description }}

    <a href="/ads">Back to ads</a>
@endsection
