@extends('layouts.app')
@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Ads</h1>
            <h3>COVID-19 Buyers and Sellers</h3>
            <p class="lead">Please follow local guidelines about physical distancing and staying home.</p>
            <hr class="my-4">
            <a class="btn btn-success btn-lg" href="/ads/create" role="button">Create Ad</a>
        </div>
    </div>

    @include('_ads')

    {{ $ads->links() }}
@endsection
