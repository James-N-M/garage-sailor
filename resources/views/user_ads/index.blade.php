@extends('layouts.app')

@section('content')
    <bread-crumbs
        v-bind:crumbs="{{ json_encode([ ['name' => 'Ads' , 'link' => '/ads', 'active' => false], ['name' => 'My Ads' , 'link' => '', 'active' => true] ]) }}"
    >
    </bread-crumbs>

    @include('_ads')

@endsection
