<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/ads') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Garage Sailor
                </div>

                <div class="links">
                    <a href="/ads">Ads</a>
                    <a href="/items">Items</a>
                </div>

                <div class="d-flex mt-5 mb-5">

                    <div class="card text-center" style="width: 400px;">
                        <div class="card-header">
                            Create
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Post Ads</h5>
                            <p class="card-text">Sell your stuff</p>
                            <a href="/ads/create" class="btn btn-primary">Post Ad</a>
                        </div>
                        <div class="card-footer text-muted">
                        </div>
                    </div>

                    <div class="card text-center" style="width: 400px;">
                        <div class="card-header">
                            Create Day Planners
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Plan Your Trip</h5>
                            <p class="card-text">Create planners to visit multiple garage sales for a given day.</p>
                            <a href="/planners/create" class="btn btn-primary">Create Planner</a>
                        </div>
                        <div class="card-footer text-muted">
                        </div>
                    </div>


                    <div class="card text-center" style="width: 400px;">
                        <div class="card-header">
                            Search Items
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Search for Items</h5>
                            <p class="card-text">Find the items your looking for!</p>
                            <a href="/categories" class="btn btn-primary">Categories</a>
                        </div>
                        <div class="card-footer text-muted">
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-xl-center"><p>60-499 Course Project Garage Sale Web App</p></div>
            </div>
        </div>
    </body>
</html>
