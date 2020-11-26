@extends('layouts.app_two_column')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Garage Sailor Messenger</div>
                        <div class="card-body">
                            <chat-app v-bind:user="{{ json_encode(Auth::user()) }}"></chat-app>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
