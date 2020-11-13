@extends('layouts.app')

@section('content')
    <h1>Create Planner</h1>

    <form method="POST" action="/planners">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <planner-ads></planner-ads>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
