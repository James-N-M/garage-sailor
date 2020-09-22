@extends('layouts.app')

@section('content')
    <h1>Create Planner</h1>

    <form method="POST" action="/planners">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">date</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="date">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
