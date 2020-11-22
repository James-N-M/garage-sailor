@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-8 col-md-offset-2">
                <chat v-bind:user="{{ Auth::user() }}"
                      v-bind:messages="{{ $messages }}"
                      v-bind:to="{{ $to }}"
                >
                </chat>
            </div>
        </div>
    </div>
@endsection
