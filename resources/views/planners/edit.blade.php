@extends('layouts.app')

@section('content')
    <h1>Planner edit page</h1>

    <p>{{ $planner->name }}</p>

    <form method="PATCH" action="/planners">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" name="name" value="{{$planner->name}}">
        </div>
    </form>

    <!-- TODO add form for start point-->
    <form method="POST" action="/ad-planner/{{$planner->id}}">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Start</label>
            <select class="form-control" name="start">
                @foreach($planner->ads as $ad)
                    <option value="{{$ad->id}}">{{$ad->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">End</label>
            <select class="form-control" name="end">
                @foreach($planner->ads as $ad)
                    <option value="{{$ad->id}}">{{$ad->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Set Start and End points</button>
    </form>
@endsection
