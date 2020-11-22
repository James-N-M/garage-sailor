@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-8 col-md-offset-2">
                <chat v-bind:user="{{ Auth::user() }}"></chat>
            </div>
        </div>
    </div>
@endsection
