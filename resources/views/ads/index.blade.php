@extends('layouts.app_two_column')
@section('content')
    <div class="d-flex">
        <div class="col-8">
            <div class="jumbotron"
                 style="background: rgb(2,0,36);
                 background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,212,255,1) 0%, rgba(36,36,246,1) 96%);"
            >
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
        </div>

        <div class="col-4">
            <google-map
                v-bind:ad="{{ json_encode($ads->first()) }}"
            >
            </google-map>
        </div>
    </div>


@endsection
